<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class V0MediaDeleteRequest extends JsonSerializableType
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
