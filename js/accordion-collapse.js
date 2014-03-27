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
		$container.toggleClass('closed');
	});

	// add quicktag to plain text editor
	QTags.addButton( 'acol', 'acol', '[acol acol_header="INSERT TITLE HERE" acol_header_type="h3"]', '[/acol]' );
});