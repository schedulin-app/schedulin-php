<?php

namespace Schedulin\Types;

enum OauthScope: string
{
    case PostsRead = "posts:read";
    case PostsWrite = "posts:write";
    case TagsRead = "tags:read";
    case TagsWrite = "tags:write";
    case SocialAccountsRead = "social-accounts:read";
    case SocialAccountsWrite = "social-accounts:write";
    case ChannelsRead = "channels:read";
    case MediaRead = "media:read";
    case MediaWrite = "media:write";
    case AnalyticsRead = "analytics:read";
    case OrgRead = "org:read";
}
