<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationArticleAuthorKind: string
{
    case Person = "person";
    case Organization = "organization";
}
