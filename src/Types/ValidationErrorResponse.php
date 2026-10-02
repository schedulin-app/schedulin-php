<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

/**
 * 422 input validation error. `data.fieldErrors` maps each invalid field to its messages; `data.formErrors` holds errors not tied to one field.
 */
class ValidationErrorResponse extends JsonSerializableType
{
    /**
     * @var string $code "INPUT_VALIDATION_FAILED"
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
     * @var ValidationErrorResponseData $data
     */
    #[JsonProperty('data')]
    public ValidationErrorResponseData $data;

    /**
     * @param array{
     *   code: string,
     *   status: int,
     *   data: ValidationErrorResponseData,
     *   message?: ?string,
     *   defined?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->code = $values['code'];
        $this->status = $values['status'];
        $this->message = $values['message'] ?? null;
        $this->defined = $values['defined'] ?? null;
        $this->data = $values['data'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
