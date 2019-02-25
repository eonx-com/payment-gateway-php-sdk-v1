<?php
/**
 * Created by PhpStorm.
 * User: Codeint
 * Date: 25/02/2019
 * Time: 11:54
 */

namespace EoneoPay\PhpSdk\Exceptions;

use EoneoPay\Utils\Exceptions\CriticalException as BaseCriticalException;
use Throwable;

class CriticalException extends BaseCriticalException
{
    /**
     * The error sub code.
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
    public function getErrorMessage(): string
    {
        return $this->message;
    }

    /**
     * {@inheritdoc}
     */
    public function getErrorSubCode(): int
    {
        return $this->subCode;
    }
}
