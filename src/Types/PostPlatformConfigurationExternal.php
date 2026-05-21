<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Core\Types\Union;

class PostPlatformConfigurationExternal extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostPlatformConfigurationExternalMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostPlatformConfigurationExternalMediaItem::class])]
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
     * @var ?PostPlatformConfigurationExternalExternal $external
     */
    #[JsonProperty('external')]
    public ?PostPlatformConfigurationExternalExternal $external;

    /**
     * @var ?string $quotePostUri
     */
    #[JsonProperty('quote_post_uri')]
    public ?string $quotePostUri;

    /**
     * @var ?PostPlatformConfigurationExternalReplyTo $replyTo
     */
    #[JsonProperty('reply_to')]
    public ?PostPlatformConfigurationExternalReplyTo $replyTo;

    /**
     * @var ?PostPlatformConfigurationExternalThreadgate $threadgate
     */
    #[JsonProperty('threadgate')]
    public ?PostPlatformConfigurationExternalThreadgate $threadgate;

    /**
     * @var ?PostPlatformConfigurationExternalPostgate $postgate
     */
    #[JsonProperty('postgate')]
    public ?PostPlatformConfigurationExternalPostgate $postgate;

    /**
     * @var ?array<string> $labels
     */
    #[JsonProperty('labels'), ArrayType(['string'])]
    public ?array $labels;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostPlatformConfigurationExternalMediaItem>,
     *   altText?: ?array<?string>,
     *   langs?: ?array<string>,
     *   external?: ?PostPlatformConfigurationExternalExternal,
     *   quotePostUri?: ?string,
     *   replyTo?: ?PostPlatformConfigurationExternalReplyTo,
     *   threadgate?: ?PostPlatformConfigurationExternalThreadgate,
     *   postgate?: ?PostPlatformConfigurationExternalPostgate,
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
