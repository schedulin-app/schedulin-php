<?php

namespace Schedulin\Types;

enum WebhookEndpointEventsItem: string
{
    case PostPublished = "post.published";
    case PostFailed = "post.failed";
    case GenerationCompleted = "generation.completed";
    case GenerationFailed = "generation.failed";
}
