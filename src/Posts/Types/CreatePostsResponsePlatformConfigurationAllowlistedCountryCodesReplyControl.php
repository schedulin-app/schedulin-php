<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationAllowlistedCountryCodesReplyControl: string
{
    case Everyone = "everyone";
    case AccountsYouFollow = "accounts_you_follow";
    case MentionedOnly = "mentioned_only";
    case ParentPostAuthorOnly = "parent_post_author_only";
    case FollowersOnly = "followers_only";
}
