<?php

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
            Yii::$app->view->registerMetaTag(['name' => 'title', 'content' => $title], 'title');
            Yii::$app->view->registerMetaTag(['name' => 'og:title', 'content' => $title], 'og:title');
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
            Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $description], 'description');
            Yii::$app->view->registerMetaTag(['name' => 'og:description', 'content' => $description], 'og:description');
        } else if(Yii::$app->settings->get('siteDescription', 'Configurations')) {
            Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->settings->get('siteDescription', 'Configurations')], 'description');
            Yii::$app->view->registerMetaTag(['name' => 'og:description', 'content' => Yii::$app->settings->get('siteDescription', 'Configurations')], 'og:description');
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
            Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $keywords], 'keywords');
        } elseif (Yii::$app->settings->get('siteKeywords', 'Configurations')) {
            Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->settings->get('siteKeywords', 'Configurations')], 'keywords');
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
            Yii::$app->view->registerMetaTag(['name' => 'author', 'content' => $author], 'author');
        } elseif (Yii::$app->settings->get('siteAuthor', 'Configurations')) {
            Yii::$app->view->registerMetaTag(['name' => 'author', 'content' => Yii::$app->settings->get('siteAuthor', 'Configurations')], 'author');
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
            Yii::$app->view->registerMetaTag(['name' => 'copyright', 'content' => $copyright], 'copyright');
        } elseif (Yii::$app->settings->get('siteCopyright', 'Configurations')) {
            Yii::$app->view->registerMetaTag(['name' => 'copyright', 'content' => Yii::$app->settings->get('siteCopyright', 'Configurations')], 'copyright');
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
            Yii::$app->view->registerMetaTag(['name' => 'robots', 'content' => $robots], 'robots');
        } elseif (Yii::$app->settings->get('siteRobots', 'Configurations')) {
            Yii::$app->view->registerMetaTag(['name' => 'robots', 'content' => Yii::$app->settings->get('siteRobots', 'Configurations')], 'robots');
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
        Yii::$app->view->registerLinkTag(['href' => $url, 'rel' => 'canonical'], 'canonical');
        return $this;
    }

    /**
     * Set Meta Informations
     */
    public function setMeta($settings) {
        $this->setTitle($settings['title'])
             ->setDescription()
             ->setKeywords()
             ->setRobots()
             ->setAuthor()
             ->setCopyright();
    }
    
}
