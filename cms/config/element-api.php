<?php

use craft\elements\Entry;

return [
  'endpoints' => [
    'layout' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'site'],
        'paginate' => false,
        'transformer' => function(Entry $entry) {
          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
          ];
        },
      ];
    },

    'intro' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['id' => 26],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();

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
        'paginate' => false,
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();
          $client = $entry->client->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,
            'link' => $entry->external,

            'image' => [
              'title' => $image->title ?? '',
              'url' => $image->getUrl('work') ?? '',
            ],

            'client' => [
              'title' => $client->title,
              'slug' => $client->slug,
            ],

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
    'work/<slug:{slug}>' => function($slug) {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'work', 'slug' => $slug],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();
          $client = $entry->client->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,
            'link' => $entry->external,

            'image' => [
              'title' => $image->title ?? '',
              'url' => $image ? $image->getUrl('hero') : '',
            ],
            
            'client' => [
              'title' => $client->title,
              'slug' => $client->slug,
              'icon' => $client->icon->one()->getUrl('clientIcon') ?? '',
            ],

            'topics' => array_map(function($topic) {
              return [
                'title' => $topic->title,
                'slug' => $topic->slug,
              ];
            }, $entry->topics->all()),

            'article' => array_map(function($article) {
              $image = $article->image->one();

              return [
                'type' => $article->type->handle,
                'text' => $article->text,
                'under' => $article->under,
                'image' => [
                  'title' => $image->title ?? '',
                  'url' => $image ? $image->getUrl('basicProject') : '',
                ],
              ];
            }, $entry->basic->all()),
          ];
        },
      ];
    },

    'blog' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'blog'],
        'paginate' => false,
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,

            'image' => [
              'title' => $image->title ?? '',
              'url' => $image->getUrl('work') ?? '',
            ],

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
    'blog/<slug:{slug}>' => function($slug) {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'blog', 'slug' => $slug],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $image = $entry->main->one();

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,

            'image' => [
              'title' => $image->title ?? '',
              'url' => $image ? $image->getUrl('hero') : '',
            ],

            'topics' => array_map(function($topic) {
              return [
                'title' => $topic->title,
                'slug' => $topic->slug,
              ];
            }, $entry->topics->all()),

            'article' => array_map(function($article) {
              $image = $article->image->one();

              return [
                'type' => $article->type->handle,
                'text' => $article->text,
                'image' => [
                  'title' => $image->title ?? '',
                  'url' => $image ? $image->getUrl('basicProject') : '',
                ],
              ];
            }, $entry->basic->all()),
          ];
        },
      ];
    },
  ]
];