<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationFeedTargetingPlacement: string
{
    case Feed = "feed";
    case Reels = "reels";
    case Stories = "stories";
}
