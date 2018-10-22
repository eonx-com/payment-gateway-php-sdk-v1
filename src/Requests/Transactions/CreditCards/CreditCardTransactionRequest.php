<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Requests\Transactions\CreditCards;

use EoneoPay\PhpSdk\Requests\AbstractRequest;
use EoneoPay\PhpSdk\Responses\Transactions\TransactionResponse;
use EoneoPay\PhpSdk\Traits\TransactionTrait;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

abstract class CreditCardTransactionRequest extends AbstractRequest
{
    use TransactionTrait;

    /**
     * @Assert\NotNull(groups={"create"})
     * @Assert\Valid(groups={"create", "update"})
     *
     * @Groups({"create", "update"})
     *
     * @var null|\EoneoPay\PhpSdk\Requests\Payloads\CreditCard|\EoneoPay\PhpSdk\Requests\Payloads\Token
     */
    protected $creditCard;

    /**
     * @inheritdoc
     */
    public function expectObject(): string
    {
        return TransactionResponse::class;
    }
}
