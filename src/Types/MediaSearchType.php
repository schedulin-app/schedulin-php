<?php

namespace Schedulin\Types;

enum MediaSearchType: string
{
    case Image = "image";
    case Video = "video";
    case All = "all";
}
