<?php 
class InternalExternalLinksHooks {
	public static function onLinkerMakeExternalLink( &$url, &$text, &$link, &$attribs, $linktype ) {
		global $wgIELSites;
		
		// if no sites are added, do nothing
		if( $wgIELSites == null ) {
			return true;
		}
		
		$urlparts = parse_url( url );
			
		if( $urlparts == false ) {
			// seriously malformed url we can't do anything with
			return true;
		}

		foreach( $wgIELSites as $site ) {

			if( $urlparts["host"] == $site ) {
				$attribs["class"] = str_replace( "external", "", $attribs["class"] );
				return true;
			}
		}
		
		return true;
	}
}
