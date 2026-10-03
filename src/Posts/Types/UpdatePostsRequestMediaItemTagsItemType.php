<?php

namespace Schedulin\Posts\Types;

enum UpdatePostsRequestMediaItemTagsItemType: string
{
    case User = "user";
    case Business = "business";
}
