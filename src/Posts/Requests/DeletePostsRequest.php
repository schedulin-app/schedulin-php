<?php

namespace Schedulin\Posts\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeletePostsRequest extends JsonSerializableType
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
