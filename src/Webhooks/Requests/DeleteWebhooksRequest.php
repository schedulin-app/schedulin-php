<?php

namespace Schedulin\Webhooks\Requests;

use Schedulin\Core\Json\JsonSerializableType;

class DeleteWebhooksRequest extends JsonSerializableType
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
