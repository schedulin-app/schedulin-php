<?php

namespace Schedulin\Posts\Types;

enum CreatePostsResponsePlatformConfigurationAllowEmbeddingLicense: string
{
    case Standard = "standard";
    case CreativeCommons = "creative_commons";
    case Youtube = "youtube";
    case CreativeCommon = "creativeCommon";
}
