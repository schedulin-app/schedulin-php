<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Media\Types\CreatePresignedPostIntent;

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
     * @var ?value-of<CreatePresignedPostIntent> $intent
     */
    #[JsonProperty('intent')]
    public ?string $intent;

    /**
     * @param array{
     *   contentType: string,
     *   key: string,
     *   size?: ?int,
     *   intent?: ?value-of<CreatePresignedPostIntent>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->contentType = $values['contentType'];
        $this->key = $values['key'];
        $this->size = $values['size'] ?? null;
        $this->intent = $values['intent'] ?? null;
    }
}
