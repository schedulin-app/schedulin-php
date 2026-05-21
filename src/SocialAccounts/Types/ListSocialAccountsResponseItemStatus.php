<?php

namespace Schedulin\SocialAccounts\Types;

enum ListSocialAccountsResponseItemStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
