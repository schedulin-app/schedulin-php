<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationCommunityIdPollReplySettings: string
{
    case Everyone = "everyone";
    case Following = "following";
    case Mentioned = "mentioned";
}
