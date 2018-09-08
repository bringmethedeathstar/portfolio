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
          if ($asset = $entry->main->one()) {
            $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('profile') ];
          }

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'text' => $entry->simple,
            'profile' => $image,
          ];
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
          if ($asset = $entry->main->one()) {
            $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
          }

          if ($query = $entry->client->one()) {
            $client = [ 'title' => $query->title, 'slug' => $query->slug ];
          }

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,
            'link' => $entry->external,
            'image' => $image ?? '',
            'client' => $client ?? '',
            'topics' => array_map(function($topic) {
              return [ 'title' => $topic->title, 'slug' => $topic->slug ];
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
          if ($asset = $entry->main->one()) {
            $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
          }

          if ($query = $entry->client->one()) {
            $icon = $query->icon->one();

            $client = [
              'title' => $query->title,
              'slug' => $query->slug,
              'icon' => $icon ? $icon->getUrl('clientIcon') : '',
            ];
          }

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,
            'link' => $entry->external,
            'image' => $image ?? '',
            'client' => $client ?? '',

            'topics' => array_map(function($topic) {
              return [
                'title' => $topic->title,
                'slug' => $topic->slug,
              ];
            }, $entry->topics->all()),

            'article' => array_map(function($article) {
              $image = [];

              if ($article->type->handle === 'intro') {
                if ($img = $article->image->one()) {
                  $image = [ 'title' => $img->title, 'url' => $img->getUrl($img->style->value) ];
                }
              } else {
               $image = array_map(function($img) {
                  return [
                    'title' => $img->title,
                    'url' => $img->getUrl($img->style->value),
                    'layout' => $img->imgWidth->value
                  ];
                }, $article->image->all());
              }

              return [
                'type' => $article->type->handle,
                'text' => $article->text,
                'id' => $article->id,
                'under' => $article->under,
                'image' => $image,
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
          if ($asset = $entry->main->one()) {
            $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
          }

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,
            'image' => $image ?? '',

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
          if ($asset = $entry->main->one()) {
            $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
          }

          return [
            'title' => $entry->title,
            'slug' => $entry->slug,
            'date' => $entry->postDate,
            'intro' => $entry->intro,

            'image' => $image ?? '',

            'topics' => array_map(function($topic) {
              return [
                'title' => $topic->title,
                'slug' => $topic->slug,
              ];
            }, $entry->topics->all()),

            'article' => array_map(function($article) {
              if ($asset = $entry->main->one()) {
                $image = [ 'title' => $asset->title, 'url' => $asset->getUrl('work') ];
              }

              return [
                'type' => $article->type->handle,
                'text' => $article->text,
                'image' => $image ?? '',
              ];
            }, $entry->basic->all()),
          ];
        },
      ];
    },
  ]
];