<?php

namespace Schedulin\Analytics\Types;

enum TopPostsAnalyticsRequestMetric: string
{
    case Impressions = "impressions";
    case Reach = "reach";
    case Likes = "likes";
    case Comments = "comments";
    case Shares = "shares";
    case Saves = "saves";
    case VideoViews = "videoViews";
    case EngagementTotal = "engagementTotal";
}
