<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationFeedTargetingPlacement: string
{
    case Feed = "feed";
    case Reels = "reels";
    case Stories = "stories";
}
