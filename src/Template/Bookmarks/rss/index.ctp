<?php
$this->set('channel', [
    'title' => __("Most Recent Bookmarks"),
    'link' => $this->Url->build('/', true),
    'description' => __("Most recent Bookmarks."),
    'language' => 'en-us'
]);

foreach ($bookmarks as $bookmark) {
        $created = strtotime($bookmark->created);
        $link = [
            'controller' => 'Bookmarks',
            
            'year' => date('Y', $created),
            'month' => date('m', $created),
            'day' => date('d', $created),
            'slug' => $bookmark->url,
            'action' => 'view',$bookmark->id
        ];

// Remove & escape any HTML to make sure the feed content will validate.
    $body = h(strip_tags($bookmark->description));
    $body = $this->Text->truncate($body, 400, [
        'ending' => '...',
        'exact' => true,
        'html' => true,
    ]);
    echo $this->Rss->item([], [
        'title' => $bookmark->title,
        'link' => $link,
        'guid' => ['url' => $link, 'isPermaLink' => 'true'],
        'description' => $body,
        'pubDate' => $bookmark->created
    ]);
}