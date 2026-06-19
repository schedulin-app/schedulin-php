<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

/**
 * Error envelope. The machine-readable `code` and HTTP `status` are always present; the human-readable reason is in `data.message` (or `data.fieldErrors` for 422 validation errors).
 */
class ErrorResponse extends JsonSerializableType
{
    /**
     * @var string $code e.g. "BAD_REQUEST", "UNAUTHORIZED", "NOT_FOUND".
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
     * @var ?array<string, mixed> $data
     */
    #[JsonProperty('data'), ArrayType(['string' => 'mixed'])]
    public ?array $data;

    /**
     * @param array{
     *   code: string,
     *   status: int,
     *   message?: ?string,
     *   data?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->status = $values['status'];
        $this->message = $values['message'] ?? null;
        $this->data = $values['data'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
