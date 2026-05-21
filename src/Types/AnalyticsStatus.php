<?php

namespace Schedulin\Types;

enum AnalyticsStatus: string
{
    case Idle = "IDLE";
    case Processing = "PROCESSING";
    case Failed = "FAILED";
}
