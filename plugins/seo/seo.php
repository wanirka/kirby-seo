<?php
class seoTemplate {
	// Remove http:// and https:// etc.
	public static function uri($url) {
		$url_parts = parse_url($url);
		$uri = substr( $url_parts['path'], 1 );
		return $uri;
	}

	// Get field if exists
	public static function getField($fieldname) {
		$page = page();
		if( ! empty( (string)$page->seo() ) ) { // Ersätt seo med custom value
			$seo = $page->seo()->yaml(); // Ersätt seo med custom value
			if( ! empty( $seo ) && ! empty( $seo[0] ) && ! empty( $seo[0][$fieldname] ) ) {
				return $seo[0][$fieldname];
			}
		}
	}

	// Echo or return seo title
	public static function title( $data, $return ) {
		$page = page();
		$title_field = self::getField('seo-title');

		if( ! empty( $title_field ) ) {
			$title = $title_field;
		} else {
			$title = $page->title();
		}

		if( $return === true ) {
			return $title;
		} else {
			echo '<title>' . $title . '</title>' . "\n";
		}
	}

	// Echo or return seo description
	public static function description( $data, $return ) {
		$page = page();
		$description_field = self::getField('seo-description');

		$description = '';
		if( ! empty( $description_field ) ) {
			$description = $description_field;
		}

		if( $return === true ) {
			return $description;
		} else {
			if( ! empty( $description ) ) {
				echo '<meta name="description" content="' . $description . '">' . "\n";
			}
		}
	}
}

// Main seo function
function seo($label, $data = array(), $return = false) {
	switch($label) {
		case 'title' :
			return seoTemplate::title( $data, $return );
			break;
		case 'description' :
			return seoTemplate::description( $data, $return );
			break;
	}
}