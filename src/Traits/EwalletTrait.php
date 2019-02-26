<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Traits;

use Symfony\Component\Serializer\Annotation\Groups;

trait EwalletTrait
{
    /**
     * @Groups({"get", "list", "update"})
     *
     * @var mixed[]|null
     */
    protected $balances;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $createdAt;
    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $currency;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $id;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $pan;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var bool
     */
    protected $primary;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $reference;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $type;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string|null
     */
    protected $updatedAt;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var \EoneoPay\PhpSdk\Endpoints\User|null
     */
    protected $user;
}
