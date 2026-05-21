<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationCommunityIdReplySettings: string
{
    case Everyone = "everyone";
    case Following = "following";
    case Mentioned = "mentioned";
}
