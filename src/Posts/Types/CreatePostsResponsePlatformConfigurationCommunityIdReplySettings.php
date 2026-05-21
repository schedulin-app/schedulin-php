<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationCommunityIdReplySettings: string
{
    case Everyone = "everyone";
    case Following = "following";
    case Mentioned = "mentioned";
}
