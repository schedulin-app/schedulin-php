<?php

namespace Schedulin\Profiles\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeleteProfilesRequest extends JsonSerializableType
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
