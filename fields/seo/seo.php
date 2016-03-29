<?php
require 'seo-class.php';

class SeoField extends BaseField {
	static public $fieldname = 'seo';
	static public $assets = array(
		'js' => array(
			'script.js',
		),
		'css' => array(
			'style.css',
		)
	);

	public function input() {
		// Load template with arguments
		$html = tpl::load( __DIR__ . DS . 'template.php', $data = array(
			'field' => $this,
			'page' => $this->page()
		));
		return $html;
	}

	// Connecting PHP to Javascript
	public function element() {
		$element = parent::element();
		$element->data('field', self::$fieldname);
		return $element;
	}
}