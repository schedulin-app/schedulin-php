<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationCommunityIdPollReplySettings: string
{
    case Everyone = "everyone";
    case Following = "following";
    case Mentioned = "mentioned";
}
