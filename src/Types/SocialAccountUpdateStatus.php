<?php

namespace Schedulin\Types;

enum SocialAccountUpdateStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
