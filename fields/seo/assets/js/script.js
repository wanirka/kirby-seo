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

			$.fn.renderValue();
			$.fn.previewTitle();
			$.fn.previewDescription();
			$.fn.count('title');
			$.fn.countUrl();
			$.fn.count('description');

			$('.seo-title, .seo-description').on('keyup keypress blur change', function(e) {
				$.fn.renderValue();
				$.fn.previewTitle();
				$.fn.previewDescription();
				$.fn.count('title');
				$.fn.count('description');
			});

			$( '.seo-preview-title' ).click(function() {
				$.fn.toggle('title', 'input');
			});

			$( '.seo-close' ).click(function() {
				$('.seo-title-group, .seo-description-group').removeClass('seo-active');
			});

			$( '.seo-preview-description' ).click(function() {
				$.fn.toggle('description', 'textarea');
				$('.seo-description').trigger("autosize.resize");
			});
		});
	};
	$.fn.count = function(type) {
		var count = $('.seo-' + type).val().length;
		var obj = $('.seo-preview-' + type + '-group .seo-count span');
		obj.html(count);
		$.fn.countClass(type);
	};
	$.fn.countUrl = function() {
		var count = $('.seo-preview-url a').html().length;
		var obj = $('.seo-preview-url-group .seo-count span');
		obj.html(count);
	};
	$.fn.countClass = function(type) {
		var obj_class = 'seo-warning';
		var obj = $('.seo-preview-' + type);
		if(type === 'title') {
			if( obj.outerWidth() < obj[0].scrollWidth ) {
				$('.seo-preview-' + type + '-group .seo-count').addClass(obj_class);
			} else {
				$('.seo-preview-' + type + '-group .seo-count').removeClass(obj_class);
			}
		} else if(type === 'description') {
			if( $('.seo-description').val().length > 155 ) {
				$('.seo-preview-' + type + '-group .seo-count').addClass(obj_class);
			} else {
				$('.seo-preview-' + type + '-group .seo-count').removeClass(obj_class);
			}
		}
	}
	$.fn.renderValue = function() {
		var title = $('.seo-title');
		var description = $('.seo-description').val();
		description = $.fn.sanitize(description);
		$('.seo-render').val("  -\n  seo-title: " + title.val() + "\n  seo-description: " + description);
	};
	$.fn.previewTitle = function() {
		var title = '';
		if( $('.seo-title').val() != '' ) {
			title = $('.seo-title').val();
		} else {
			title = $('.seo-title').attr('data-title');
		}
		$('.seo-preview-title').html(title);
	}
	$.fn.previewDescription = function() {
		var description = '';
		if( $('.seo-description').val() != '' ) {
			description = $.fn.sliceDescription( $.fn.sanitize( $('.seo-description').val() ) );
		} else {
			description = 'No description yet';
		}
		$('.seo-preview-description').html(description);
	}
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

		$('.seo-group').removeClass('seo-active');

		if( has_class ) {
			group.removeClass('seo-active');
		} else {
			group.addClass('seo-active');
			$('.seo-active ' + type).focus();
		}
	};
})(jQuery);