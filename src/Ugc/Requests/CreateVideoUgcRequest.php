<?php

namespace Schedulin\Ugc\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Ugc\Types\CreateVideoUgcRequestWebsiteUrlOne;
use Schedulin\Core\Types\Union;
use Schedulin\Ugc\Types\CreateVideoUgcRequestVoiceId;
use Schedulin\Ugc\Types\CreateVideoUgcRequestResolution;
use Schedulin\Ugc\Types\CreateVideoUgcRequestProductScreenshot;

class CreateVideoUgcRequest extends JsonSerializableType
{
    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    public ?string $title;

    /**
     * @var string $productName
     */
    #[JsonProperty('productName')]
    public string $productName;

    /**
     * @var ?string $audience
     */
    #[JsonProperty('audience')]
    public ?string $audience;

    /**
     * @var ?string $hookGoal
     */
    #[JsonProperty('hookGoal')]
    public ?string $hookGoal;

    /**
     * @var ?string $hook
     */
    #[JsonProperty('hook')]
    public ?string $hook;

    /**
     * @var ?string $cta
     */
    #[JsonProperty('cta')]
    public ?string $cta;

    /**
     * @var ?string $language
     */
    #[JsonProperty('language')]
    public ?string $language;

    /**
     * @var (
     *    string
     *   |value-of<CreateVideoUgcRequestWebsiteUrlOne>
     * )|null $websiteUrl
     */
    #[JsonProperty('websiteUrl'), Union('string', 'null')]
    public string|null $websiteUrl;

    /**
     * @var ?string $notes
     */
    #[JsonProperty('notes')]
    public ?string $notes;

    /**
     * @var ?string $actorSetting
     */
    #[JsonProperty('actorSetting')]
    public ?string $actorSetting;

    /**
     * @var ?value-of<CreateVideoUgcRequestVoiceId> $voiceId
     */
    #[JsonProperty('voiceId')]
    public ?string $voiceId;

    /**
     * @var ?value-of<CreateVideoUgcRequestResolution> $resolution
     */
    #[JsonProperty('resolution')]
    public ?string $resolution;

    /**
     * @var ?int $lengthSeconds
     */
    #[JsonProperty('lengthSeconds')]
    public ?int $lengthSeconds;

    /**
     * @var ?bool $storyIntro
     */
    #[JsonProperty('storyIntro')]
    public ?bool $storyIntro;

    /**
     * @var ?string $storyOpening
     */
    #[JsonProperty('storyOpening')]
    public ?string $storyOpening;

    /**
     * @var ?bool $showProduct
     */
    #[JsonProperty('showProduct')]
    public ?bool $showProduct;

    /**
     * @var ?CreateVideoUgcRequestProductScreenshot $productScreenshot
     */
    #[JsonProperty('productScreenshot')]
    public ?CreateVideoUgcRequestProductScreenshot $productScreenshot;

    /**
     * @var ?string $avatarId
     */
    #[JsonProperty('avatarId')]
    public ?string $avatarId;

    /**
     * @param array{
     *   productName: string,
     *   title?: ?string,
     *   audience?: ?string,
     *   hookGoal?: ?string,
     *   hook?: ?string,
     *   cta?: ?string,
     *   language?: ?string,
     *   websiteUrl?: (
     *    string
     *   |value-of<CreateVideoUgcRequestWebsiteUrlOne>
     * )|null,
     *   notes?: ?string,
     *   actorSetting?: ?string,
     *   voiceId?: ?value-of<CreateVideoUgcRequestVoiceId>,
     *   resolution?: ?value-of<CreateVideoUgcRequestResolution>,
     *   lengthSeconds?: ?int,
     *   storyIntro?: ?bool,
     *   storyOpening?: ?string,
     *   showProduct?: ?bool,
     *   productScreenshot?: ?CreateVideoUgcRequestProductScreenshot,
     *   avatarId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->title = $values['title'] ?? null;
        $this->productName = $values['productName'];
        $this->audience = $values['audience'] ?? null;
        $this->hookGoal = $values['hookGoal'] ?? null;
        $this->hook = $values['hook'] ?? null;
        $this->cta = $values['cta'] ?? null;
        $this->language = $values['language'] ?? null;
        $this->websiteUrl = $values['websiteUrl'] ?? null;
        $this->notes = $values['notes'] ?? null;
        $this->actorSetting = $values['actorSetting'] ?? null;
        $this->voiceId = $values['voiceId'] ?? null;
        $this->resolution = $values['resolution'] ?? null;
        $this->lengthSeconds = $values['lengthSeconds'] ?? null;
        $this->storyIntro = $values['storyIntro'] ?? null;
        $this->storyOpening = $values['storyOpening'] ?? null;
        $this->showProduct = $values['showProduct'] ?? null;
        $this->productScreenshot = $values['productScreenshot'] ?? null;
        $this->avatarId = $values['avatarId'] ?? null;
    }
}
