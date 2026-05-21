<?php

namespace Schedulin\Posts\Types;

enum ListPostsRequestTagMode: string
{
    case Any = "ANY";
    case All = "ALL";
}
