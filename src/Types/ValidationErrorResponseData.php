<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ValidationErrorResponseData extends JsonSerializableType
{
    /**
     * @var ?array<string> $formErrors
     */
    #[JsonProperty('formErrors'), ArrayType(['string'])]
    public ?array $formErrors;

    /**
     * @var ?array<string, array<string>> $fieldErrors
     */
    #[JsonProperty('fieldErrors'), ArrayType(['string' => ['string']])]
    public ?array $fieldErrors;

    /**
     * @param array{
     *   formErrors?: ?array<string>,
     *   fieldErrors?: ?array<string, array<string>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->formErrors = $values['formErrors'] ?? null;
        $this->fieldErrors = $values['fieldErrors'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
