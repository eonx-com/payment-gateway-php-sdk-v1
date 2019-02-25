<?php
declare(strict_types=1);

namespace Tests\EoneoPay\PhpSdk;

use EoneoPay\PhpSdk\Interfaces\EoneoPayApiManagerInterface;
use EoneoPay\PhpSdk\Managers\EoneoPayApiManager;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use LoyaltyCorp\SdkBlueprint\Sdk\Factories\SerializerFactory;
use LoyaltyCorp\SdkBlueprint\Sdk\Factories\UrnFactory;
use LoyaltyCorp\SdkBlueprint\Sdk\Handlers\RequestHandler;
use LoyaltyCorp\SdkBlueprint\Sdk\Handlers\ResponseHandler;
use LoyaltyCorp\SdkBlueprint\Sdk\Managers\SdkManager;
use PHPUnit\Framework\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Create api manager instnace.
     *
     * @param mixed[]|null $body
     * @param int|null $responseCode
     * @param bool $useLiveClient Switch between mock client and live client
     *
     * @return \EoneoPay\PhpSdk\Interfaces\EoneoPayApiManagerInterface
     */
    protected function createApiManager(?array $body = null, ?int $responseCode = null): ApiManagerInterface
    {
        return new ApiManager(
            new RequestHandler(
                $this->createClient($body, $responseCode),
//                $this->createLiveClient(),
                new ResponseHandler(),
                new SerializerFactory(),
                new UrnFactory()
            )
        );
    }

    /**
     * Create live http client.
     *
     * @return \GuzzleHttp\ClientInterface
     */
    protected function createLiveClient(): ClientInterface
    {
        return new Client(['base_uri' => (string)\getenv('PAYMENTS_BASE_URI')]);
    }

    /**
     * Generate a unique id with an optional prefix
     *
     * @param string|null $prefix The prefix to use when generating the id
     *
     * @return string
     */
    protected function generateId(?string $prefix = null): string
    {
        /** @noinspection ArgumentEqualsDefaultValueInspection EA inspections require both parameters to be passed */
        return \uniqid($prefix ?? '', false);
    }

    /**
     * Get API Key from PHPUnit config file
     *
     * @return string
     */
    protected function getApiKey(): string
    {
        return (string)\getenv('PAYMENTS_API_KEY');
    }

    /**
     * Get Credit card token from PHPUnit config file
     *
     * @return string
     */
    protected function getCreditCardToken(): string
    {
        return (string)\getenv('PAYMENTS_TOKEN_CREDIT_CARD');
    }

    /**
     * Get http client with mock handler.
     *
     * @param mixed[]|null $body
     * @param int|null $responseCode
     *
     * @return \GuzzleHttp\ClientInterface
     */
    private function createClient(?array $body = null, ?int $responseCode = null): ClientInterface
    {
        return new Client([
            'handler' => new MockHandler([
                new Response(
                    $responseCode ?? 200,
                    ['Accept' => 'application/json', 'Content-Type' => 'application/json'],
                    \json_encode($body ?? [])
                )
            ])
        ]);
    }
}