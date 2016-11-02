Yii2 SEO Component
-------------------
Yii2 Component to manage SEO data and metadata developed starting from https://github.com/jpunanua/yii2-seotools/blob/master/Component.php

Installation
-------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
$ php composer.phar require cinghie/yii2-seo-component "*"
```

or add

```
"cinghie/yii2-seo-component": "*"
```

Configuration
---------------

```
'components' => [ 

    'seo' => [
        'class' => 'cinghie\seo\Seo'
    ],
    
]
```

Usage
-----

Once the extension is installed, simply use it in your code by:

```
Yii::$app->seo->setMeta([
    'title' => $this->title
]);
```
