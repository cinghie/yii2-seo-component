Yii2 SEO Component
-------------------

![Latest Stable Version](https://img.shields.io/packagist/v/cinghie/yii2-seo-component.svg)
![License](https://img.shields.io/packagist/l/cinghie/yii2-seo-component.svg)
![Latest Release Date](https://img.shields.io/github/release-date/cinghie/yii2-seo-component.svg)
![Latest Commit](https://img.shields.io/github/last-commit/cinghie/yii2-seo-component.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/cinghie/yii2-seo-component.svg)](https://packagist.org/packages/cinghie/yii2-seo-component)

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

or can manually set Microdata Snippet like:

```
setMicrodata($type,$name,$email,$phone,$logo,$url=);
```
