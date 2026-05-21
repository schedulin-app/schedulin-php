<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;
use Schedulin\Core\Types\Union;

class PostWithRelationsPlatformConfigurationArticle extends JsonSerializableType
{
    /**
     * @var ?string $caption
     */
    #[JsonProperty('caption')]
    public ?string $caption;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationArticleMediaItem> $media
     */
    #[JsonProperty('media'), ArrayType([PostWithRelationsPlatformConfigurationArticleMediaItem::class])]
    public ?array $media;

    /**
     * @var ?value-of<PostWithRelationsPlatformConfigurationArticleVisibility> $visibility
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
     * @var ?value-of<PostWithRelationsPlatformConfigurationArticleAuthorKind> $authorKind
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
     * @var ?PostWithRelationsPlatformConfigurationArticleArticle $article
     */
    #[JsonProperty('article')]
    public ?PostWithRelationsPlatformConfigurationArticleArticle $article;

    /**
     * @var ?PostWithRelationsPlatformConfigurationArticlePoll $poll
     */
    #[JsonProperty('poll')]
    public ?PostWithRelationsPlatformConfigurationArticlePoll $poll;

    /**
     * @var ?array<?string> $multiImageAltText
     */
    #[JsonProperty('multi_image_alt_text'), ArrayType([new Union('string', 'null')])]
    public ?array $multiImageAltText;

    /**
     * @var ?array<PostWithRelationsPlatformConfigurationArticleTargetEntitiesItem> $targetEntities
     */
    #[JsonProperty('target_entities'), ArrayType([PostWithRelationsPlatformConfigurationArticleTargetEntitiesItem::class])]
    public ?array $targetEntities;

    /**
     * @param array{
     *   caption?: ?string,
     *   media?: ?array<PostWithRelationsPlatformConfigurationArticleMediaItem>,
     *   visibility?: ?value-of<PostWithRelationsPlatformConfigurationArticleVisibility>,
     *   altText?: ?string,
     *   firstComment?: ?string,
     *   authorKind?: ?value-of<PostWithRelationsPlatformConfigurationArticleAuthorKind>,
     *   organizationId?: ?string,
     *   reshareDisabled?: ?bool,
     *   article?: ?PostWithRelationsPlatformConfigurationArticleArticle,
     *   poll?: ?PostWithRelationsPlatformConfigurationArticlePoll,
     *   multiImageAltText?: ?array<?string>,
     *   targetEntities?: ?array<PostWithRelationsPlatformConfigurationArticleTargetEntitiesItem>,
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
