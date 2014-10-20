(function($) {
	"use strict";

	$('input.jquery-tagit-hook').entwine({
		onmatch: function() {
			$('input.jquery-tagit-hook').tagit({
				beforeTagAdded: function(event, ui) {
					ui.tag.addClass('search-choice');
				}
			});
			$('.tagit.ui-widget').addClass('chzn-choices');
		}
	});

})(jQuery);
