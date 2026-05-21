<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationAllowlistedCountryCodesReplyControl: string
{
    case Everyone = "everyone";
    case AccountsYouFollow = "accounts_you_follow";
    case MentionedOnly = "mentioned_only";
    case ParentPostAuthorOnly = "parent_post_author_only";
    case FollowersOnly = "followers_only";
}
