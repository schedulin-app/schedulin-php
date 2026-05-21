<?php

namespace Schedulin\Posts\Types;

enum ListPostsRequestStatus: string
{
    case Scheduled = "SCHEDULED";
    case Processing = "PROCESSING";
    case Completed = "COMPLETED";
    case Draft = "DRAFT";
    case Failed = "FAILED";
}
