<?php 
class InternalExternalLinksHooks {
	public static function onLinkerMakeExternalLink( &$url, &$text, &$link, &$attribs, $linktype ) {
		# https://runescape.wiki/ is 23 chars 
		#https://oldschool.runescape.wiki/ is 33 chars
		
		if(substr($url, 0, 23) == "https://runescape.wiki/" or 
			substr($url, 0, 33) == "https://oldschool.runescape.wiki/") {
				$attribs["class"] = str_replace("external", "", $attribs["class"]);
		}
		
		return true;
	}
}
