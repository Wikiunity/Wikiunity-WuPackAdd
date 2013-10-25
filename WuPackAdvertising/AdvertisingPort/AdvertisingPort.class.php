<?php
if (!defined('MEDIAWIKI')) die();

/**
*	Wikiunity Extension (7Alpha)
*	by Michael McCouman jr.
* 	2011
*/
class AdvertisingPortlet {
	static function AdvertisingPortletInSidebar( $skin, &$bar ) {
		global $wgAdvertisingPortletWidth, 
			$wgAdvertisingPortletID,
			$wgAdvertisingPortletHeight, 
			$wgAdvertisingPortletClient,
			$wgAdvertisingPortletSlot, 
			$wgAdvertisingPortletSrc,
			$wgAdvertisingPortletAnonOnly, 
			$wgUser;


		// Return $bar unchanged if not all values have been set.
		// FIXME: signal incorrect configuration nicely?
		if( $wgAdvertisingPortletClient == 'none' || $wgAdvertisingPortletSlot == 'none' || $wgAdvertisingPortletID == 'none' )
			return $bar;

		if( $wgUser->isLoggedIn() && $wgAdvertisingPortletAnonOnly ) {
			return $bar;
		}
		if( !$wgAdvertisingPortletSrc ) {
			return $bar;
		}

		wfLoadExtensionMessages( 'AdvertisingPortlet' );
		$bar['advertisingportlet'] = "<script type=\"text/javascript\">
/* <![CDATA[ */
google_ad_client = \"$wgAdvertisingPortletClient\";
/* $wgAdvertisingPortletID */
google_ad_slot = \"$wgAdvertisingPortletSlot\";
google_ad_width = ".intval($wgAdvertisingPortletWidth).";
google_ad_height = ".intval($wgAdvertisingPortletHeight).";
/* ]]> */
</script>
<script type=\"text/javascript\"
src=\"$wgAdvertisingPortletSrc\">
</script>";

		return true;
	}
}
