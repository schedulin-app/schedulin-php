<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesPostType: string
{
    case Thread = "thread";
    case GhostPost = "ghost_post";
}
