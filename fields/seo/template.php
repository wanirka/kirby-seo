<div class="seo-preview-wrap" data-u="<?php echo seo::uri(u()); ?>">
	<div class="seo-preview">
		<div class="seo-preview-title-group">
			<div class="seo-preview-title"></div>
			<div class="seo-count"><span></span></div>
		</div>
		<div class="seo-preview-url-group">
			<div class="seo-preview-url">
				<a data-modal="" href="<?php echo seo::editSlugUrl($page); ?>">
					<?php echo seo::uri( $page->url() ); ?>
				</a>
			</div>
			<div class="seo-count"><span></span></div>
		</div>
		<div class="seo-preview-description-group">
			<div class="seo-preview-description"></div>
			<div class="seo-count"><span></span></div>
		</div>
	</div>
</div>

<div class="seo-title-group seo-group">
	<label class="label" for="seo-title">
		<?php echo l::get('seo_title', 'SEO title'); ?>

		<div class="seo-close">
			<i class="fa fa-times"></i>
		</div>
	</label>
	<input id="seo-title" type="text" class="input seo-title" placeholder="SEO title" value="<?php echo seo::getField('seo-title', $page); ?>" data-title="<?php echo $page->title(); ?>">
</div>

<div class="seo-description-group seo-group">
	<label class="label" for="seo-description">
		<?php echo l::get('seo_description', 'SEO description'); ?>

		<div class="seo-close">
			<i class="fa fa-times"></i>
		</div>
	</label>
	<textarea id="seo-description" class="input seo-description" placeholder="SEO description" data-field="editor"><?php echo seo::getField( 'seo-description', $page ); ?></textarea>
</div>

<textarea class="input seo-render" id="<?php echo $field->id(); ?>" name="<?php echo $field->name(); ?>"><?php echo $field->val(); ?></textarea>