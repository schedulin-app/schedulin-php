<?php

namespace Schedulin\Types;

enum AiGenerationStatus: string
{
    case Pending = "PENDING";
    case Processing = "PROCESSING";
    case Completed = "COMPLETED";
    case Failed = "FAILED";
    case Cancelled = "CANCELLED";
}
