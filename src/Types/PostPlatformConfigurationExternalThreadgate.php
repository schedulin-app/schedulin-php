<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Core\Types\Union;

class PostPlatformConfigurationExternalThreadgate extends JsonSerializableType
{
    /**
     * @var ?array<mixed> $allow
     */
    #[JsonProperty('allow'), ArrayType([new Union('mixed', 'null')])]
    public ?array $allow;

    /**
     * @var ?array<string> $hiddenReplies
     */
    #[JsonProperty('hidden_replies'), ArrayType(['string'])]
    public ?array $hiddenReplies;

    /**
     * @param array{
     *   allow?: ?array<mixed>,
     *   hiddenReplies?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->allow = $values['allow'] ?? null;
        $this->hiddenReplies = $values['hiddenReplies'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
