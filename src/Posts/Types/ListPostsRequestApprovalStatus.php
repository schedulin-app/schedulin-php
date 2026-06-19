<?php

namespace Schedulin\Posts\Types;

enum ListPostsRequestApprovalStatus: string
{
    case Draft = "DRAFT";
    case PendingApproval = "PENDING_APPROVAL";
    case Approved = "APPROVED";
    case Rejected = "REJECTED";
}
