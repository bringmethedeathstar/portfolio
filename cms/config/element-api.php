<?php

use craft\elements\Entry;
use crystal\ratchet\Fields;

return [
  'endpoints' => [
    'rest/generate' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['id' => 26],
        'one' => true,
        'paginate' => false,
        'transformer' => function() {
          return array_map(function($entry) {
            return '/' . ($entry->slug === 'intro' ? '' : $entry->uri);
          }, Entry::findAll());
        },
      ];
    },

    'rest/intro' => function() {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['id' => 26],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $ratchet = new Fields([
            'fields' => [
              'main' => ['transforms' => ['profile', 'featured', 'work']],
              'featuredWork' => ['only' => ['main', 'intro']]
            ],
          ]);

          return $ratchet->run($entry);
        },
      ];
    },

    'rest/work' => function() {
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

    'rest/work/<slug:{slug}>' => function($slug) {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'work', 'slug' => $slug],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $ratchet = new Fields([
            'fields' => [
              'main' => ['transforms' => ['featured', 'work']],
              'screenshot' => ['transforms' => ['screenshotCrop', 'screenshotFull']],
            ],
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


    'rest/<slug:{slug}>' => function($slug) {
      \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');

      return [
        'elementType' => Entry::class,
        'criteria' => ['section' => 'site', 'slug' => $slug],
        'one' => true,
        'transformer' => function(Entry $entry) {
          $ratchet = new Fields([
            'fields' => [
              'main' => ['transforms' => ['profile', 'featured', 'work']],
            ],
          ]);

          return $ratchet->run($entry);
        },
      ];
    },
  ]
];