<?php

namespace Schedulin\Posts\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Core\Types\Union;

class CreatePostsResponsePlatformConfigurationExternal extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<CreatePostsResponsePlatformConfigurationExternalMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([CreatePostsResponsePlatformConfigurationExternalMediaItem::class])]
    public ?array $media;

    /**
     * @var ?array<?string> $altText
     */
    #[JsonProperty('alt_text'), ArrayType([new Union('string', 'null')])]
    public ?array $altText;

    /**
     * @var ?array<string> $langs
     */
    #[JsonProperty('langs'), ArrayType(['string'])]
    public ?array $langs;

    /**
     * @var ?CreatePostsResponsePlatformConfigurationExternalExternal $external
     */
    #[JsonProperty('external')]
    public ?CreatePostsResponsePlatformConfigurationExternalExternal $external;

    /**
     * @var ?string $quotePostUri
     */
    #[JsonProperty('quote_post_uri')]
    public ?string $quotePostUri;

    /**
     * @var ?CreatePostsResponsePlatformConfigurationExternalReplyTo $replyTo
     */
    #[JsonProperty('reply_to')]
    public ?CreatePostsResponsePlatformConfigurationExternalReplyTo $replyTo;

    /**
     * @var ?CreatePostsResponsePlatformConfigurationExternalThreadgate $threadgate
     */
    #[JsonProperty('threadgate')]
    public ?CreatePostsResponsePlatformConfigurationExternalThreadgate $threadgate;

    /**
     * @var ?CreatePostsResponsePlatformConfigurationExternalPostgate $postgate
     */
    #[JsonProperty('postgate')]
    public ?CreatePostsResponsePlatformConfigurationExternalPostgate $postgate;

    /**
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<CreatePostsResponsePlatformConfigurationExternalMediaItem>,
     *   altText?: ?array<?string>,
     *   langs?: ?array<string>,
     *   external?: ?CreatePostsResponsePlatformConfigurationExternalExternal,
     *   quotePostUri?: ?string,
     *   replyTo?: ?CreatePostsResponsePlatformConfigurationExternalReplyTo,
     *   threadgate?: ?CreatePostsResponsePlatformConfigurationExternalThreadgate,
     *   postgate?: ?CreatePostsResponsePlatformConfigurationExternalPostgate,
     *   labels?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->altText = $values['altText'] ?? null;
        $this->langs = $values['langs'] ?? null;
        $this->external = $values['external'] ?? null;
        $this->quotePostUri = $values['quotePostUri'] ?? null;
        $this->replyTo = $values['replyTo'] ?? null;
        $this->threadgate = $values['threadgate'] ?? null;
        $this->postgate = $values['postgate'] ?? null;
        $this->labels = $values['labels'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
