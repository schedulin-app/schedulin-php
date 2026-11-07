<?php

namespace Schedulin\Ugc\Types;

enum ListAvatarsUgcRequestSortItemId: string
{
    case Name = "name";
    case Status = "status";
    case CreatedAt = "createdAt";
    case UpdatedAt = "updatedAt";
}
