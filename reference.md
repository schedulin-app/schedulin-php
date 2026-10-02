# Reference
## Posts
<details><summary><code>$client-&gt;posts-&gt;list($request) -> ?ListPostsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Search and filter posts with various criteria including status, date range, social accounts, and tags
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->list(
    new ListPostsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$statuses:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$approvalStatus:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `?ListPostsRequestScheduledAt` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagMode:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$socialAccountIds:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;create($request) -> ?CreatePostsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new post with media, tags, and scheduling options. Media items may reference a stored library URL or any publicly reachable image/video URL — external URLs are downloaded into the media library automatically, so clients that cannot issue a raw presigned PUT can attach media in one call.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->create(
    new PostCreate([
        'caption' => 'caption',
        'socialAccountId' => 'socialAccountId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$caption:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$title:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$socialAccountId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$media:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$thumbnail:** `?PostCreateThumbnail` 
    
</dd>
</dl>

<dl>
<dd>

**$platformConfiguration:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$action:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$parts:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;countByTab($request) -> ?CountByTabPostsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns counts of posts for the Queue, Drafts, Approvals, and Sent tabs
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->countByTab(
    new CountByTabPostsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$socialAccountIds:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;retrieve($id) -> ?PostWithRelations</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a single post by its ID with all relations
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;update($id, $request) -> ?Post</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing draft or scheduled post by its ID. `status` may be DRAFT, SCHEDULED (requires a future `scheduledAt`, either in this request or already on the post), or PROCESSING (publish now). COMPLETED and FAILED are set only by the publisher. A new `scheduledAt` must not be in the past, whatever the status (422). `media` replaces the post's media and accepts the same items as create — a stored or public URL (`{ url }`) or a media library id (`{ id }`), so the `media` array from `GET /v0/posts/{id}` can be sent back as-is. `parts` (X and Mastodon only) replaces the post's thread with the same items create accepts — part media may also be a library `{ id }`, so the `parts` array from `GET /v0/posts/{id}` round-trips — and an empty array removes the thread. On X, parts[0] is the opening tweet: sending `parts` without `caption` sets the caption to parts[0], and changing `caption` without `parts` updates parts[0] when it matched the old caption. Posts that are already publishing, published, or failed can't be edited (409).
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->update(
    'id',
    new UpdatePostsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$caption:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `?DateTime` 
    
</dd>
</dl>

<dl>
<dd>

**$media:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$platformConfiguration:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$parts:** `?array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;delete($id, $request) -> ?Post</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a post by its ID
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->delete(
    'id',
    new DeletePostsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;analyticsSummary($id) -> ?AnalyticsSummaryPostsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the latest analytics snapshot for a post
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->analyticsSummary(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;analyticsSeries($id, $request) -> ?AnalyticsSeriesPostsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve time series analytics metrics for a post
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->analyticsSeries(
    'id',
    new AnalyticsSeriesPostsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;publishDraft($id, $request) -> ?Post</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Publish a draft post to connected social media accounts
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->publishDraft(
    'id',
    new PublishDraftPostsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `?DateTime` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;posts-&gt;updateTags($id, $request) -> ?Post</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replace all tags on a post. No status restrictions apply.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->posts->updateTags(
    'id',
    new UpdateTagsPostsRequest([
        'tagIds' => [
            'tagIds',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SocialAccounts
<details><summary><code>$client-&gt;socialAccounts-&gt;list() -> ?ListSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve all connected social media accounts for the authenticated user
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;listWhopCompanies($id) -> ?ListWhopCompaniesSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List companies available to a connected Whop account. Select one before requesting its forum experiences.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->listWhopCompanies(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;listWhopForums($id, $request) -> ?ListWhopForumsSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List forum experiences for a Whop company. Use an item id as platformConfiguration.experience.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->listWhopForums(
    'id',
    new ListWhopForumsSocialAccountsRequest([
        'companyId' => 'companyId',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$companyId:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;listDiscordChannels($id) -> ?ListDiscordChannelsSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the text and announcement channels the Schedulin bot can post into for a connected Discord server — only channels where the bot's effective permissions (its roles plus the channel's permission overwrites) include View Channel and Send Messages; channels it can't post in are omitted. Use an item id as `platformConfiguration.channel` when creating a Discord post.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->listDiscordChannels(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;listSlackChannels($id) -> ?ListSlackChannelsSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the channels in a connected Slack workspace that the Schedulin bot can post into (public channels, plus private channels it was invited to). Use an item id as `platformConfiguration.channel` when creating a Slack post.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->listSlackChannels(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;update($id, $request) -> ?UpdateSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update social media account settings and information
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->update(
    'id',
    new UpdateSocialAccountsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$status:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;delete($id, $request) -> ?DeleteSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Disconnect a social account. By default this is a soft disconnect: the stored credentials are wiped, the account stops counting toward your plan's account limit, and it stays in `GET /v0/social-accounts` with `status: "disconnected"` and `disconnectedReason: "TOKEN_REVOKED"` until it is reconnected from the dashboard. All of its posts, analytics, and history are kept; scheduled posts that come due while it is disconnected fail with a "reconnect" error instead of publishing. Pass `permanent=true` to delete the account instead — this **permanently deletes every post** (scheduled, draft, and published history) of the account and cannot be undone.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->delete(
    'id',
    new DeleteSocialAccountsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$permanent:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;updateTimezone($id, $request) -> ?UpdateTimezoneSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Set the IANA timezone (e.g. 'America/Los_Angeles') used to interpret queue times for this account. Unknown names and UTC-offset strings (e.g. '+05:00') are rejected with 422.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->updateTimezone(
    'id',
    new UpdateTimezoneSocialAccountsRequest([
        'timezone' => 'timezone',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$timezone:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;nextSlots($id, $request) -> ?NextSlotsSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return the next available queue slot times (UTC) for a social account, computed from its queue schedule, per-slot capacity, and timezone. Empty when the account has no queue times configured. Use a slot as `scheduledAt`, or pass `action: "queue"` when creating a post to take the next slot automatically.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->nextSlots(
    'id',
    new NextSlotsSocialAccountsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$after:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;pinterestBoards($id) -> ?PinterestBoardsSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the boards for a connected Pinterest account. Use a board id in `platformConfiguration.board_ids` when creating a Pinterest post.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->pinterestBoards(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;socialAccounts-&gt;tiktokCreatorInfo($id) -> ?TiktokCreatorInfoSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Fetch the privacy-level options, duration limits, and interaction settings for a connected TikTok account — required to build a valid `platformConfiguration` when creating a TikTok post.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->socialAccounts->tiktokCreatorInfo(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Tags
<details><summary><code>$client-&gt;tags-&gt;list($request) -> ?ListTagsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve a list of tags for the authenticated user with optional search filtering
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->list(
    new ListTagsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$q:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tags-&gt;create($request) -> ?Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a new tag. Users can have up to 5 tags.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->create(
    new CreateTagsRequest([
        'name' => 'name',
        'color' => 'color',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$name:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$color:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tags-&gt;update($id, $request) -> ?Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update an existing tag by its ID. Only the tag owner can update their tags.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->update(
    'id',
    new UpdateTagsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$color:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;tags-&gt;delete($id, $request) -> ?Tag</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a tag by its ID. Only the tag owner can delete their tags.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->tags->delete(
    'id',
    new DeleteTagsRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Media
<details><summary><code>$client-&gt;media-&gt;createFromUrl($request) -> ?Media</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Downloads a publicly reachable image or video into the media library and returns the media record. Use the returned `url` in `media[].url` when creating a post. Prefer this over the presign flow whenever your client cannot issue a raw HTTP PUT (e.g. an AI agent). The source URL must be public (no auth), http(s), and at most the post upload limit (250 MB); SVG and other active content is rejected.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->createFromUrl(
    new CreateFromUrlMediaRequest([
        'url' => 'url',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$url:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$name:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$alt:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$contentType:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;createUploadLink($request) -> ?CreateUploadLinkMediaResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a short-lived URL to a page where the user uploads files from their device (or a pasted attachment) straight into the media library. Hand the URL to the user; once they've uploaded, call GET /v0/media (list media, newest first) and reference the returned `url` when creating a post. Use this whenever the file isn't already at a public URL.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->createUploadLink(
    new CreateUploadLinkMediaRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$expiresInHours:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;upload($request) -> ?Media</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Upload raw image, video, or audio bytes directly as multipart/form-data. The file is stored in your media library and the record is returned; use its `url` in `media[].url` when creating a post. When the file part's type is missing or generic (`application/octet-stream`, `text/plain`), the type is detected from the file's bytes, then its filename extension. Max 250 MB; SVG and other active content is rejected. For a file already hosted at a public URL, prefer POST /v0/media/from-url.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->upload(
    new UploadMediaRequest([
        'file' => File::createFromString("example_file", "example_file"),
    ]),
);
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;retrieve($id) -> ?Media</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve media information by its ID
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;update($id, $request) -> ?Media</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update media information and metadata
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->update(
    'id',
    new UpdateMediaRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$mimeType:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$width:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$height:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$size:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$duration:** `?float` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;delete($id, $request) -> ?DeleteMediaResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a media object and remove its files from storage. Fails with a conflict when the media is attached to any post — remove it from those posts (or delete them) first.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->delete(
    'id',
    new DeleteMediaRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;list($request) -> ?ListMediaResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List media for the organization with page pagination, search, type and tag filters
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->list(
    new ListMediaRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$q:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$type:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagMode:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;setTags($mediaId, $request) -> ?SetTagsMediaResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replace the set of tags attached to a media item with the provided tag IDs
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->setTags(
    'mediaId',
    new SetTagsMediaRequest([
        'tagIds' => [
            'tagIds',
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$mediaId:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$tagIds:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;countByTag() -> ?CountByTagMediaResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return media counts grouped by tag for the organization
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->countByTag();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;createPresignedPost($request) -> ?PresignedPost</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a presigned PUT URL. Upload by issuing an HTTP PUT of the raw file bytes to `url` with a `Content-Type` header matching `contentType`, then reference the returned `key` when creating a post.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->media->createPresignedPost(
    new CreatePresignedPost([
        'contentType' => 'contentType',
        'key' => 'key',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$contentType:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$key:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$size:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$intent:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Platforms
<details><summary><code>$client-&gt;platforms-&gt;list() -> ?ListPlatformsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Per-platform posting requirements: caption length limits, media count/type rules, whether `platformConfiguration` is required, its JSON Schema when server-validated, and helper endpoints for fetching dynamic values (e.g. Pinterest boards). Platforms marked `comingSoon` cannot be posted to yet.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->platforms->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ai
<details><summary><code>$client-&gt;ai-&gt;generateImage($request) -> ?GenerateImageAiResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Submit an AI image generation job
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ai->generateImage(
    new GenerateImageAiRequest([
        'prompt' => 'prompt',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$prompt:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$modelKey:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$width:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$height:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ai-&gt;getGeneration($request) -> ?AiGeneration</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get the status and details of a generation job
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->ai->getGeneration(
    new GetGenerationAiRequest([
        'id' => 'id',
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Webhooks
<details><summary><code>$client-&gt;webhooks-&gt;list() -> ?ListWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the organization's webhook endpoints. Signing secrets are masked.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;create($request) -> ?WebhookEndpoint</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Register an HTTPS endpoint for event deliveries. The response includes the signing secret ONCE — store it; later reads return a masked value.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->create(
    new CreateWebhooksRequest([
        'url' => 'url',
        'events' => [
            CreateWebhooksRequestEventsItem::PostPublished->value,
        ],
    ]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$url:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$events:** `array` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;retrieve($id) -> ?WebhookEndpoint</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve one webhook endpoint, including failure counters. The signing secret is masked.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->retrieve(
    'id',
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;delete($id, $request) -> ?DeleteWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a webhook endpoint and its delivery history. Deliveries already in flight are dropped.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->delete(
    'id',
    new DeleteWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;update($id, $request) -> ?WebhookEndpoint</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Update URL, subscribed events, description, or enabled state. Re-enabling resets the failure streak.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->update(
    'id',
    new UpdateWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$events:** `?array` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$enabled:** `?bool` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;rotateSecret($id, $request) -> ?WebhookEndpoint</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Generate a new signing secret for the endpoint and return it ONCE. The old secret stops signing immediately.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->rotateSecret(
    'id',
    new RotateSecretWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;test($id, $request) -> ?TestWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Send a signed `ping` event to the endpoint URL and record it in the delivery history.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->test(
    'id',
    new TestWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;webhooks-&gt;listDeliveries($id, $request) -> ?ListDeliveriesWebhooksResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delivery history for a webhook endpoint: event, status, attempts, last response code, and payload.
</dd>
</dl>
</dd>
</dl>

#### 🔌 Usage

<dl>
<dd>

<dl>
<dd>

```php
$client->webhooks->listDeliveries(
    'id',
    new ListDeliveriesWebhooksRequest([]),
);
```
</dd>
</dl>
</dd>
</dl>

#### ⚙️ Parameters

<dl>
<dd>

<dl>
<dd>

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$limit:** `?int` 
    
</dd>
</dl>

<dl>
<dd>

**$page:** `?int` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

