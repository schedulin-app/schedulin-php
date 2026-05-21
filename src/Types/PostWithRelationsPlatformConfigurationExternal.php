<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Core\Types\Union;

class PostWithRelationsPlatformConfigurationExternal extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationExternalMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsPlatformConfigurationExternalMediaItem::class])]
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
     * @var ?PostWithRelationsPlatformConfigurationExternalExternal $external
     */
    #[JsonProperty('external')]
    public ?PostWithRelationsPlatformConfigurationExternalExternal $external;

    /**
     * @var ?string $quotePostUri
     */
    #[JsonProperty('quote_post_uri')]
    public ?string $quotePostUri;

    /**
     * @var ?PostWithRelationsPlatformConfigurationExternalReplyTo $replyTo
     */
    #[JsonProperty('reply_to')]
    public ?PostWithRelationsPlatformConfigurationExternalReplyTo $replyTo;

    /**
     * @var ?PostWithRelationsPlatformConfigurationExternalThreadgate $threadgate
     */
    #[JsonProperty('threadgate')]
    public ?PostWithRelationsPlatformConfigurationExternalThreadgate $threadgate;

    /**
     * @var ?PostWithRelationsPlatformConfigurationExternalPostgate $postgate
     */
    #[JsonProperty('postgate')]
    public ?PostWithRelationsPlatformConfigurationExternalPostgate $postgate;

    /**
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostWithRelationsPlatformConfigurationExternalMediaItem>,
     *   altText?: ?array<?string>,
     *   langs?: ?array<string>,
     *   external?: ?PostWithRelationsPlatformConfigurationExternalExternal,
     *   quotePostUri?: ?string,
     *   replyTo?: ?PostWithRelationsPlatformConfigurationExternalReplyTo,
     *   threadgate?: ?PostWithRelationsPlatformConfigurationExternalThreadgate,
     *   postgate?: ?PostWithRelationsPlatformConfigurationExternalPostgate,
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
