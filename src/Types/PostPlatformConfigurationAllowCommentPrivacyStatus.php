<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationAllowCommentPrivacyStatus: string
{
    case Public_ = "public";
    case Private_ = "private";
    case Friends = "friends";
    case MutualFollowFriends = "mutual_follow_friends";
    case FollowerOfCreator = "follower_of_creator";
    case SelfOnly = "self_only";
    case PublicToEveryone = "PUBLIC_TO_EVERYONE";
}
