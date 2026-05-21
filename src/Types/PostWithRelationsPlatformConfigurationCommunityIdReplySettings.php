<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationCommunityIdReplySettings: string
{
    case Everyone = "everyone";
    case Following = "following";
    case Mentioned = "mentioned";
}
