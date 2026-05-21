<?php

namespace Schedulin\Types;

enum SocialAccountUpdateImageProcessingStatus: string
{
    case Pending = "PENDING";
    case Processing = "PROCESSING";
    case Processed = "PROCESSED";
    case Failed = "FAILED";
}
