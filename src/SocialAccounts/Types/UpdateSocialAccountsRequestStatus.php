<?php

namespace Schedulin\SocialAccounts\Types;

enum UpdateSocialAccountsRequestStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
