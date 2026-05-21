<?php

namespace Schedulin\Posts\Types;

enum PostCreateAction: string
{
    case Schedule = "schedule";
    case Queue = "queue";
    case Draft = "draft";
}
