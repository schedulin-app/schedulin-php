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
     * @var float $page
     */
    #[JsonProperty('page')]
    public float $page;

    /**
     * @var float $totalPages
     */
    #[JsonProperty('totalPages')]
    public float $totalPages;

    /**
     * @var float $total
     */
    #[JsonProperty('total')]
    public float $total;

    /**
     * @param array{
     *   posts: array<PostWithRelations>,
     *   page: float,
     *   totalPages: float,
     *   total: float,
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
