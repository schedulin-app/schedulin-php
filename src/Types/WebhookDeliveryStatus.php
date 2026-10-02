<?php

namespace Schedulin\Types;

enum WebhookDeliveryStatus: string
{
    case Pending = "PENDING";
    case Success = "SUCCESS";
    case Failed = "FAILED";
}
