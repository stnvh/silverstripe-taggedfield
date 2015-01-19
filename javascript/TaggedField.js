(function($) {
	"use strict";

	$('input.jquery-tagit-hook').entwine({
		onmatch: function() {
			var tags;
			if(window.TaggedFieldList) {
				tags = window.TaggedFieldList;
			}
			$('input.jquery-tagit-hook').tagit({
				availableTags: tags,
				beforeTagAdded: function(event, ui) {
					ui.tag.addClass('search-choice');
				}
			});
			$('.tagit.ui-widget').addClass('chzn-choices');
		}
	});

})(jQuery);
