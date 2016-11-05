Yii2 SEO Component
-------------------
Yii2 Component to manage SEO data and metadata developed starting from  
https://github.com/jpunanua/yii2-seotools/blob/master/Component.php

Features
---------

 - setTitle
 - setDescription
 - setKeywords
 - setAuthor
 - setCopyright
 - setRobots
 - setSocialAPP
 - setVerifyCodes
 - setMicroData
 - setCanonical

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
------

Once the extension is installed, simply use it in your code adding on your main view:

```
Yii::$app->seo->setMeta(['title' => $this->title]);
```

and on rendering your page you can set your meta information like:

```
Yii::$app->seo->setDescrption('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua');
```

Changelog
----------

 - 1.0.0 - Initial Release
 
