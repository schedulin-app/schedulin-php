<?php

namespace Schedulin\Media\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class SetTagsMediaRequest extends JsonSerializableType
{
    /**
     * @var array<string> $tagIds
     */
    #[JsonProperty('tagIds'), ArrayType(['string'])]
    public array $tagIds;

    /**
     * @param array{
     *   tagIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->tagIds = $values['tagIds'];
    }
}
