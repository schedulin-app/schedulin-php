<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class PostPlatformConfigurationExternalReplyTo extends JsonSerializableType
{
    /**
     * @var string $root
     */
    #[JsonProperty('root')]
    public string $root;

    /**
     * @var ?string $parent
     */
    #[JsonProperty('parent')]
    public ?string $parent;

    /**
     * @param array{
     *   root: string,
     *   parent?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->root = $values['root'];
        $this->parent = $values['parent'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
