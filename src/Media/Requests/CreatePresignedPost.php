<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class CreatePresignedPost extends JsonSerializableType
{
    /**
     * @var string $contentType
     */
    #[JsonProperty('contentType')]
    public string $contentType;

    /**
     * @var string $key
     */
    #[JsonProperty('key')]
    public string $key;

    /**
     * @var ?int $size
     */
    #[JsonProperty('size')]
    public ?int $size;

    /**
     * @param array{
     *   contentType: string,
     *   key: string,
     *   size?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'];
        $this->key = $values['key'];
        $this->size = $values['size'] ?? null;
    }
}
