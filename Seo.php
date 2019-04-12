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
 * @property string $facebookPageId
 * @property string $facebookAppId
 * @property string $socialApp
 * @property string $verifyCode
 * @property string $verifyCodes
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
	public function setRobots($robots= '')
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
	public function setOpenGraphType($type = '')
	{
		if ($type) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:type', 'content' => $type], 'og:type'
			);
		}

		return $this;
	}

	/**
	 * Register OpenGraph site_name
	 *
	 * @return $this
	 */
	public function setOpenGraphSiteName()
	{
		if(Yii::$app->settings->get('siteName', 'Configurations')) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:site_name', 'content' => Yii::$app->settings->get('siteName', 'Configurations')], 'og:site_name'
			);
		}

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
		if($url) {
			Yii::$app->view->registerMetaTag(
				['property' => 'og:url', 'content' => $url], 'og:url'
			);
		}

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
	 * Set Social App Meta Tags
	 *
	 * @param array $metaApp
	 *
	 * @return $this
	 */
	public function setSocialApp(array $metaApp = [])
	{
		// Facebook App ID
		if ($metaApp['fb:app_id']) {
			$this->setFacebookAppId($metaApp['fb:app_id']);
		}

		// Apple iTunes App ID
		if ($metaApp['apple-itunes-app']) {
			Yii::$app->view->registerMetaTag([
				'name' => 'apple-itunes-app', 'content' => $metaApp['apple-itunes-app']], $metaApp['apple-itunes-app']
			);
		} else if (Yii::$app->settings->get('appleItunesApp', 'Configurations')){
			Yii::$app->view->registerMetaTag([
				'name' => 'apple-itunes-app', 'content' => Yii::$app->settings->get('appleItunesApp', 'Configurations')], Yii::$app->settings->get('appleItunesApp', 'Configurations')
			);
		}

		// Android Play Store App Package
		if ($metaApp['google-play-app']) {
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
	 * Set Verification Meta Tag
	 *
	 * @param string $name
	 * @param string $content
	 *
	 * @return $this
	 */
	public function setVerifyCode($name,$content)
	{
		Yii::$app->view->registerMetaTag(
			['name' => $name, 'content' => $content], $name
		);

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
	 * Set Meta Informations
	 *
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

	/**
	 * Set Open Graph
	 *
	 * @param array $settings
	 */
	public function setOpenGraph($settings)
	{
		$this->setOpenGraphTitle($settings['title'])
			 ->setOpenGraphSitename();
	}
}
