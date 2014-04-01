/*
Author: Natalie Wittenbrook
Description: Javascript file for Accordion Collapse
*/


jQuery(document).ready(function ($) {
	// show or hide content when header is clicked
	$('.acol-header').on('click', function (e) {
		var $acol_header = $(this),
			$container = $acol_header.parent();
		// show/hide content
		$('.acol-container').each(function() {
			if($(this) !== $container && !($(this).hasClass('closed'))) {
				$(this).addClass('closed');
			}
		});
		$container.toggleClass('closed');
	});

	// add quicktag to plain text editor
	QTags.addButton( 'acol', 'acol', '[acol acol_header="INSERT TITLE HERE"]', '[/acol]' );
});