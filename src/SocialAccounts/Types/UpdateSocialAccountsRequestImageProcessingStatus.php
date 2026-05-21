<?php

namespace Schedulin\SocialAccounts\Types;

enum UpdateSocialAccountsRequestImageProcessingStatus: string
{
    case Pending = "PENDING";
    case Processing = "PROCESSING";
    case Processed = "PROCESSED";
    case Failed = "FAILED";
}
