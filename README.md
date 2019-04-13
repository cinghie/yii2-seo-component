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

Set Verify Codes

```
Yii::$app->seo->setMetaTags([
    'title' => $this->title, // default: $this->title
    'author' => '', // default: Yii::$app->settings->get('siteAuthor', 'Configurations')
    'copyright' => '', // default: Yii::$app->settings->get('siteCopyright', 'Configurations') 
    'description' => '', // default: Yii::$app->settings->get('siteDescription', 'Configurations')
    'keywords' => '', // default: Yii::$app->settings->get('siteKeywords', 'Configurations')
    'robots' => '',
]);
```

Set OpenGraph

```
Yii::$app->seo->setOpenGraph([
    'title' => $this->title, // default: $this->title
    'description' => '', // default: Yii::$app->settings->get('siteDescription', 'Configurations')
    'image' => $this->image, // default: null
    'sitename' => '', // default: Yii::$app->settings->get('siteName', 'Configurations')
    'type' => 'article', // default: 'article'
    'url' => '', // default: Yii::$app->request->absoluteUrl
]);
```

Set Social APP

```
Yii::$app->seo->setSocialAPP([
    'fb:app_id' => 'FACEBOOK_APP_ID',
    'apple-itunes-app' => 'APPLE_ITUNE_APP',
    'google-play-app' => 'GOOGLE_PLAY_APP',
]);
```

Set Verify Codes

```
Yii::$app->seo->setVerifyCodes([
	'alexaVerify' => 'ALEXA_VERIFY_CODE',
	'bingVerify' => 'BING_VERIFY_CODE',
	'googleVerify' => 'GOOGLE_VERIFY_CODE',
	'yandexVerify' => 'YANDEX_VERIFY_CODE',
]);
```

