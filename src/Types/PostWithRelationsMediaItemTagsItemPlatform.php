<?php

namespace Schedulin\Types;

enum PostWithRelationsMediaItemTagsItemPlatform: string
{
    case Bluesky = "bluesky";
    case Facebook = "facebook";
    case GoogleBusinessProfile = "google_business_profile";
    case Instagram = "instagram";
    case Linkedin = "linkedin";
    case Pinterest = "pinterest";
    case Reddit = "reddit";
    case Threads = "threads";
    case Tiktok = "tiktok";
    case Twitter = "twitter";
    case Youtube = "youtube";
    case Mastodon = "mastodon";
    case Telegram = "telegram";
    case Devto = "devto";
    case Hashnode = "hashnode";
    case Medium = "medium";
    case Wordpress = "wordpress";
    case Lemmy = "lemmy";
    case Nostr = "nostr";
    case Discord = "discord";
    case Dribbble = "dribbble";
    case Farcaster = "farcaster";
    case Kick = "kick";
    case Listmonk = "listmonk";
    case Mewe = "mewe";
    case Moltbook = "moltbook";
    case Skool = "skool";
    case Slack = "slack";
    case Twitch = "twitch";
    case Vk = "vk";
    case Whop = "whop";
}
