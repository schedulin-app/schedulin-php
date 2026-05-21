<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationAllowEmbeddingLicense: string
{
    case Standard = "standard";
    case CreativeCommons = "creative_commons";
    case Youtube = "youtube";
    case CreativeCommon = "creativeCommon";
}
