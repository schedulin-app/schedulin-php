<?php

namespace Schedulin\Media\Types;

enum ListMediaRequestType: string
{
    case Image = "image";
    case Video = "video";
    case All = "all";
}
