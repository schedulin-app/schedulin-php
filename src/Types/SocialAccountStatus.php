<?php

namespace Schedulin\Types;

enum SocialAccountStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
