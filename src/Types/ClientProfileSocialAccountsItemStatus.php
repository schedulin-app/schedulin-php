<?php

namespace Schedulin\Types;

enum ClientProfileSocialAccountsItemStatus: string
{
    case Connected = "connected";
    case Disconnected = "disconnected";
}
