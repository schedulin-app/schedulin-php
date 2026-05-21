<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationCommunityIdPollReplySettings: string
{
    case Everyone = "everyone";
    case Following = "following";
    case Mentioned = "mentioned";
}
