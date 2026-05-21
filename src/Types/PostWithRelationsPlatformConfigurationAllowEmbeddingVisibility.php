<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationAllowEmbeddingVisibility: string
{
    case Public_ = "public";
    case Unlisted = "unlisted";
    case Private_ = "private";
}
