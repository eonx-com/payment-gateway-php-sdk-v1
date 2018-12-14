<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Responses\Users;

use EoneoPay\PhpSdk\Traits\Requests\Payloads\EwalletTrait;
use LoyaltyCorp\SdkBlueprint\Sdk\BaseDataTransferObject;

/**
 * @method null|string getCurrency()
 * @method null|string getId()
 * @method null|string getPan()
 * @method null|string getReference()
 */
class Ewallet extends BaseDataTransferObject
{
    use EwalletTrait;
}
