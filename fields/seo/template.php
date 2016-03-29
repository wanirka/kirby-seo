<div class="seo">
	<div class="seo-view">
		<div class="seo-wrap-title">
			<div class="seo-view-title">
				<div class="seo-view-crop"></div>
			</div>
		</div>
		<div class="seo-wrap-url">
			<div class="seo-view-url">
				<a data-modal="" href="<?php echo seo::editSlugUrl($page); ?>">
					<?php echo seo::uri( $page->url() ); ?>
				</a>
			</div>
		</div>
		<div class="seo-wrap-description">
			<div class="seo-view-description"></div>
		</div>
	</div>

	<div class="seo-edit">
		<div class="seo-title">
			<div class="seo-label">
				<label class="label" for="seo-input-title">
					<?php echo l::get('seo_title', 'SEO title'); ?>
				</label>
				<div class="seo-count"></div>
			</div>
			<input id="seo-input-title" type="text" class="input seo-input-title" placeholder="<?php echo $page->title(); ?>" value="<?php echo seo::getField('seo-title', $page); ?>" data-title="<?php echo $page->title(); ?>">
		</div>
		<div class="seo-description">
			<div class="seo-label">
				<label class="label" for="seo-input-description">
					<?php echo l::get('seo_description', 'SEO description'); ?>
				</label>
				<div class="seo-count"></div>
			</div>
			<textarea id="seo-input-description" class="input seo-input-description" placeholder="SEO description" data-field="editor"><?php echo seo::getField( 'seo-description', $page ); ?></textarea>
		</div>

		<textarea class="input seo-render" id="<?php echo $field->id(); ?>" name="<?php echo $field->name(); ?>"><?php echo $field->val(); ?></textarea>
	</div>
</div>