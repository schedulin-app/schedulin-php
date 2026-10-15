<?php

namespace Schedulin\PostGroups\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Types\PostCreate;
use Schedulin\Core\Types\ArrayType;

class CreatePostGroupsRequest extends JsonSerializableType
{
    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var array<PostCreate> $posts
     */
    #[JsonProperty('posts'), ArrayType([PostCreate::class])]
    public array $posts;

    /**
     * @param array{
     *   posts: array<PostCreate>,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'] ?? null;
        $this->posts = $values['posts'];
    }
}
