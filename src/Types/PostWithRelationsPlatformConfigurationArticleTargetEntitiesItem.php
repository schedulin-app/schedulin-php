<?php

namespace Schedulin\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;
use Schedulin\Core\Types\ArrayType;

class PostWithRelationsPlatformConfigurationArticleTargetEntitiesItem extends JsonSerializableType
{
    /**
     * @var ?array<string> $locales
     */
    #[JsonProperty('locales'), ArrayType(['string'])]
    public ?array $locales;

    /**
     * @var ?array<string> $industries
     */
    #[JsonProperty('industries'), ArrayType(['string'])]
    public ?array $industries;

    /**
     * @var ?array<string> $seniorities
     */
    #[JsonProperty('seniorities'), ArrayType(['string'])]
    public ?array $seniorities;

    /**
     * @var ?array<string> $functions
     */
    #[JsonProperty('functions'), ArrayType(['string'])]
    public ?array $functions;

    /**
     * @var ?array<string> $staffCountRanges
     */
    #[JsonProperty('staffCountRanges'), ArrayType(['string'])]
    public ?array $staffCountRanges;

    /**
     * @var ?array<string> $followedCompanies
     */
    #[JsonProperty('followedCompanies'), ArrayType(['string'])]
    public ?array $followedCompanies;

    /**
     * @param array{
     *   locales?: ?array<string>,
     *   industries?: ?array<string>,
     *   seniorities?: ?array<string>,
     *   functions?: ?array<string>,
     *   staffCountRanges?: ?array<string>,
     *   followedCompanies?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locales = $values['locales'] ?? null;
        $this->industries = $values['industries'] ?? null;
        $this->seniorities = $values['seniorities'] ?? null;
        $this->functions = $values['functions'] ?? null;
        $this->staffCountRanges = $values['staffCountRanges'] ?? null;
        $this->followedCompanies = $values['followedCompanies'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
