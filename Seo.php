<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-seo-component
 * @license GNU GENERAL PUBLIC LICENSE VERSION 3
 * @package yii2-seo-component
 * @version 0.1.0
 */

namespace cinghie\seo;

use Yii;
use yii\base\Component;

class Seo extends Component 
{
    /**
     * Register title meta and open graph title meta
     * @param string $title
     * @return $this
     */
    public function setTitle($title="")
    {
        if (!empty($title)) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'title', 'content' => $title], 'title'
            );
            Yii::$app->view->registerMetaTag(
                ['name' => 'og:title', 'content' => $title], 'og:title'
            );
            Yii::$app->view->title = $title;
        }
        return $this;
    }

    /**
     * Register description meta and open graph description meta
     * @param string $description
     * @return $this
     */
    public function setDescription($description="")
    {
        if (!empty($description)) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'description', 'content' => $description], 'description'
            );
            Yii::$app->view->registerMetaTag(
                ['name' => 'og:description', 'content' => $description], 'og:description'
            );
        } elseif(Yii::$app->settings->get('siteDescription', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'description', 'content' => Yii::$app->settings->get('siteDescription', 'Configurations')], 'description'
            );
            Yii::$app->view->registerMetaTag(
                ['name' => 'og:description', 'content' => Yii::$app->settings->get('siteDescription', 'Configurations')], 'og:description'
            );
        }
        return $this;
    }

    /**
     * Register keywords meta
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords="")
    {
        if (!empty($keywords)) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'keywords', 'content' => $keywords ], 'keywords'
            );
        } elseif (Yii::$app->settings->get('siteKeywords', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'keywords', 'content' => Yii::$app->settings->get('siteKeywords', 'Configurations')], 'keywords'
            );
        }
        return $this;
    }

    /**
     * Register the author meta
     * @param string $author
     * @return $this
     */
    public function setAuthor($author="")
    {
        if (!empty($author)) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'author', 'content' => $author], 'author'
            );
        } elseif (Yii::$app->settings->get('siteAuthor', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'author', 'content' => Yii::$app->settings->get('siteAuthor', 'Configurations')], 'author'
            );
        }
        return $this;
    }

    /**
     * Register the copyright meta
     * @param string $copyright
     * @return $this
     */
    public function setCopyright($copyright="")
    {
        if (!empty($copyright)) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'copyright', 'content' => $copyright], 'copyright'
            );
        } elseif (Yii::$app->settings->get('siteCopyright', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'copyright', 'content' => Yii::$app->settings->get('siteCopyright', 'Configurations')], 'copyright'
            );
        }
        return $this;
    }

    /*
     * Register robots meta
     * @param string $robots
     * @return $this
     */
    public function setRobots($robots="")
    {
        if (!empty($robots)) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'robots', 'content' => $robots], 'robots'
            );
        } elseif (Yii::$app->settings->get('siteRobots', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'robots', 'content' => Yii::$app->settings->get('siteRobots', 'Configurations')], 'robots'
            );
        }
        return $this;
    }

    /**
     * Set Social App meta tag
     * @param array
     * @return $this
     */
    public function setSocialAPP($metaAPP=[])
    {
        // Facebook APP ID
        if (!empty($metaAPP['fb:app_id'])) {
            Yii::$app->view->registerMetaTag([
                'name' => 'fb:app_id', 'content' => $metaAPP['fb:app_id']], 'fb:app_id'
            );
        } else if (Yii::$app->settings->get('facebookApp', 'Configurations')){
            Yii::$app->view->registerMetaTag([
                'name' => 'fb:app_id', 'content' => Yii::$app->settings->get('facebookApp', 'Configurations')], 'fb:app_id'
            );
        }
        // Apple iTunes APP ID
        if (!empty($metaAPP['apple-itunes-app'])) {
            Yii::$app->view->registerMetaTag([
                'name' => 'apple-itunes-app', 'content' => $metaAPP['apple-itunes-app']], $metaAPP['apple-itunes-app']
            );
        } else if (Yii::$app->settings->get('appleItunesApp', 'Configurations')){
            Yii::$app->view->registerMetaTag([
                'name' => 'apple-itunes-app', 'content' => Yii::$app->settings->get('appleItunesApp', 'Configurations')], Yii::$app->settings->get('appleItunesApp', 'Configurations')
            );
        }
        // Android Play Store APP Package
        if (!empty($metaAPP['google-play-app'])) {
            Yii::$app->view->registerMetaTag([
                'name' => 'google-play-app', 'content' => "app-id=".$metaAPP['google-play-app']], 'google-play-app'
            );
        } else if (Yii::$app->settings->get('androidPlayStore', 'Configurations')){
            Yii::$app->view->registerMetaTag([
                'name' => 'google-play-app', 'content' => "app-id=".Yii::$app->settings->get('androidPlayStore', 'Configurations')], 'google-play-app'
            );
        }
        return $this;
    }

    /**
     * Set Verifications meta tag
     * @param array
     * @return $this
     */
    public function setVerifyCodes($verifyCodes=[])
    {
        if (!empty($verifyCode)) {
            foreach($verifyCode as $key => $value) {
                Yii::$app->view->registerMetaTag(
                    ['name' => $key, 'content' => $value], $key
                );
            }
        }
        if(Yii::$app->settings->get('alexaVerify', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'alexaVerifyID', 'content' => Yii::$app->settings->get('alexaVerify', 'Configurations')], 'alexaVerifyID'
            );
        }
        if(Yii::$app->settings->get('bingVerify', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'google-site-verification', 'content' => Yii::$app->settings->get('bingVerify', 'Configurations')], 'google-site-verification'
            );
        }
        if(Yii::$app->settings->get('googleVerify', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'msvalidate.01', 'content' => Yii::$app->settings->get('googleVerify', 'Configurations')], 'msvalidate.01'
            );
        }
        if(Yii::$app->settings->get('yandexVerify', 'Configurations')) {
            Yii::$app->view->registerMetaTag(
                ['name' => 'yandex-verification', 'content' => Yii::$app->settings->get('yandexVerify', 'Configurations')], 'yandex-verification'
            );
        }
        return $this;
    }

    /**
     * Register Canonical url
     * @param string $url
     * @return $this
     */
    public function setCanonical($url)
    {
        Yii::$app->view->registerLinkTag(
            ['href' => $url, 'rel' => 'canonical'], 'canonical'
        );
        return $this;
    }

    /**
     * Set Meta Informations
     * @param array $settings
     */
    public function setMeta($settings)
    {
        $this->setTitle($settings['title'])
             ->setDescription()
             ->setKeywords()
             ->setRobots()
             ->setAuthor()
             ->setCopyright()
             ->setSocialAPP()
             ->setVerifyCodes();
    }
    
}
