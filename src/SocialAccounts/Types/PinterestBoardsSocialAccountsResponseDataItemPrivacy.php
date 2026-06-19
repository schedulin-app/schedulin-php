<?php

namespace Schedulin\SocialAccounts\Types;

enum PinterestBoardsSocialAccountsResponseDataItemPrivacy: string
{
    case Public_ = "PUBLIC";
    case Protected_ = "PROTECTED";
    case Secret = "SECRET";
}
