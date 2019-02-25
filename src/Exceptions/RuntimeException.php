<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Exceptions;

use EoneoPay\Utils\Exceptions\RuntimeException as BaseRuntimeException;
use Throwable;

class RuntimeException extends BaseRuntimeException
{
    /**
     * The sub error code.
     *
     * @var int
     */
    protected $subCode;

    /**
     * Instantiate attributes.
     *
     * @param null|string $message
     * @param null|int $code
     * @param null|\Throwable $previous
     * @param null|int $subCode
     */
    public function __construct(
        ?string $message = null,
        ?int $code = null,
        ?Throwable $previous = null,
        ?int $subCode = null
    ) {
        parent::__construct($message ?? '', $code ?? 0, $previous);

        $this->subCode = $subCode ?? 0;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorCode(): int
    {
        return $this->code;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorSubCode(): int
    {
        return $this->subCode;
    }
}