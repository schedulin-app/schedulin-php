<?php

namespace Schedulin\Types;

enum SocialAccountPublicStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
