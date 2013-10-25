<?php


if ( !defined( 'MEDIAWIKI' ) ) die( "This is an extension to the MediaWiki package and cannot be run standalone." );

$wgExtensionCredits['parserhook'][] = array (
	'path' => __FILE__,
	'name' => 'WUSpendenButton',
	'url' => 'http://wikiunity.org',
	'version' => '2.3',
	'author' => '[http://de.community.wikiunity.com/wiki/User:McCouman <span style="color:#000;">Michael McCouman jr.</span>], Dantman Daniel Friesen',
	'descriptionmsg' => 'sidebardonatebox-desc',
);
// Internationalization file
$dir = dirname( __FILE__ ) . '/';
$wgExtensionMessagesFiles['SidebarDonateBox'] = $dir . 'AdvertisingDonateButton.i18n.php';

$wgHooks['SkinBuildSidebar'][] = 'efSidebarDonateBox';

function efSidebarDonateBox( $skin, &$bar ) {
	global $egSidebarDonateBoxContent;
	$bar[''] = $egSidebarDonateBoxContent;
	return true;
}

# Config variable holding the HTML content of the sidebar
$egSidebarDonateBoxContent = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="QSCWEVXCFE93A">
<input type="image" src="https://www.paypalobjects.com/de_DE/DE/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="Jetzt einfach, schnell und sicher online bezahlen – mit PayPal.">
<img alt="" border="0" src="https://www.paypalobjects.com/de_DE/i/scr/pixel.gif" width="1" height="1">
</form>';
