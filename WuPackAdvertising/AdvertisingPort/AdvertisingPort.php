<?php
/**
 * Exit if called outside of MediaWiki
 */
if( !defined( 'MEDIAWIKI' ) ) {
	echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
	die( 1 );
}

/**
*	Wikiunity Extension (7Alpha)
*	by Michael McCouman jr.
* 	2011
*/


/**
 * SETTINGS
 * --------
 * The description of the portlet can be changed in [[MediaWiki:AdvertisingPortlet]].
 */
$wgAdvertisingPortletWidth  = 160;    
$wgAdvertisingPortletHeight = 600;    
$wgAdvertisingPortletSrc    = "http://pagead2.googlesyndication.com/pagead/show_ads.js"; // Source URL of the AdSense script
$wgAdvertisingPortletAnonOnly = false; // Show the AdSense box only for anonymous users
//$wgAdvertisingPortletCssLocation = $wgScriptPath . '/extensions/AdvertisingPortlet'; // Path to AdvertisingPortlet.css if non-default

	/**
	 * The following variables must be set in your LocalSettings.php.
	 * The extension will not work without it.
	 */
	$wgAdvertisingPortletClient = 'ca-pub-123456'; 

	// Client ID for your AdSense script (example: pub-1234546403419693)
	$wgAdvertisingPortletSlot   = '123456'; 

	// Slot ID for your AdSense script (example: 1234580893)
	$wgAdvertisingPortletID     = '#123456'; 


// ID for your AdSense script (example: translatewiki)
$wgExtensionCredits['media'][] = array(
        'name' => 'AdvertisingIncludePortlet',
        'url' => 'http://wikiunity.com',
        'author' => '[http://de.community.wikiunity.com/wiki/User:McCouman <span style="color:#000;">Michael McCouman jr.</span>]',
        'description' => 'Integrates a flying banners in the left Sidebar of Wikiunity',
		'version' => '4.2'
);

	// Register class and localisations
	$dir = dirname(__FILE__) . '/';
	$wgAutoloadClasses['AdvertisingPortlet'] 		= $dir . 'AdvertisingPortlet.class.php';
	$wgExtensionMessagesFiles['AdvertisingPortlet'] = $dir . 'AdvertisingPortlet.i18n.php';

	// Hook to modify the sidebar
	$wgHooks['SkinBuildSidebar'][] = 'AdvertisingPortlet::AdvertisingPortletInSidebar';

	// Hook to inject CSS - currently disabled, because it does not add the CSS somehow
	//$wgHooks['OutputPageBeforeHTML'][] = 'AdvertisingPortlet::injectCSS';
	
	//... for more ...
