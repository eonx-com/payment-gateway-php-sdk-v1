<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Traits;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

trait TransactionTrait
{
    /**
     * Transaction action.
     *
     * @Groups({"create"})
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $action;

    /**
     * Transaction allocation.
     *
     * @Groups({"create", "update"})
     *
     * @Assert\NotBlank()
     * @Assert\Valid()
     *
     * @var \EoneoPay\PhpSdk\Endpoints\Transactions\Allocation
     */
    protected $allocation;

    /**
     * Transaction amount.
     *
     * @Groups({"create"})
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\Amount")
     *
     * @var \EoneoPay\PhpSdk\Endpoints\Amount|null
     */
    protected $amount;

    /**
     * Approved.
     *
     * @Assert\Type(type="bool")
     *
     * @var bool|null
     */
    protected $approved;

    /**
     * Created at date.
     *
     * @Assert\DateTime(format="Y-m-d\TH:i:sP")
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $createdAt;

    /**
     * Transaction description.
     *
     * @Groups({"create", "update"})
     *
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $description;

    /**
     * If the transaction was finalised.
     *
     * @Assert\Type(type="bool")
     *
     * @var bool|null
     */
    protected $finalised;

    /**
     * When the transaction was finalised.
     *
     * @Assert\DateTime(format="Y-m-d\TH:i:sP")
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $finalisedAt;

    /**
     * Original funding source for allocation transaction.
     *
     * @Groups({"create"})
     *
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\PaymentSource")
     *
     * @var \EoneoPay\PhpSdk\Endpoints\PaymentSource|null
     */
    protected $fundingSource;

    /**
     * Order id.
     *
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $id;

    /**
     * Transaction metadata.
     *
     * @Assert\Type(type="array")
     *
     * @Groups({"create", "update"})
     *
     * @var mixed[]|null
     */
    protected $metadata;

    /**
     * Parent transaction.
     *
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\Transaction")
     *
     * @Groups({"create", "update"})
     *
     * @var \EoneoPay\PhpSdk\Endpoints\Transaction|null
     */
    protected $parent;

    /**
     * Payment destination.
     *
     * @Groups({"create", "update"})
     *
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\PaymentSource")
     *
     * @var \EoneoPay\PhpSdk\Endpoints\PaymentSource|null
     */
    protected $paymentDestination;

    /**
     * Payment source.
     *
     * @Groups({"create"})
     *
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\PaymentSource")
     *
     * @var \EoneoPay\PhpSdk\Endpoints\PaymentSource|null
     */
    protected $paymentSource;

    /**
     * Recurring ID.
     *
     * @Groups({"create", "update})
     *
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $recurring_id;

    /**
     * Transaction response.
     *
     * @Assert\Type(type="array")
     *
     * @var mixed[]
     */
    protected $response;

    /**
     * Transaction security.
     *
     * @Groups({"create", "update"})
     *
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\Security")
     *
     * @var \EoneoPay\PhpSdk\Endpoints\Security|null
     */
    protected $security;

    /**
     * Original statement Transaction description.
     *
     * @Groups({"create", "update"})
     *
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $statementDescription;

    /**
     * Transaction state.
     *
     * @Assert\NotBlank()
     * @Assert\Positive()
     * @Assert\Type(type="int")
     *
     * @var int|null
     */
    protected $state;

    /**
     * Transaction status.
     *
     * @Assert\Type(type="string")
     *
     * @deprecated Being removed in favour of $state.
     *
     * @var string|null
     */
    protected $status;

    /**
     * Transaction id.
     *
     * @Groups({"create"})
     *
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $transactionId;

    /**
     * Transaction updated at date.
     *
     * @Assert\DateTime(format="Y-m-d\TH:i:sP")
     * @Assert\Type(type="string")
     *
     * @var string|null
     */
    protected $updatedAt;

    /**
     * User associated with this transaction.
     *
     * @Groups({"create"})
     *
     * @Assert\Type(type="\EoneoPay\PhpSdk\Endpoints\User")
     *
     * @var \EoneoPay\PhpSdk\Endpoints\User|null
     */
    protected $user;
}
