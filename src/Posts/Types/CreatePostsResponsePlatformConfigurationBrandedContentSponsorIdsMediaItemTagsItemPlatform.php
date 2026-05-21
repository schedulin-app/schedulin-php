<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationBrandedContentSponsorIdsMediaItemTagsItemPlatform: string
{
    case Bluesky = "bluesky";
    case Facebook = "facebook";
    case Instagram = "instagram";
    case Linkedin = "linkedin";
    case Pinterest = "pinterest";
    case Threads = "threads";
    case Tiktok = "tiktok";
    case Twitter = "twitter";
    case Youtube = "youtube";
}
