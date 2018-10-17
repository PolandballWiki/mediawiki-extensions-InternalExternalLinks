<?php 
class InternalExternalLinksHooks {
	public static function onLinkerMakeExternalLink( &$url, &$text, &$link, &$attribs, $linktype ) {
		global $wgIELSites;
		
		// if no sites are added, do nothing
		if($wgIELSites == null) {
			return true;
		}

		foreach($wgIELSites as $site) {
			// See if the URL has one of our $site's at the start
			if(substr($url, 0, strlen($site)) == $site) {
				$attribs["class"] = str_replace("external", "", $attribs["class"]);
			}
		}
		
		return true;
	}
}
