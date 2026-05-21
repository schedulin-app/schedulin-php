<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationAllowEmbeddingVisibility: string
{
    case Public_ = "public";
    case Unlisted = "unlisted";
    case Private_ = "private";
}
