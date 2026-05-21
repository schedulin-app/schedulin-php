<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationArticleVisibility: string
{
    case Public_ = "PUBLIC";
    case Connections = "CONNECTIONS";
    case LoggedIn = "LOGGED_IN";
    case Container = "CONTAINER";
}
