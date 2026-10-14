<?php

namespace Schedulin\Ideas\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeleteIdeasRequest extends JsonSerializableType
{
    /**
     * @param array{
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        unset($values);
    }
}
