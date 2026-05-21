<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Core\Types\Union;

class PostPlatformConfigurationArticle extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostPlatformConfigurationArticleMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostPlatformConfigurationArticleMediaItem::class])]
    public ?array $media;

    /**
     * @var ?value-of<PostPlatformConfigurationArticleVisibility> $visibility
     */
    #[JsonProperty('visibility')]
    public ?string $visibility;

    /**
     * @var ?string $altText
     */
    #[JsonProperty('alt_text')]
    public ?string $altText;

    /**
     * @var ?string $firstComment
     */
    #[JsonProperty('first_comment')]
    public ?string $firstComment;

    /**
     * @var ?value-of<PostPlatformConfigurationArticleAuthorKind> $authorKind
     */
    #[JsonProperty('author_kind')]
    public ?string $authorKind;

    /**
     * @var ?string $organizationId
     */
    #[JsonProperty('organization_id')]
    public ?string $organizationId;

    /**
     * @var ?bool $reshareDisabled
     */
    #[JsonProperty('reshare_disabled')]
    public ?bool $reshareDisabled;

    /**
     * @var ?PostPlatformConfigurationArticleArticle $article
     */
    #[JsonProperty('article')]
    public ?PostPlatformConfigurationArticleArticle $article;

    /**
     * @var ?PostPlatformConfigurationArticlePoll $poll
     */
    #[JsonProperty('poll')]
    public ?PostPlatformConfigurationArticlePoll $poll;

    /**
     * @var ?array<?string> $multiImageAltText
     */
    #[JsonProperty('multi_image_alt_text'), ArrayType([new Union('string', 'null')])]
    public ?array $multiImageAltText;

    /**
     * @var ?array<PostPlatformConfigurationArticleTargetEntitiesItem> $targetEntities
     */
    #[JsonProperty('target_entities'), ArrayType([PostPlatformConfigurationArticleTargetEntitiesItem::class])]
    public ?array $targetEntities;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostPlatformConfigurationArticleMediaItem>,
     *   visibility?: ?value-of<PostPlatformConfigurationArticleVisibility>,
     *   altText?: ?string,
     *   firstComment?: ?string,
     *   authorKind?: ?value-of<PostPlatformConfigurationArticleAuthorKind>,
     *   organizationId?: ?string,
     *   reshareDisabled?: ?bool,
     *   article?: ?PostPlatformConfigurationArticleArticle,
     *   poll?: ?PostPlatformConfigurationArticlePoll,
     *   multiImageAltText?: ?array<?string>,
     *   targetEntities?: ?array<PostPlatformConfigurationArticleTargetEntitiesItem>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->caption = $values['caption'] ?? null;
        $this->media = $values['media'] ?? null;
        $this->visibility = $values['visibility'] ?? null;
        $this->altText = $values['altText'] ?? null;
        $this->firstComment = $values['firstComment'] ?? null;
        $this->authorKind = $values['authorKind'] ?? null;
        $this->organizationId = $values['organizationId'] ?? null;
        $this->reshareDisabled = $values['reshareDisabled'] ?? null;
        $this->article = $values['article'] ?? null;
        $this->poll = $values['poll'] ?? null;
        $this->multiImageAltText = $values['multiImageAltText'] ?? null;
        $this->targetEntities = $values['targetEntities'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
