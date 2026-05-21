<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationArticleVisibility: string
{
    case Public_ = "PUBLIC";
    case Connections = "CONNECTIONS";
    case LoggedIn = "LOGGED_IN";
    case Container = "CONTAINER";
}
