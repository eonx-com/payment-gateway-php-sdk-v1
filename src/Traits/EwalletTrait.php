<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Traits;

use Symfony\Component\Serializer\Annotation\Groups;

trait EwalletTrait
{
    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var mixed[]
     */
    protected $balances;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string
     */
    protected $currency;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string
     */
    protected $id;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string
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
     * @var string
     */
    protected $reference;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var string
     */
    protected $type;

    /**
     * @Groups({"create", "get", "list", "update"})
     *
     * @var \EoneoPay\PhpSdk\Endpoints\Users\User
     */
    protected $user;
}