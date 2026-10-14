<?php

namespace Schedulin\Workspace\Types;

use Schedulin\Core\Json\JsonSerializableType;
use Schedulin\Core\Json\JsonProperty;

class RetrieveWorkspaceResponseLimits extends JsonSerializableType
{
    /**
     * @var RetrieveWorkspaceResponseLimitsChannels $channels
     */
    #[JsonProperty('channels')]
    public RetrieveWorkspaceResponseLimitsChannels $channels;

    /**
     * @var ?RetrieveWorkspaceResponseLimitsTrialPosts $trialPosts During a free trial, how many of the trial's scheduled/published posts the caller has used; null outside a trial
     */
    #[JsonProperty('trialPosts')]
    public ?RetrieveWorkspaceResponseLimitsTrialPosts $trialPosts;

    /**
     * @param array{
     *   channels: RetrieveWorkspaceResponseLimitsChannels,
     *   trialPosts?: ?RetrieveWorkspaceResponseLimitsTrialPosts,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->channels = $values['channels'];
        $this->trialPosts = $values['trialPosts'] ?? null;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
