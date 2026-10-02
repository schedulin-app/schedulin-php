<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ErrorResponseData extends JsonSerializableType
{
    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?string $userMessage End-user-safe explanation, when available.
     */
    #[JsonProperty('userMessage')]
    public ?string $userMessage;

    /**
     * @var ?string $errorTag
     */
    #[JsonProperty('errorTag')]
    public ?string $errorTag;

    /**
     * @var ?bool $isRetryable
     */
    #[JsonProperty('isRetryable')]
    public ?bool $isRetryable;

    /**
     * @param array{
     *   message?: ?string,
     *   userMessage?: ?string,
     *   errorTag?: ?string,
     *   isRetryable?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->message = $values['message'] ?? null;
        $this->userMessage = $values['userMessage'] ?? null;
        $this->errorTag = $values['errorTag'] ?? null;
        $this->isRetryable = $values['isRetryable'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
