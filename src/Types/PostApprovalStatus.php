<?php

namespace Schedulin\Types;

enum PostApprovalStatus: string
{
    case Draft = "DRAFT";
    case PendingApproval = "PENDING_APPROVAL";
    case Approved = "APPROVED";
    case Rejected = "REJECTED";
}
