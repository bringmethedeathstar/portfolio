<?php

use craft\elements\Entry;
use crystal\ratchet\Fields;

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
          $ratchet = new Fields([
            'fields' => [
              'main' => ['transforms' => ['profile', 'featured']],
              'featuredWork' => ['only' => ['main', 'intro']]
            ],
          ]);

          return $ratchet->run($entry);
        },
      ];
    },

    'work' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'work', 'orderBy' => 'postDate desc'],
        'paginate' => false,
        'transformer' => function(Entry $entry) {
          $ratchet = new Fields([
            'fields' => ['main' => ['transforms' => ['work']]],
            '^exclude' => ['basic', 'topics'],
            '^include' => [
              'date' => function($entry) {
                return $entry->postDate;
              },
            ],
          ]);

          return $ratchet->run($entry);
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
          $ratchet = new Fields([
            'fields' => ['main' => ['transforms' => ['featured']]],
            '^exclude' => ['basic', 'topics'],
            '^include' => [
              'date' => function($entry) {
                return $entry->postDate;
              },
            ],
          ]);

          return $ratchet->run($entry);
        },
      ];
    },

    // 'blog' => function() {
    //   \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

    //   return [
    //     'elementType' => Entry::class,
    //     'criteria' => ['section' => 'blog'],
    //     'paginate' => false,
    //     'transformer' => function(Entry $entry) {
    //       if ($asset = $entry->main->one()) {
    //         $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
    //       }

    //       return [
    //         'title' => $entry->title,
    //         'slug' => $entry->slug,
    //         'date' => $entry->postDate,
    //         'intro' => $entry->intro,
    //         'image' => $image ?? '',

    //         'topics' => array_map(function($topic) {
    //           return [
    //             'title' => $topic->title,
    //             'slug' => $topic->slug,
    //           ];
    //         }, $entry->topics->all()),
    //       ];
    //     },
    //   ];
    // },
    // 'blog/<slug:{slug}>' => function($slug) {
    //   \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

    //   return [
    //     'elementType' => Entry::class,
    //     'criteria' => ['section' => 'blog', 'slug' => $slug],
    //     'one' => true,
    //     'transformer' => function(Entry $entry) {
    //       if ($asset = $entry->main->one()) {
    //         $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
    //       }

    //       return [
    //         'title' => $entry->title,
    //         'slug' => $entry->slug,
    //         'date' => $entry->postDate,
    //         'intro' => $entry->intro,

    //         'image' => $image ?? '',

    //         'topics' => array_map(function($topic) {
    //           return [
    //             'title' => $topic->title,
    //             'slug' => $topic->slug,
    //           ];
    //         }, $entry->topics->all()),

    //         'article' => array_map(function($article) {
    //           if ($asset = $entry->main->one()) {
    //             $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
    //           }

    //           return [
    //             'type' => $article->type->handle,
    //             'text' => $article->text,
    //             'image' => $image ?? '',
    //           ];
    //         }, $entry->basic->all()),
    //       ];
    //     },
    //   ];
    // },
  ]
];