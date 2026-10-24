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

**$request:** `PostCreate` 
    
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

Update an existing draft or scheduled post by its ID. `title` sets the post-level title; on Facebook it's an alias for `platformConfiguration.title` (the video title), and either one updates both. Send null or an empty string to clear it. `status` may be DRAFT, SCHEDULED (requires a future `scheduledAt`, either in this request or already on the post), or PROCESSING (publish now). COMPLETED and FAILED are set only by the publisher. A new `scheduledAt` must not be in the past, whatever the status (422). `media` replaces the post's media and accepts the same items as create — a stored or public URL (`{ url }`) or a media library id (`{ id }`), so the `media` array from `GET /v0/posts/{id}` can be sent back as-is. `parts` (X and Mastodon only) replaces the post's thread with the same items create accepts — part media may also be a library `{ id }`, so the `parts` array from `GET /v0/posts/{id}` round-trips — and an empty array removes the thread. On X, parts[0] is the opening tweet: sending `parts` without `caption` sets the caption to parts[0], and changing `caption` or `media` without `parts` updates parts[0] when it matched the old value. Posts that are already publishing, published, or failed can't be edited (409).
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

<details><summary><code>$client-&gt;posts-&gt;retry($id, $request) -> ?Post</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Re-queue a FAILED post for publishing, immediately or at a future scheduledAt. Refuses posts that were already published. If the last attempt's outcome is unknown (it may have posted), responds 412 until called again with force: true — check the platform first.
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
$client->posts->retry(
    'id',
    new RetryPostsRequest([]),
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

**$force:** `?bool` — Confirm the retry after a publish attempt whose outcome is unknown. Check the platform first — the post may already be live.
    
</dd>
</dl>

<dl>
<dd>

**$scheduledAt:** `?DateTime` — Future time to re-schedule the post for; omit to publish immediately.
    
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

## PostGroups
<details><summary><code>$client-&gt;postGroups-&gt;create($request) -> ?CreatePostGroupsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create posts for several social accounts in one request — for example the same caption and image sent to Instagram, Threads and Facebook. Each post is validated exactly like `POST /v0/posts` (including per-platform rules), and media may reference stored library URLs or publicly reachable URLs; an external URL shared by several posts is imported once. The request is atomic: if any post is invalid, nothing is created. Posts with `action: "queue"` on the same account take consecutive queue slots. Up to 50 posts per request.
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
$client->postGroups->create(
    new CreatePostGroupsRequest([
        'posts' => [
            new PostCreate([
                'caption' => 'caption',
                'socialAccountId' => 'socialAccountId',
            ]),
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

**$title:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$posts:** `array` 
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## SocialAccounts
<details><summary><code>$client-&gt;socialAccounts-&gt;list($request) -> ?ListSocialAccountsResponse</code></summary>
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
$client->socialAccounts->list(
    new ListSocialAccountsRequest([]),
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

**$profileId:** `?string` 
    
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

<dl>
<dd>

**$profileId:** `?string` — Move the account into a client profile (profile id or externalId), or null to remove it from its profile.
    
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

<details><summary><code>$client-&gt;socialAccounts-&gt;getQueueSchedule($id) -> ?GetQueueScheduleSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Return the weekly posting schedule that `action: "queue"` fills: each slot's weekday (0 = Sunday), wall-clock `time` (HH:MM) and `capacity`, interpreted in the account's `timezone`. Empty `times` means the account has no queue configured.
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
$client->socialAccounts->getQueueSchedule(
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

<details><summary><code>$client-&gt;socialAccounts-&gt;replaceQueueSchedule($id, $request) -> ?ReplaceQueueScheduleSocialAccountsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Replace the account's whole weekly posting schedule with `times` (send an empty array to clear it). Times are wall-clock HH:MM in the account's timezone — change that with `PUT /v0/social-accounts/{id}/timezone`. Posts already scheduled keep their times; only future `action: "queue"` placements use the new schedule. Returns the saved schedule.
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
$client->socialAccounts->replaceQueueSchedule(
    'id',
    new ReplaceQueueScheduleSocialAccountsRequest([
        'times' => [
            new ReplaceQueueScheduleSocialAccountsRequestTimesItem([
                'weekday' => 1,
                'time' => 'time',
            ]),
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

**$times:** `array` 
    
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

<dl>
<dd>

**$fitToPlatforms:** `?array` — Opt-in. Platforms the image will be posted to (e.g. ["instagram", "tiktok"]). The image is scaled down and/or re-encoded to fit the strictest of their size, dimension and format limits before it is stored. The original bytes are kept when the image already fits, or when none of the listed platforms has known image limits, so this is not a guaranteed conversion. Images only: videos and animated GIFs are stored as-is. Images over 50 MB or 100 megapixels are rejected when a listed platform has known image limits; import them without fitToPlatforms or shrink them first. Omit to store the file unchanged.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;media-&gt;register($request) -> ?Media</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Adds a file you uploaded with POST /v0/media/presign (intent `post`) + HTTP PUT to the media library in place — no second copy is stored — and returns the media record. Pass the presign `key`. The object's type and size are read from storage and must be an allowed image/video/audio type within the post upload limit (250 MB). Idempotent: registering the same key again returns the existing record. Returns 404 when no uploaded object exists for the key in your workspace.
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
$client->media->register(
    new MediaRegister([
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

**$key:** `string` — The `key` returned by POST /v0/media/presign, after the bytes were PUT to its `url`. The stored media URL for that key is also accepted.
    
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

## Profiles
<details><summary><code>$client-&gt;profiles-&gt;list() -> ?array</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

List the client profiles in your organization, each with the social accounts connected to it.
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
$client->profiles->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;profiles-&gt;create($request) -> ?ClientProfile</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Create a profile for one of your clients. Their social accounts are grouped under it so you can post on their behalf.
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
$client->profiles->create(
    new CreateProfilesRequest([
        'name' => 'name',
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

**$externalId:** `?string` — Your own identifier for this client (e.g. the user id in your system). Unique per organization; usable in place of the profile id.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;profiles-&gt;retrieve($id) -> ?ClientProfile</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Get a client profile by its id or by the externalId you assigned, with its connected social accounts.
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
$client->profiles->retrieve(
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

<details><summary><code>$client-&gt;profiles-&gt;delete($id, $request) -> ?DeleteProfilesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Delete a client profile. Its social accounts stay connected to your organization; they are just no longer grouped under the profile.
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
$client->profiles->delete(
    'id',
    new DeleteProfilesRequest([]),
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

<details><summary><code>$client-&gt;profiles-&gt;update($id, $request) -> ?ClientProfile</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Rename a client profile or change its externalId.
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
$client->profiles->update(
    'id',
    new UpdateProfilesRequest([]),
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

**$externalId:** `?string` — Your own identifier for this client (e.g. the user id in your system). Unique per organization; usable in place of the profile id.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;profiles-&gt;createConnectLink($id, $request) -> ?CreateConnectLinkProfilesResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Returns a hosted link to send your client. They open it, sign in to their social platforms (no Schedulin account needed), and the accounts connect to your organization under this profile, ready to post to via the API. Links expire; create a new one any time. Accounts your client connects count toward your plan's channel limit.
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
$client->profiles->createConnectLink(
    'id',
    new CreateConnectLinkProfilesRequest([]),
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

**$platforms:** `?array` — Platform slugs the client may connect (e.g. instagram, tiktok). Omit to offer every platform.
    
</dd>
</dl>

<dl>
<dd>

**$expiresInHours:** `?int` — How long the link works. Defaults to 72 hours, max 7 days.
    
</dd>
</dl>

<dl>
<dd>

**$redirectUrl:** `?string` — Where the client's Done button takes them after connecting, e.g. back to your app.
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Ideas
<details><summary><code>$client-&gt;ideas-&gt;list() -> ?ListIdeasResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

The workspace's Ideas board: its columns in order (the last column is Done) and every idea that isn't archived, ordered by column position.
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
$client->ideas->list();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ideas-&gt;create($request) -> ?CreateIdeasResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Add an idea to the bottom of a column (the first column when `columnId` is omitted). Creates the workspace's Ideas board if it doesn't exist yet.
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
$client->ideas->create(
    new CreateIdeasRequest([
        'title' => 'title',
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

**$title:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$columnId:** `?string` — Column to add the idea to; defaults to the first column
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

<details><summary><code>$client-&gt;ideas-&gt;delete($id, $request) -> ?DeleteIdeasResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Permanently delete an idea from the Ideas board.
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
$client->ideas->delete(
    'id',
    new DeleteIdeasRequest([]),
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

<details><summary><code>$client-&gt;ideas-&gt;update($id, $request) -> ?UpdateIdeasResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Change an idea's title or description, or move it to the bottom of another column with `columnId`. Moving into the last (Done) column marks it completed; moving out clears that.
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
$client->ideas->update(
    'id',
    new UpdateIdeasRequest([]),
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

**$title:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$description:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$columnId:** `?string` — Move the idea to the bottom of this column
    
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Workspace
<details><summary><code>$client-&gt;workspace-&gt;retrieve() -> ?RetrieveWorkspaceResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

The workspace the API key or OAuth token is scoped to: its name, the caller's role, whether posts need approval, the active plan, and usage against plan limits (connected channels, and posts used during a free trial). Check `plan.active` and `limits` before bulk scheduling to avoid `402` responses.
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
$client->workspace->retrieve();
```
</dd>
</dl>
</dd>
</dl>


</dd>
</dl>
</details>

## Analytics
<details><summary><code>$client-&gt;analytics-&gt;overview($request) -> ?OverviewAnalyticsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Aggregate engagement totals (impressions, reach, likes, comments, shares, saves, video views, clicks, engagement), follower audience and posts published for the window, plus percent change vs the previous window of the same length. Covers posts published from the workspace's connected accounts. Filter with `platforms` and `socialAccountIds`; `from`/`to` may span up to 400 days. Metrics are collected periodically per post, so the most recent hours may still be filling in.
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
$client->analytics->overview(
    new OverviewAnalyticsRequest([
        'from' => 'from',
        'to' => 'to',
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

**$from:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$platforms:** `?string` 
    
</dd>
</dl>

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

<details><summary><code>$client-&gt;analytics-&gt;platformBreakdown($request) -> ?PlatformBreakdownAnalyticsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Engagement totals for the window grouped by platform, highest engagement first. Covers posts published from the workspace's connected accounts. Filter with `platforms` and `socialAccountIds`; `from`/`to` may span up to 400 days. Metrics are collected periodically per post, so the most recent hours may still be filling in.
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
$client->analytics->platformBreakdown(
    new PlatformBreakdownAnalyticsRequest([
        'from' => 'from',
        'to' => 'to',
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

**$from:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$platforms:** `?string` 
    
</dd>
</dl>

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

<details><summary><code>$client-&gt;analytics-&gt;topPosts($request) -> ?TopPostsAnalyticsResponse</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Posts ranked by `metric` (default `engagementTotal`) accumulated within the window. Covers posts published from the workspace's connected accounts. Filter with `platforms` and `socialAccountIds`; `from`/`to` may span up to 400 days. Metrics are collected periodically per post, so the most recent hours may still be filling in.
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
$client->analytics->topPosts(
    new TopPostsAnalyticsRequest([
        'from' => 'from',
        'to' => 'to',
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

**$from:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$to:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$platforms:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$socialAccountIds:** `?string` 
    
</dd>
</dl>

<dl>
<dd>

**$metric:** `?string` 
    
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

