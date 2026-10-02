<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Types\PostWithRelations;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class ListPostsResponse extends JsonSerializableType
{
    /**
     * @var array<PostWithRelations> $posts
     */
    #[JsonProperty('posts'), ArrayType([PostWithRelations::class])]
    public array $posts;

    /**
     * @var int $page
     */
    #[JsonProperty('page')]
    public int $page;

    /**
     * @var int $totalPages
     */
    #[JsonProperty('totalPages')]
    public int $totalPages;

    /**
     * @var int $total
     */
    #[JsonProperty('total')]
    public int $total;

    /**
     * @param array{
     *   posts: array<PostWithRelations>,
     *   page: int,
     *   totalPages: int,
     *   total: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->posts = $values['posts'];
        $this->page = $values['page'];
        $this->totalPages = $values['totalPages'];
        $this->total = $values['total'];
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
