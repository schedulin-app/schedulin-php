<?php

namespace Schedulin\Posts\Types;

enum ListPostsRequestStatusesItem: string
{
    case Scheduled = "SCHEDULED";
    case Processing = "PROCESSING";
    case Completed = "COMPLETED";
    case Draft = "DRAFT";
    case Failed = "FAILED";
}
