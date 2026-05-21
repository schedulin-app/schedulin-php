<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationAllowlistedCountryCodesPostType: string
{
    case Thread = "thread";
    case GhostPost = "ghost_post";
}
