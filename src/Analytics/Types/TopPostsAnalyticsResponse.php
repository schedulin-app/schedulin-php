<?php

namespace Schedulin\Analytics\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class TopPostsAnalyticsResponse extends JsonSerializableType
{
    /**
     * @var array<TopPostsAnalyticsResponsePostsItem> $posts
     */
    #[JsonProperty('posts'), ArrayType([TopPostsAnalyticsResponsePostsItem::class])]
    public array $posts;

    /**
     * @param array{
     *   posts: array<TopPostsAnalyticsResponsePostsItem>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
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
