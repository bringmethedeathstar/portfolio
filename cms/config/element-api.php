<?php

use craft\elements\Entry;

return [
  'endpoints' => [
    'work' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      
      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'work'],
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'image' => [
              'title' => $image->title ?? '',
              'url' => $image->url ?? '',
            ],
            'url' => $entry->url,
            'intro' => $entry->intro,
            'link' => $entry->external,
            'clients' => array_map(function($client) {
              return [
                'title' => $client->title,
                'slug' => $client->slug,
              ];
            }, $entry->clients->all()),
            'topics' => array_map(function($topic) {
              return [
                'title' => $topic->title,
                'slug' => $topic->slug,
              ];
            }, $entry->topics->all()),
          ];
        },
      ];
    },
    // 'news/<entryId:\d+>.json' => function($entryId) {
    //     return [
    //         'elementType' => Entry::class,
    //         'criteria' => ['id' => $entryId],
    //         'one' => true,
    //         'transformer' => function(Entry $entry) {
    //             return [
    //                 'title' => $entry->title,
    //                 'url' => $entry->url,
    //                 'summary' => $entry->summary,
    //                 'body' => $entry->body,
    //             ];
    //         },
    //     ];
    // },
  ]
];