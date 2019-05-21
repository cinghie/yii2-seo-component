<?php

/**
 * @copyright Copyright &copy; Gogodigital Srls
 * @company Gogodigital Srls - Wide ICT Solutions
 * @website http://www.gogodigital.it
 * @github https://github.com/cinghie/yii2-seo-component
 * @license GNU GENERAL PUBLIC LICENSE VERSION 3
 * @package yii2-seo-component
 * @version 1.1.0
 */

namespace cinghie\seo;

use Spatie\SchemaOrg\Schema;
use Yii;
use yii\base\Component;

/**
 * Class SEO
 *
 * @property string $title
 * @property string $canonical
 * @property string $description
 * @property string $keywords
 * @property string $author
 * @property string $copyright
 * @property string $robots
 * @property string $openGraphTitle
 * @property string $openGraphType
 * @property string $openGraphSiteName
 * @property string $openGraphDescription
 * @property string $openGraphUrl
 * @property string $openGraphImage
 * @property string $openGraphLocale
 * @property string $facebookPageId
 * @property string $facebookAppId
 * @property string $socialApp
 * @property string $verifyCode
 * @property string $verifyCodes
 * @property string $metaTags
 * @property string $openGraph
 */
class Seo extends Component
{
	/**
	 * Register Title
	 *
	 * @param string $title
	 *
	 * @return $this
	 */
	public function setTitle($title = '')
	{
		if ($title) {
			Yii::$app->view->registerMetaTag(
				['name' => 'title', 'content' => $title], 'title'
			);
			Yii::$app->view->title = $title;
		}
		return $this;
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
	 * Register Description Meta Tag
	 *
	 * @param string $description
	 *
	 * @return $this
	 */
	public function setDescription($description = '')
	{
		if ($description) {
			Yii::$app->view->registerMetaTag(
				['name' => 'description', 'content' => $description], 'description'
			);
		} elseif(Yii::$app->settings->get('siteDescription', 'Configurations')) {
			Yii::$app->view->registerMetaTag(
				['name' => 'description', 'content' => Yii::$app->settings->get('siteDescription', 'Configurations')], 'description'
			);
		}

		return $this;
	}

	/**
	 * Register Keywords Meta Tag
	 *
	 * @param string $keywords
	 *
	 * @return $this
	 */
	public function setKeywords($keywords = '')
	{
		if ($keywords) {
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
	 * Register Author Meta Tag
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
	 * Register Copyright Meta Tag
	 *
	 * @param string $copyright
	 *
	 * @return $this
	 */
	public function setCopyright($copyright= '')
	{
		if ($copyright) {
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
	 * Register Robots Meta Tag
	 *
	 * @param string $robots
	 *
	 * @return $this
	 */
	public function setRobots($robots = '')
	{
		if ($robots) {
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
	 * Register OpenGraph title
	 *
	 * @param string $title
	 *
	 * @return $this
	 */
	public function setOpenGraphTitle($title = '')
	{
		$title = $title ?: $this->title;

		if ($title) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:title', 'content' => $title], 'og:title'
			);
		}

		return $this;
	}

	/**
	 * Register OpenGraph type
	 *
	 * @param string $type
	 *
	 * @return $this
	 */
	public function setOpenGraphType($type = 'article')
	{
		if($type) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:type', 'content' => $type], 'og:type'
			);
		}

		return $this;
	}

	/**
	 * Register OpenGraph site_name
	 *
	 * @param string $siteName
	 *
	 * @return $this
	 */
	public function setOpenGraphSiteName($siteName)
	{
		if(!$siteName) {
			$siteName = Yii::$app->settings->get('siteName', 'Configurations') ?: Yii::$app->name;
		}

		Yii::$app->view->registerMetaTag(
			['property' => 'og:site_name', 'content' => $siteName], 'og:site_name'
		);

		return $this;
	}

	/**
	 * Register OpenGraph description
	 *
	 * @param string $description
	 *
	 * @return $this
	 */
	public function setOpenGraphDescription($description = '')
	{
		if ($description) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:description', 'content' => $description], 'og:description'
			);
		} elseif(Yii::$app->settings->get('siteDescription', 'Configurations')) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:description', 'content' => Yii::$app->settings->get('siteDescription', 'Configurations')], 'og:description'
			);
		}

