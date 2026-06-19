<?php

namespace Schedulin\SocialAccounts\Types;

enum ListSocialAccountsResponseDataItemStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
