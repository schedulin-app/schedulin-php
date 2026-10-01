<?php

namespace Schedulin\Webhooks\Types;

enum UpdateWebhooksRequestEventsItem: string
{
    case PostPublished = "post.published";
    case PostFailed = "post.failed";
    case GenerationCompleted = "generation.completed";
    case GenerationFailed = "generation.failed";
}
