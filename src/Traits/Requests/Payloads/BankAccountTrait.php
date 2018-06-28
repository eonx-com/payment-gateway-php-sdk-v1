<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Traits\Requests\Payloads;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

trait BankAccountTrait
{
    /**
     * Bank account bsb.
     *
     * @Assert\NotBlank(groups={"create", "tokenise"})
     * @Assert\Type(type="string", groups={"create", "tokenise"})
     *
     * @Groups({"create", "update", "tokenise"})
     *
     * @var null|string
     */
    protected $bsb;

    /**
     * Bank account name.
     *
     * @Assert\NotBlank(groups={"create", "tokenise"})
     * @Assert\Type(type="string", groups={"create", "update", "tokenise"})
     *
     * @Groups({"create", "update", "tokenise"})
     *
     * @var string
     */
    protected $name;

    /**
     * Bank account number.
     *
     * @Assert\NotBlank(groups={"create", "tokenise"})
     * @Assert\Type(type="string", groups={"create", "update", "tokenise"})
     *
     * @Groups({"create", "update", "tokenise"})
     *
     * @var null|string
     */
    protected $number;

    /**
     * Bank account token.
     *
     * @Groups({"create", "update"})
     *
     * @var null|string
     */
    protected $token;
}
