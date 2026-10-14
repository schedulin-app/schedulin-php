<?php

namespace Schedulin\Analytics\Requests;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Analytics\Types\PlatformBreakdownAnalyticsRequestPlatformsItem;

class PlatformBreakdownAnalyticsRequest extends JsonSerializableType
{
    /**
     * @var string $from
     */
    public string $from;

    /**
     * @var string $to
     */
    public string $to;

    /**
     * @var ?array<value-of<PlatformBreakdownAnalyticsRequestPlatformsItem>> $platforms
     */
    public ?array $platforms;

    /**
     * @var ?array<string> $socialAccountIds
     */
    public ?array $socialAccountIds;

    /**
     * @param array{
     *   from: string,
     *   to: string,
     *   platforms?: ?array<value-of<PlatformBreakdownAnalyticsRequestPlatformsItem>>,
     *   socialAccountIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->from = $values['from'];
        $this->to = $values['to'];
        $this->platforms = $values['platforms'] ?? null;
        $this->socialAccountIds = $values['socialAccountIds'] ?? null;
    }
}
