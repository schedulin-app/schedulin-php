<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

/**
 * 429 rate-limit error. Per-key request limits return `code: "RATE_LIMITED"` (also mirrored under `error`); the per-user limiter returns `code: "TOO_MANY_REQUESTS"`. Honor the `Retry-After` header.
 */
class RateLimitErrorResponse extends JsonSerializableType
{
    /**
     * @var string $code
     */
    #[JsonProperty('code')]
    public string $code;

    /**
     * @var int $status
     */
    #[JsonProperty('status')]
    public int $status;

    /**
     * @var ?string $message
     */
    #[JsonProperty('message')]
    public ?string $message;

    /**
     * @var ?bool $defined
     */
    #[JsonProperty('defined')]
    public ?bool $defined;

    /**
     * @var ?array<string, mixed> $data
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @var ?RateLimitErrorResponseError $error
     */
    #[JsonProperty('error')]
    public ?RateLimitErrorResponseError $error;

    /**
     * @param array{
     *   code: string,
     *   status: int,
     *   message?: ?string,
     *   defined?: ?bool,
     *   data?: ?array<string, mixed>,
     *   error?: ?RateLimitErrorResponseError,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->status = $values['status'];
        $this->message = $values['message'] ?? null;
        $this->defined = $values['defined'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->error = $values['error'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
