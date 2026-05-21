<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationFeedTargetingPlacement: string
{
    case Feed = "feed";
    case Reels = "reels";
    case Stories = "stories";
}
