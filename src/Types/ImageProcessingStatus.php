<?php

namespace Schedulin\Types;

enum ImageProcessingStatus: string
{
    case Pending = "PENDING";
    case Processing = "PROCESSING";
    case Processed = "PROCESSED";
    case Failed = "FAILED";
}
