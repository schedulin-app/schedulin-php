<?php

namespace Schedulin\Types;

enum PostCreateAction: string
{
    case Schedule = "schedule";
    case Queue = "queue";
    case Draft = "draft";
    case Now = "now";
}
