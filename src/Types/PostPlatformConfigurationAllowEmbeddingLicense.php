<?php

namespace Schedulin\Types;

enum PostPlatformConfigurationAllowEmbeddingLicense: string
{
    case Standard = "standard";
    case CreativeCommons = "creative_commons";
    case Youtube = "youtube";
    case CreativeCommon = "creativeCommon";
}
