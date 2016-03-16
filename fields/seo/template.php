<?php
if( ! empty( $field->value() ) ) {
	$seo = yaml($field->value())[0];
	$seo_title = $seo['seo-title'];
	$seo_description = $seo['seo-description'];
}

if( ! empty( $seo_title ) ) {
} elseif( ! empty( $page->title() ) ) {
	$seo_title = $page->title();
} else {
	$seo_title = 'Untitled';
}

if( ! empty( $seo_description ) ) {
	$description_sliced = substr( $seo_description, 0, 155 );
	$description_sliced = ( $seo_description == $description_sliced ) ? $seo_description : $description_sliced . '...';
} else {
	$description_sliced = 'No description set';
}

$code = site()->defaultLanguage()->code();

$page_uri = str_replace( '/' . $code, '', $page->uri( $code ) );

$prefix = c::get('seo.prefix', '' );
?>

<div class="seo-preview-wrap">
	<div class="seo-preview">
		<div class="seo-preview-title"><?php echo $seo_title . $prefix; ?></div>
		<div class="seo-preview-url">
			<a data-modal="" href="<?php echo u(); ?>/panel/<?php echo $page_uri; ?>/url">
				<?php echo str_replace( array('http://', 'https://'), array('', ''), $page->url() ); ?>
			</a>
		</div>
		<div class="seo-preview-description"><?php echo $description_sliced; ?></div>
	</div>
</div>

<div class="seo-title-group">
	<label class="label" for="seo-title"><?php echo l::get('seo_title', 'SEO title'); ?></label>
	<input id="seo-title" type="text" class="input seo-title" placeholder="SEO title" value="<?php echo $seo_title; ?>" data-title="<?php echo $page->title(); ?>" data-prefix="<?php echo $prefix; ?>">
</div>

<div class="seo-description-group">
	<label class="label" for="seo-description"><?php echo l::get('seo_description', 'SEO description'); ?></label>
	<textarea id="seo-description" class="input seo-description" placeholder="SEO description" data-field="editor"><?php echo $seo_description; ?></textarea>
</div>

<textarea class="input seo-render" id="<?php echo $field->id(); ?>" name="<?php echo $field->name(); ?>"><?php echo $field->val(); ?></textarea>