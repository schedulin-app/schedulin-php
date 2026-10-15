<?php

namespace Schedulin\PostGroups\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class CreatePostGroupsResponse extends JsonSerializableType
{
    /**
     * @var string $id
     */
    #[JsonProperty('id')]
    public string $id;

    /**
     * @var array<CreatePostGroupsResponsePostsItem> $posts
     */
    #[JsonProperty('posts'), ArrayType([CreatePostGroupsResponsePostsItem::class])]
    public array $posts;

    /**
     * @param array{
     *   id: string,
     *   posts: array<CreatePostGroupsResponsePostsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'];
        $this->posts = $values['posts'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
