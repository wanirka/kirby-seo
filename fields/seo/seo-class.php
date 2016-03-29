<?php
class seo {
	// Remove http:// and https:// etc.
	public static function uri($url) {
		$url_parts = parse_url($url);
		$uri = substr( $url_parts['path'], 1 );
		return $uri;
	}

	// Edit slug url
	public static function editSlugUrl($page) {
		$url = u() . '/panel/pages/' . $page->id() . '/url';
		return $url;
	}

	// Get field if exists
	public static function getField($fieldname, $page) {
		if( $page->seo()->isNotEmpty() ) { // Replace with custom value
			$seo = $page->seo()->yaml(); // Replace with custom value
			if( ! empty( $seo ) && ! empty( $seo[0] ) && ! empty( $seo[0][$fieldname] ) ) {
				return $seo[0][$fieldname];
			}
		}
	}

	public static function previewTitle($field, $page) {
		$raw_title = self::getField('seo-title', $page);

		if( ! empty( $raw_title ) ) {
		} elseif( $page->title()->isNotEmpty() ) {
			$raw_title = $page->title();
		} else {
			$raw_title = 'Untitled';
		}
		return $raw_title;
	}

	public static function previewDescription($field, $page) {
		$raw_description = self::getField('seo-description', $page);
		if( ! empty( $raw_description ) ) {
			$description_sliced = substr( $raw_description, 0, 155 );
			$description_sliced = ( $raw_description == $description_sliced ) ? $raw_description : $description_sliced . '...';
		} else {
			$description_sliced = 'No description set';
		}
		return $description_sliced;
	}
}