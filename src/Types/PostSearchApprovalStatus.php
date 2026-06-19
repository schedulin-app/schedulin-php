<?php

namespace Schedulin\Types;

enum PostSearchApprovalStatus: string
{
    case Draft = "DRAFT";
    case PendingApproval = "PENDING_APPROVAL";
    case Approved = "APPROVED";
    case Rejected = "REJECTED";
}
