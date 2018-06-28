<?php
declare(strict_types=1);

namespace Tests\EoneoPay\PhpSdk\Requests\Transactions\CreditCards;

use EoneoPay\PhpSdk\Requests\Payloads\CreditCard;
use EoneoPay\PhpSdk\Requests\Payloads\CreditCards\Expiry;
use EoneoPay\PhpSdk\Requests\Payloads\Gateway;
use EoneoPay\PhpSdk\Requests\Transactions\CreditCards\AuthoriseRequest;
use EoneoPay\PhpSdk\Responses\Transactions\TransactionResponse;
use LoyaltyCorp\SdkBlueprint\Sdk\Exceptions\ValidationException;
use Tests\EoneoPay\PhpSdk\RequestTestCase;

class AuthoriseRequestTest extends RequestTestCase
{
    /**
     * Test a successful credit card authorise and capture requests.
     *
     * @return void
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function testSuccessfulCreditCardAuthoriseAndCapture(): void
    {
        $authorise = new AuthoriseRequest([
            'credit_card' => new CreditCard([
                'cvc' => '123',
                'expiry' => new Expiry(['month' => '12', 'year' => '2019']),
                'name' => 'Julian',
                'number' => '5123450000000008'
            ]),
            'id' => (string)\time(),
            'gateway' => new Gateway(['service' => 'default', 'line_of_business' => 'eWallet']),
            'amount' => '10',
            'currency' => 'AUD',
            'reference' => 'julian test'
        ]);

        /** @var \EoneoPay\PhpSdk\Responses\Transactions\TransactionResponse $response */
        $response = $this->client->create($authorise);

        self::assertInstanceOf(TransactionResponse::class, $response);
        self::assertSame('10.00', $response->getAmount());
        self::assertSame('AUD', $response->getCurrency());

        $capture = new AuthoriseRequest([
            'original_id' => $response->getId(),
            'id' => (string)\time(),
            'gateway' => new Gateway(['service' => 'default', 'line_of_business' => 'eWallet']),
            'amount' => $response->getAmount(),
            'currency' => $response->getCurrency(),
            'reference' => 'julian test'
        ]);

        /** @var \EoneoPay\PhpSdk\Responses\Transactions\TransactionResponse $response */
        $response = $this->client->update($capture);

        self::assertInstanceOf(TransactionResponse::class, $response);
        self::assertSame('10.00', $response->getAmount());
        self::assertSame('AUD', $response->getCurrency());
    }

    /**
     * Make sure the exception structure and validation rules are thrown as expected.
     *
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function testValidationException(): void
    {
        $authorise = new AuthoriseRequest([
            'credit_card' => new CreditCard([
                'cvc' => '123',
                'expiry' => new Expiry(['month' => '12', 'year' => '2019']),
                'name' => 'Julian',
                'number' => '5123450000000008'
            ]),
            'gateway' => new Gateway(['service' => 'default']),
            'amount' => '10',
            'currency' => 'AUDS',
            'reference' => 'julian test'
        ]);

        try {
            $this->client->update($authorise);
        } catch (ValidationException $exception) {
            $expected = [
                'violations' => [
                    'currency' => ['This value is not a valid currency.'],
                    'id' => ['This value should not be blank.'],
                    'gateway.line_of_business' => ['This value should not be blank.'],
                    'original_id' => ['This value should not be blank.']
                ]
            ];

            self::assertSame($expected, $exception->getErrors());
        }
    }
}
