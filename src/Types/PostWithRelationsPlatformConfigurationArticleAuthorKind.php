<?php

namespace Schedulin\Types;

enum PostWithRelationsPlatformConfigurationArticleAuthorKind: string
{
    case Person = "person";
    case Organization = "organization";
}
