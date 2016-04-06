<?php
class SeoarchiveField extends BaseField {
	static public $fieldname = 'seoarchive';
	static public $assets = array(
		'css' => array(
			'style.css',
		)
	);

	public function input() {
		if( SeoCore::hasPlugin() ) {
			// Load language file
			SeoCore::loadLanguage();

			$html = '';
			foreach( site()->children() as $page ) {
				$html .= tpl::load( __DIR__ . DS . 'template.php', $data = array(
					'page' => $page,
					'controller' => SeoCore::panel($page),
				));
			}

			return '<div class="seo-archive">' . $html . '</div>';
		} else {
			return l::get('plugin.required','Seo plugin is required!');
		}
	}
}