<?php

namespace Schedulin\Tags\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeleteTagsRequest extends JsonSerializableType
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