		return $this;
	}

	/**
	 * Register OpenGraph url
	 *
	 * @param string $url
	 *
	 * @return $this
	 */
	public function setOpenGraphUrl($url = '')
	{
		$url = $url ?: Yii::$app->request->absoluteUrl;

		Yii::$app->view->registerMetaTag(
			['property' => 'og:url', 'content' => $url], 'og:url'
		);

		return $this;
	}

	/**
	 * Register OpenGraph image
	 *
	 * @param string $imageUrl
	 *
	 * @return $this
	 */
	public function setOpenGraphImage($imageUrl = '')
	{
		if($imageUrl) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:image', 'content' => $imageUrl], 'og:image'
			);
		}

		return $this;
	}

	/**
	 * Register OpenGraph locale
	 *
	 * @param $lang
	 *
	 * @return $this
	 */
	public function setOpenGraphLocale($lang = '')
	{
		$lang = $lang ?: str_replace('-','_',Yii::$app->sourceLanguage);

		Yii::$app->view->registerMetaTag(
			['property' => 'og:locale', 'content' => $lang], 'og:locale'
		);

		return $this;
	}

	/**
	 * Set Facebook App ID
	 *
	 * @param string $FbAppId
	 *
	 * @return $this
	 */
	public function setFacebookAppId($FbAppId = '')
	{
		if ($FbAppId) {
			Yii::$app->view->registerMetaTag([
				'property' => 'fb:app_id', 'content' => $FbAppId], 'fb:app_id'
			);
		} else if (Yii::$app->settings->get('facebookApp', 'Configurations')){
			Yii::$app->view->registerMetaTag([
				'property' => 'fb:app_id', 'content' => Yii::$app->settings->get('facebookApp', 'Configurations')], 'fb:app_id'
			);
		}

		return $this;
	}

	/**
	 * Set Facebook Page ID
	 *
	 * @param string $FbPageID
	 *
	 * @return $this
	 */
	public function setFacebookPageId($FbPageID = '')
	{
		if ($FbPageID) {
			Yii::$app->view->registerMetaTag([
				'property' => 'fb:page_id', 'content' => $FbPageID], 'fb:page_id'
			);
		}

		return $this;
	}

	/**
	 * Set Meta Informations
	 *
	 * @param array $settings
	 */
	public function setMetaTags($settings)
	{
		$this->setTitle($settings['title'])
			->setDescription($settings['description'])
			->setKeywords($settings['keywords'])
			->setRobots($settings['robots'])
			->setAuthor($settings['author'])
			->setCopyright($settings['copyright']);
	}

	/**
	 * Set Open Graph
	 *
	 * @param array $settings
	 */
	public function setOpenGraph($settings)
	{
		$this->setOpenGraphTitle($settings['title'])
			 ->setOpenGraphDescription($settings['description'])
			 ->setOpenGraphType($settings['type'])
			 ->setOpenGraphUrl($settings['url'])
			 ->setOpenGraphImage($settings['image'])
			 ->setOpenGraphLocale()
			 ->setOpenGraphSitename($settings['sitename']);
	}

	/**
	 * Set Social App Meta Tags
	 *
	 * @param array $metaApp
	 *
	 * @return $this
	 */
	public function setSocialApp(array $metaApp = [])
	{
		// Facebook App ID
		$FbAppId = isset($metaApp['fb:app_id']) ? $metaApp['fb:app_id'] : '';
		$this->setFacebookAppId($FbAppId);

		// Apple iTunes App ID
		if (isset($metaApp['apple-itunes-app']) && $metaApp['apple-itunes-app']) {
			Yii::$app->view->registerMetaTag([
				'name' => 'apple-itunes-app', 'content' => $metaApp['apple-itunes-app']], $metaApp['apple-itunes-app']
			);
		} else if (Yii::$app->settings->get('appleItunesApp', 'Configurations')){
			Yii::$app->view->registerMetaTag([
				'name' => 'apple-itunes-app', 'content' => Yii::$app->settings->get('appleItunesApp', 'Configurations')], Yii::$app->settings->get('appleItunesApp', 'Configurations')
			);
		}

		// Android Play Store App Package
		if (isset($metaApp['google-play-app']) && $metaApp['google-play-app']) {
			Yii::$app->view->registerMetaTag([
				'name' => 'google-play-app', 'content' => 'app-id=' .$metaApp['google-play-app']], 'google-play-app'
			);
		} else if (Yii::$app->settings->get('androidPlayStore', 'Configurations')){
			Yii::$app->view->registerMetaTag([
				'name' => 'google-play-app', 'content' => 'app-id=' .Yii::$app->settings->get('androidPlayStore', 'Configurations')], 'google-play-app'
			);
		}

		return $this;
	}

	/**
	 * Set Verifications Meta Tags
	 *
	 * @param array $verifyCodes
	 *
	 * @return $this
	 */
	public function setVerifyCodes(array $verifyCodes = [])
	{
		$alexaVerify = $verifyCodes['alexaVerify'] ?: Yii::$app->settings->get('alexaVerify', 'Configurations');

		if($alexaVerify) {
			Yii::$app->view->registerMetaTag(
				['name' => 'alexaVerifyID', 'content' => $alexaVerify], 'alexaVerifyID'
			);
		}

		$bingVerify = $verifyCodes['bingVerify'] ?: Yii::$app->settings->get('bingVerify', 'Configurations');

		if($bingVerify) {
			Yii::$app->view->registerMetaTag(
				['name' => 'msvalidate.01', 'content' => $bingVerify], 'msvalidate.01'
			);
		}

		$googleVerify = $verifyCodes['googleVerify'] ?: Yii::$app->settings->get('googleVerify', 'Configurations');

		if($googleVerify) {
			Yii::$app->view->registerMetaTag(
				['name' => 'google-site-verification', 'content' => $googleVerify], 'google-site-verification'
			);
		}

		$yandexVerify = $verifyCodes['yandexVerify'] ?: Yii::$app->settings->get('yandexVerify', 'Configurations');

		if($yandexVerify) {
			Yii::$app->view->registerMetaTag(
				['name' => 'yandex-verification', 'content' => $yandexVerify], 'yandex-verification'
			);
		}

		return $this;
	}

	/**
	 * Set Schem.org
	 *
	 * @param string $name
	 * @param string $email
	 * @param string $url
	 * @param string $logo
	 * @param string $type
	 *
	 * @return string
	 */
	public function setSchema($name = '', $email = '', $url = '', $logo = '', $type = 'localBusiness')
	{
		switch($type) {
			case 'Event':
				$schema = Schema::event();
				break;
			case 'Organization':
				$schema = Schema::organization();
				break;
			case 'Person':
				$schema = Schema::person();
				break;
			default:
				$schema = Schema::localBusiness();
		}

		$schema->name($name);

		if($email) {
			$schema->email($email);
		}

		if($url) {
			$schema->url($url);
		}

		if($logo) {
			$schema->logo($logo);
		}

		return $schema;
	}
}
