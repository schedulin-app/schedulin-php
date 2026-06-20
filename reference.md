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

**$limit:** `?float` 
    
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

Create a new post with media, tags, and scheduling options
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

<details><summary><code>$client-&gt;posts-&gt;countByTab($request) -> mixed</code></summary>
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

Update an existing post by its ID
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

<details><summary><code>$client-&gt;posts-&gt;getJobStatus($id) -> mixed</code></summary>
<dl>
<dd>

#### 📝 Description

<dl>
<dd>

<dl>
<dd>

Retrieve the processing job status and logs for a post
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
$client->posts->getJobStatus(
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

Remove a connected social media account
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

Set the IANA timezone (e.g. 'America/Los_Angeles') used to interpret queue times for this account.
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

**$limit:** `?float` 
    
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
    new UpdateMediaRequest([
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

**$id:** `string` 
    
</dd>
</dl>

<dl>
<dd>

**$url:** `string` 
    
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

**$limit:** `?float` 
    
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

<details><summary><code>$client-&gt;media-&gt;setTags($mediaId, $request) -> mixed</code></summary>
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

