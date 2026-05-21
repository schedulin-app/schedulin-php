<?php

namespace Schedulin\SocialAccounts\Types;

enum ListSocialAccountsResponseItemPlatform: string
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
