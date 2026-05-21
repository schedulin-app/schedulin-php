<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationAllowlistedCountryCodesPostType: string
{
    case Thread = "thread";
    case GhostPost = "ghost_post";
}
