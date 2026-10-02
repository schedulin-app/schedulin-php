<?php

namespace Schedulin\Webhooks\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Types\WebhookDelivery;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListDeliveriesWebhooksResponse extends JsonSerializableType
{
    /**
     * @var array<WebhookDelivery> $data
     */
    #[JsonProperty('data'), ArrayType([WebhookDelivery::class])]
    public array $data;

    /**
     * @param array{
     *   data: array<WebhookDelivery>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
