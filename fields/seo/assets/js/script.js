(function($) {
	$.fn.seo = function() {
		return this.each(function() {
			var field = $(this);
			var fieldname = 'seo';

			if(field.data( fieldname )) {
				return true;
			} else {
				field.data( fieldname, true );
			}

			$('.seo-description').autosize();

			$('.seo-title, .seo-description').on('keyup keypress blur change', function(e) {
				$.fn.renderValue();
				$.fn.renderPreview();
			});

			$( '.seo-preview-title' ).click(function() {
				$.fn.toggle('title', 'input');
			});

			$( '.seo-preview-description' ).click(function() {
				$.fn.toggle('description', 'textarea');
				$('.seo-description').trigger("autosize.resize");
			});
		});
	};
	$.fn.renderValue = function() {
		var title = $('.seo-title');
		var description = $('.seo-description').val();
		description = $.fn.sanitize(description);
		$('.seo-render').val("  -\n  seo-title: " + title.val() + "\n  seo-description: " + description);
	};
	$.fn.renderPreview = function() {
		var title = ( $('.seo-title').val() != '' ) ? $('.seo-title').val() : $('.seo-title').attr('data-title');
		var description = $.fn.sliceDescription( $.fn.sanitize( $('.seo-description').val() ) );
		description = ( description != '' ) ? description : 'No description yet';
		var prefix = $('.seo-title').attr('data-prefix');

		$('.seo-preview-title').html(title + prefix);
		$('.seo-preview-description').html(description);
	};
	$.fn.sanitize = function(input) {
		input = input.replace(/(\r\n|\n|\r)/gm,' ');
		return input;
	};
	$.fn.sliceDescription = function(description) {
		description_slided = description.slice(0,155);
		description = ( description == description_slided ) ? description : description_slided + '...';
		return description;
	};
	$.fn.toggle = function(name, type) {
		var group = $('.seo-' + name + '-group');
		var has_class = group.hasClass('seo-active');

		$('.seo-title-group, .seo-description-group').removeClass('seo-active');

		if( has_class ) {
			group.removeClass('seo-active');
		} else {
			group.addClass('seo-active');
			$('.seo-active ' + type).focus();
		}
	};
})(jQuery);