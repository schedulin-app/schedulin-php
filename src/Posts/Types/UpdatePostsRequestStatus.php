<?php

namespace Schedulin\Posts\Types;

enum UpdatePostsRequestStatus: string
{
    case Draft = "DRAFT";
    case Scheduled = "SCHEDULED";
    case Processing = "PROCESSING";
    case Completed = "COMPLETED";
    case Failed = "FAILED";
}
