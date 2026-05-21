<?php

namespace Schedulin;

use Schedulin\Posts\PostsClient;
use Schedulin\SocialAccounts\SocialAccountsClient;
use Schedulin\Tags\TagsClient;
use Schedulin\Media\MediaClient;
use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;

class SchedulinClient
{
    /**
     * @var PostsClient $posts
     */
    public PostsClient $posts;

    /**
     * @var SocialAccountsClient $socialAccounts
     */
    public SocialAccountsClient $socialAccounts;

    /**
     * @var TagsClient $tags
     */
    public TagsClient $tags;

    /**
     * @var MediaClient $media
     */
    public MediaClient $media;

    /**
     * @var array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options @phpstan-ignore-next-line Property is used in endpoint methods via HttpEndpointGenerator
     */
    private array $options;

    /**
     * @var RawClient $client
     */
    private RawClient $client;

    /**
     * @param string $apiKey The apiKey to use for authentication.
     * @param ?array{
     *   baseUrl?: string,
     *   client?: ClientInterface,
     *   maxRetries?: int,
     *   timeout?: float,
     *   headers?: array<string, string>,
     * } $options
     */
    public function __construct(
        string $apiKey,
        ?array $options = null,
    ) {
        $defaultHeaders = [
            'x-api-key' => $apiKey,
            'X-Fern-Language' => 'PHP',
            'X-Fern-SDK-Name' => 'Schedulin',
        ];

        $this->options = $options ?? [];

        $this->options['headers'] = array_merge(
            $defaultHeaders,
            $this->options['headers'] ?? [],
        );

        $this->client = new RawClient(
            options: $this->options,
        );

        $this->posts = new PostsClient($this->client, $this->options);
        $this->socialAccounts = new SocialAccountsClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
        $this->media = new MediaClient($this->client, $this->options);
    }
}
