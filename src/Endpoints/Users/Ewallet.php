<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Endpoints\Users;

use EoneoPay\PhpSdk\Traits\Users\EwalletTrait;
use LoyaltyCorp\SdkBlueprint\Sdk\Annotations\Repository;
use LoyaltyCorp\SdkBlueprint\Sdk\Entity;

/**
 * @Repository(repositoryClass="EoneoPay\PhpSdk\Repositories\Users\UserRepository")
 */
class Ewallet extends Entity
{
    use EwalletTrait;

    /**
     * Get uri for this entity.
     *
     * For an example,
     *
     * return [
     *      self::CREATE => 'http://localhost/<endpoint-path>',
     *      self::DELETE => 'http://localhost/<endpoint-path>',
     *      self::GET => 'http://localhost/<endpoint-path>',
     *      self::LIST => 'http://localhost/<endpoint-path>',
     *      self::UPDATE => 'http://localhost/<endpoint-path>'
     * ];
     *
     * @return mixed[] Api endpoint uris
     */
    public function uris(): array
    {
        return [
            self::CREATE => 'http://payments.box/ewallets'
        ];
    }
}
