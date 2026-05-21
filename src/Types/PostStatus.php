<?php

namespace Schedulin\Types;

enum PostStatus: string
{
    case Scheduled = "SCHEDULED";
    case Processing = "PROCESSING";
    case Completed = "COMPLETED";
    case Draft = "DRAFT";
    case Failed = "FAILED";
}
