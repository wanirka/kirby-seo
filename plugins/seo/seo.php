<?php
field::$methods['seoTitle'] = function($field, $output = '') {
	$page = $field->page;
	if( ! empty( $field->value ) ) {
		$seo = yaml( $field->value );
		if( ! empty( $seo ) ) {
			$title = ( ! empty( $seo[0]['seo-title'] ) ) ? $seo[0]['seo-title'] : $page->title();
		} else {
			$title = $page->title();
		}
	} else {
		$title = $page->title();
	}

	$title = $title . c::get('seo.prefix', '' );
	if( $output == 'html') {
		$title = '<title>' . $title . '</title>' . "\n";
	}
	return $title;
};

field::$methods['seoDescription'] = function($field, $output = '') {
	$page = $field->page;
	$description = '';
	if( ! empty( $field->value ) ) {
		$seo = yaml( $field->value );
		if( ! empty( $seo ) ) {
			$description = ( ! empty( $seo[0]['seo-description'] ) ) ? $seo[0]['seo-description'] : '';
		}
	}
	if( $output == 'html') {
		$description = '<meta name="description" content="' . $description . '">' . "\n";
	}
	return $description;
};

field::$methods['hasSeoDescription'] = function($field) {
	$page = $field->page;
	$description = '';
	if( ! empty( $field->value ) ) {
		$seo = yaml( $field->value );
		if( ! empty( $seo ) ) {
			if( ! empty( $seo[0]['seo-description'] ) ) {
				return true;
			}
		}
	}
	return false;
};