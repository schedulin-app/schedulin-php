<?php

namespace Schedulin\Types;

enum SocialAccountDisconnectedReason: string
{
    case TokenExpired = "TOKEN_EXPIRED";
    case TokenInvalid = "TOKEN_INVALID";
    case TokenRevoked = "TOKEN_REVOKED";
    case RefreshFailed = "REFRESH_FAILED";
    case AccountSuspended = "ACCOUNT_SUSPENDED";
    case PermissionDenied = "PERMISSION_DENIED";
}
