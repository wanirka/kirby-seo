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

			// Autosize on init
			$('.seo-input-description').autosize();

			// Render on init
			$.fn.renderValue();

			// Preview on init
			$.fn.previewTitle();
			$.fn.previewDescription();

			// Count on init
			$.fn.countTitle();
			$.fn.countDescription();

			// Edit key press
			$('.seo-input-description, .seo-input-title').on('keyup keypress blur change', function(e) {
				$.fn.renderValue();

				$.fn.previewTitle();
				$.fn.previewDescription();

				$.fn.countTitle();
				$.fn.countDescription();
			});

			// Seo title edit click
			$( '.seo-wrap-title' ).click(function() {
				$.fn.toggle('title', 'input');
			});

			// Seo description edit click
			$( '.seo-wrap-description' ).click(function() {
				$.fn.toggle('description', 'textarea');
				$('.seo-input-description').trigger("autosize.resize");
			});

			// Escape key press
			$(document).keyup(function(e) {
				if (e.keyCode == 27 && ( $('#seo-input-title').is(":focus") || $('#seo-input-description').is(":focus") ) ) {
					$.fn.close();
				}
			});
		});
	};

	// Seo title
	$.fn.title = function() {
		var title = $.fn.sanitize( $('.seo-input-title').val() );
		return title;
	}

	// Seo description
	$.fn.description = function() {
		var description = $.fn.sanitize( $('.seo-input-description').val() );
		return description;
	}

	// Close edit
	$.fn.close = function() {
		$('.seo-title, .seo-description').removeClass('seo-active');
		$('.seo').removeClass('seo-open');
	};

	// Count title
	$.fn.countTitle = function() {
		var obj = $('.seo-view-crop');
		$('.seo-title .seo-count').html( obj[0].scrollWidth + '/512' );
		if( obj.outerWidth() < obj[0].scrollWidth || obj.text().length == 0 ) {
			$('.seo-title .seo-count').addClass('seo-warning');
		} else {
			$('.seo-title .seo-count').removeClass('seo-warning');
		}
	};

	// Count description
	$.fn.countDescription = function() {
		$('.seo-description .seo-count').html( $.fn.description().length + '/155' );
		if( $.fn.description().length > 155 || $.fn.description().length == 0 ) {
			$('.seo-description .seo-count').addClass('seo-warning');
		} else {
			$('.seo-description .seo-count').removeClass('seo-warning');
		}
	};

	// Render hidden value
	$.fn.renderValue = function() {
		$('.seo-render').val("  -\n  seo-title: " + $.fn.title() + "\n  seo-description: " + $.fn.description() );
	};

	// Preview title with fallback
	$.fn.previewTitle = function() {
		var title = '';
		if( $.fn.title() != '' ) {
			title = $.fn.title();
		} else {
			title = $('.seo-input-title').attr('data-title');
		}
		$('.seo-view-crop').html(title);
	};

	// Preview description
	$.fn.previewDescription = function() {
		description = $.fn.sliceDescription( $.fn.description() );
		$('.seo-view-description').html(description);
	};

	// Sanitize from return character
	$.fn.sanitize = function(input) {
		input = input.replace(/(\r\n|\n|\r)/gm,' ');
		input = input.replace( /\s\s+/g, ' ' );
		return input;
	};

	// Slice
	$.fn.sliceDescription = function(description) {
		description_slided = description.slice(0,155);
		description = ( description == description_slided ) ? description : description_slided + '...';
		return description;
	};

	// Toggle edit mode
	$.fn.toggle = function(name, type) {
		var item = $('.seo-' + name);
		var has_class = item.hasClass('seo-active');

		$('.seo-title, .seo-description').removeClass('seo-active');

		if( has_class ) {
			$('.seo').removeClass('seo-open');
			item.removeClass('seo-active');
		} else {
			item.addClass('seo-active');
			$('.seo').addClass('seo-open');
			$('.seo-active ' + type).focus();
		}
	};
})(jQuery);