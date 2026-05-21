<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationArticlePollDuration: string
{
    case OneDay = "ONE_DAY";
    case ThreeDays = "THREE_DAYS";
    case SevenDays = "SEVEN_DAYS";
    case FourteenDays = "FOURTEEN_DAYS";
}
