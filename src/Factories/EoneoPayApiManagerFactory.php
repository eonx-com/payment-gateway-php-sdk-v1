<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Factories;

use EoneoPay\PhpSdk\Interfaces\EoneoPayApiManagerInterface;
use EoneoPay\PhpSdk\Interfaces\Factories\EoneoPayApiManagerFactoryInterface;
use EoneoPay\PhpSdk\Managers\EoneoPayApiManager;
use GuzzleHttp\Client as GuzzleClient;
use LoyaltyCorp\SdkBlueprint\Sdk\Factories\SerializerFactory;
use LoyaltyCorp\SdkBlueprint\Sdk\Factories\UrnFactory;
use LoyaltyCorp\SdkBlueprint\Sdk\Handlers\RequestHandler;
use LoyaltyCorp\SdkBlueprint\Sdk\Handlers\ResponseHandler;
use LoyaltyCorp\SdkBlueprint\Sdk\Managers\SdkManager;

class EoneoPayApiManagerFactory implements EoneoPayApiManagerFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function create(string $baseUri): EoneoPayApiManagerInterface
    {
        return new EoneoPayApiManager(new SdkManager(
            new RequestHandler(new GuzzleClient([
                'base_uri' => $baseUri
            ]),
            new ResponseHandler(),
            new SerializerFactory(),
            new UrnFactory()
        )));
    }
}