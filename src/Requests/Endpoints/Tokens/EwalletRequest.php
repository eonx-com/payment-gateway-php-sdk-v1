<?php
declare(strict_types=1);

namespace EoneoPay\PhpSdk\Requests\Endpoints\Tokens;

use EoneoPay\PhpSdk\Requests\AbstractRequest;
use EoneoPay\PhpSdk\Responses\Users\EndpointTokens\EwalletToken;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

class EwalletRequest extends AbstractRequest
{
    /**
     * @Assert\NotBlank(groups={"get"})
     *
     * @Groups({"get"})
     *
     * @var string|null
     */
    protected $token;

    /**
     * @inheritdoc
     */
    public function expectObject(): ?string
    {
        return EwalletToken::class;
    }

    /**
     * @inheritdoc
     */
    public function uris(): array
    {
        return [
            self::GET => \sprintf('/token/%s', $this->token)
        ];
    }
}
