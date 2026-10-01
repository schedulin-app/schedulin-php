<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeleteMediaRequest extends JsonSerializableType
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
