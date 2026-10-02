<?php

namespace Schedulin\Webhooks\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class TestWebhooksResponse extends JsonSerializableType
{
    /**
     * @var string $deliveryId
     */
    #[JsonProperty('deliveryId')]
    public string $deliveryId;

    /**
     * @param array{
     *   deliveryId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->deliveryId = $values['deliveryId'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
