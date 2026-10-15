<?php

namespace Schedulin;

use Schedulin\Posts\PostsClient;
use Schedulin\PostGroups\PostGroupsClient;
use Schedulin\SocialAccounts\SocialAccountsClient;
use Schedulin\Tags\TagsClient;
use Schedulin\Media\MediaClient;
use Schedulin\Platforms\PlatformsClient;
use Schedulin\Ai\AiClient;
use Schedulin\Webhooks\WebhooksClient;
use Schedulin\Profiles\ProfilesClient;
use Schedulin\Ideas\IdeasClient;
use Schedulin\Workspace\WorkspaceClient;
use Schedulin\Analytics\AnalyticsClient;
use Psr\Http\Client\ClientInterface;
use Schedulin\Core\Client\RawClient;

class SchedulinClient
{
    /**
     * @var PostsClient $posts
     */
    public PostsClient $posts;

    /**
     * @var PostGroupsClient $postGroups
     */
    public PostGroupsClient $postGroups;

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
     * @var PlatformsClient $platforms
     */
    public PlatformsClient $platforms;

    /**
     * @var AiClient $ai
     */
    public AiClient $ai;

    /**
     * @var WebhooksClient $webhooks
     */
    public WebhooksClient $webhooks;

    /**
     * @var ProfilesClient $profiles
     */
    public ProfilesClient $profiles;

    /**
     * @var IdeasClient $ideas
     */
    public IdeasClient $ideas;

    /**
     * @var WorkspaceClient $workspace
     */
    public WorkspaceClient $workspace;

    /**
     * @var AnalyticsClient $analytics
     */
    public AnalyticsClient $analytics;

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
        $this->postGroups = new PostGroupsClient($this->client, $this->options);
        $this->socialAccounts = new SocialAccountsClient($this->client, $this->options);
        $this->tags = new TagsClient($this->client, $this->options);
        $this->media = new MediaClient($this->client, $this->options);
        $this->platforms = new PlatformsClient($this->client, $this->options);
        $this->ai = new AiClient($this->client, $this->options);
        $this->webhooks = new WebhooksClient($this->client, $this->options);
        $this->profiles = new ProfilesClient($this->client, $this->options);
        $this->ideas = new IdeasClient($this->client, $this->options);
        $this->workspace = new WorkspaceClient($this->client, $this->options);
        $this->analytics = new AnalyticsClient($this->client, $this->options);
    }
}
