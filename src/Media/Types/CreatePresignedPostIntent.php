<?php

namespace Schedulin\Media\Types;

enum CreatePresignedPostIntent: string
{
    case Post = "post";
    case PublicAsset = "public-asset";
}
