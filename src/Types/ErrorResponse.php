<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class ErrorResponse extends JsonSerializableType
{
    /**
     * @var string $error
     */
    #[JsonProperty('error')]
    public string $error;

    /**
     * @var int $code
     */
    #[JsonProperty('code')]
    public int $code;

    /**
     * @param array{
     *   error: string,
     *   code: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->error = $values['error'];
        $this->code = $values['code'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
