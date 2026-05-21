<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationAllowEmbeddingVisibility: string
{
    case Public_ = "public";
    case Unlisted = "unlisted";
    case Private_ = "private";
}
