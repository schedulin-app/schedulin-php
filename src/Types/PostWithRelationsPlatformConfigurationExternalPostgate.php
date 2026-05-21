<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationExternalPostgate extends JsonSerializableType
{
    /**
     * @var ?bool $embeddingDisabled
     */
    #[JsonProperty('embedding_disabled')]
    public ?bool $embeddingDisabled;

    /**
     * @var ?array<string> $detachedEmbeddingUris
     */
    #[JsonProperty('detached_embedding_uris'), ArrayType(['string'])]
    public ?array $detachedEmbeddingUris;

    /**
     * @param array{
     *   embeddingDisabled?: ?bool,
     *   detachedEmbeddingUris?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->embeddingDisabled = $values['embeddingDisabled'] ?? null;
        $this->detachedEmbeddingUris = $values['detachedEmbeddingUris'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
