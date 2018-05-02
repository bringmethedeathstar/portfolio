<?php

use craft\elements\Entry;

return [
  'endpoints' => [
    'intro' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['id' => 26],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $image = $entry->profile->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'text' => $entry->simple,
            'profile' => [
              'title' => $image->title ?? '',
              'url' => $image->url ?? '',
            ],
          ];
        },
      ];
    },

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
            'url' => $entry->url,
            'intro' => $entry->intro,
            'link' => $entry->external,
            'image' => [
              'title' => $image->title ?? '',
              'url' => $image->getUrl('work') ?? '',
            ],
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
    'work/<slug:{slug}>.json' => function($slug) {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['slug' => $slug],
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'url' => $entry->url,
            'intro' => $entry->intro,
            'link' => $entry->external,
            'image' => [
              'title' => $image->title ?? '',
              'url' => $image->getUrl('work') ?? '',
            ],
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
  ]
];