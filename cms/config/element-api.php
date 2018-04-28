<?php

use craft\elements\Entry;

return [
  'endpoints' => [
    'work' => [
      'elementType' => Entry::class,
      'criteria' => ['section' => 'work'],
      'transformer' => function(Entry $entry) {
        return [
          'title' => $entry->title,
          'slug' => $entry->slug,
          'image' => '',
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
    ],
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