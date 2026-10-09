<?php

namespace Schedulin\Platforms\Types;

enum ListPlatformsResponseDataItemCaptionLengthUnit: string
{
    case Characters = "characters";
    case Graphemes = "graphemes";
    case CharactersEmojiBytes = "characters_emoji_bytes";
}
