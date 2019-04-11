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
use yii\helpers\Html;

/**
 * Class SEO
 *
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $canonical
 * @property string $copyright
 * @property string $keywords
 * @property string $author
 * @property array $meta
 * @property array $socialAPP
 * @property string $robots
 * @property array $verifyCodes
 */
class Seo extends Component
{
	/**
	 * Register open graph sitename
	 *
	 * return $this
	 */
	public function setSitename()
	{
		if(Yii::$app->settings->get('siteName', 'Configurations')) {
			Yii::$app->view->registerMetaTag(
				['name' => 'og:site_name', 'content' => Yii::$app->settings->get('siteName', 'Configurations')], 'og:site_name'
			);
		}

		return $this;
	}

	/**
	 * Register open graph image
	 *
	 * @param string $imageUrl
	 *
	 * @return $this
	 */
	public function setImage($imageUrl = '')
	{
		if($imageUrl) {
			Yii::$app->view->registerMetaTag(
				['name' => 'og:image', 'content' => $imageUrl], 'og:image'
			);
		}

		return $this;
	}

    /**
     * Register title meta and open graph title meta
     *
     * @param string $title
     *
     * @return $this
     */
    public function setTitle($title = '')
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
     *
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description = '')
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
     *
     * @param string $keywords
     *
     * @return $this
     */
    public function setKeywords($keywords= '')
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
     *
     * @param string $author
     *
     * @return $this
     */
    public function setAuthor($author= '')
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
     *
     * @param string $copyright
     *
     * @return $this
     */
    public function setCopyright($copyright= '')
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

    /**
     * Register robots meta
     *
     * @param string $robots
     *
     * @return $this
     */
    public function setRobots($robots= '')
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
     *
     * @param array $metaAPP
     *
     * @return $this
     */
    public function setSocialAPP(array $metaAPP = [])
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
                'name' => 'google-play-app', 'content' => 'app-id=' .$metaAPP['google-play-app']], 'google-play-app'
            );
        } else if (Yii::$app->settings->get('androidPlayStore', 'Configurations')){
            Yii::$app->view->registerMetaTag([
                'name' => 'google-play-app', 'content' => 'app-id=' .Yii::$app->settings->get('androidPlayStore', 'Configurations')], 'google-play-app'
            );
        }

        return $this;
    }

    /**
     * Set Verifications meta tag
     *
     * @param array $verifyCodes
     *
     * @return $this
     */
    public function setVerifyCodes(array $verifyCodes = [])
    {
        if (!empty($verifyCodes)) {
            foreach($verifyCodes as $key => $value) {
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
	 *
	 * @param string $type
	 * @param string $name
	 * @param string $email
	 * @param string $phone
	 * @param string $logo
	 * @param string $url
	 *
	 * @return void
	 */
    public function setMicrodata($type= '', $name= '', $email= '', $phone= '', $logo= '', $url= '')
    {
        if((int) Yii::$app->settings->get('siteMicrodata', 'Configurations'))
        {
            $microdata = '{"@context": "http://schema.org",';

            /**
             * Adding Type
             */
            if($type) {
                $microdata .= '"@type": "' . $type . '",';
            } elseif(Yii::$app->settings->get('metaType', 'Configurations')) {
                $microdata .= '"@type": "' . Yii::$app->settings->get('metaType', 'Configurations') . '",';
            }

            /**
             * Adding Name
             */
            if($name) {
                $microdata .= '"name": "' . $name . '",';
            } elseif(Yii::$app->settings->get('metaName', 'Configurations')) {
                $microdata .= '"name": "' . Yii::$app->settings->get('metaName', 'Configurations') . '",';
            }

            /**
             * Adding Email
             */
            if($email) {
                $microdata .= '"email": "' . $email . '",';
            } elseif(Yii::$app->settings->get('metaEmail', 'Configurations')) {
                $microdata .= '"email": "' . Yii::$app->settings->get('metaEmail', 'Configurations') . '",';
            }

            /**
             * Adding Telephone
             */
            if($phone) {
                $microdata .= '"telephone": "' . $phone . '",';
            } elseif(Yii::$app->settings->get('metaPhone', 'Configurations')) {
                $microdata .= '"telephone": "' . Yii::$app->settings->get('metaPhone', 'Configurations') . '",';
            }

            /**
             * Adding Logo
             */
            if($logo) {
                $microdata .= '"logo": "' . $logo . '",';
            } elseif(Yii::$app->settings->get('metaImg', 'Configurations')) {
                $microdata .= '"logo": "' . Yii::$app->settings->get('metaImg', 'Configurations') . '",';
            }

            /**
             * Adding URL
             */
            if($url) {
                $microdata .= '"url": "' . $url . '",';
            } elseif(Yii::$app->settings->get('metaUrl', 'Configurations')) {
                $microdata .= '"url": "' . Yii::$app->settings->get('metaUrl', 'Configurations') . '",';
            }

            /**
             * Adding Social Pages
             */
            if( Yii::$app->settings->get('facebookPage', 'Configurations') || Yii::$app->settings->get('googlePlusPage', 'Configurations') || Yii::$app->settings->get('twitterPage', 'Configurations') )
            {
                $microdata .= '"sameAs":[';

                if(Yii::$app->settings->get('facebookPage', 'Configurations')) {
	                $microdata .= '"'.Yii::$app->settings->get('facebookPage', 'Configurations').'",';
                }

                if(Yii::$app->settings->get('googlePlusPage', 'Configurations')) {
	                $microdata .= '"' . Yii::$app->settings->get('googlePlusPage', 'Configurations') . '",';
                }

                if(Yii::$app->settings->get('twitterPage', 'Configurations')) {
	                $microdata .= '"' . Yii::$app->settings->get('twitterPage', 'Configurations') . '",';
                }

                $microdata = trim($microdata, ',');
                $microdata .= ']';

            } else {

                $microdata = trim($microdata, ',');
            }

            $microdata .= '}';

            //$view = Yii::$app->getView();
	        echo Html::script($microdata, ['type' => 'application/ld+json']);
        }
    }

    /**
     * Register Canonical url
     *
     * @param string $url
     *
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
     *
     * @param array $settings
     */
    public function setMeta($settings)
    {
        $this->setTitle($settings['title'])
	         ->setSitename()
             ->setDescription()
             ->setKeywords()
             ->setRobots()
             ->setAuthor()
             ->setCopyright()
             ->setSocialAPP()
             ->setVerifyCodes();
    }
}
