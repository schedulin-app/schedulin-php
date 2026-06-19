<?php

namespace Schedulin\Media\Types;

enum CreatePresignedPostIntent: string
{
    case Post = "post";
    case ClipSource = "clip-source";
    case PublicAsset = "public-asset";
}
