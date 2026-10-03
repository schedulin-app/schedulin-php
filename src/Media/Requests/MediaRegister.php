<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class MediaRegister extends JsonSerializableType
{
    /**
     * @var string $key The `key` returned by POST /v0/media/presign, after the bytes were PUT to its `url`. The stored media URL for that key is also accepted.
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?string $name
     */
    #[JsonProperty('name')]
    public ?string $name;

    /**
     * @var ?string $alt
     */
    #[JsonProperty('alt')]
    public ?string $alt;

    /**
     * @param array{
     *   key: string,
     *   name?: ?string,
     *   alt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->name = $values['name'] ?? null;
        $this->alt = $values['alt'] ?? null;
    }
}
