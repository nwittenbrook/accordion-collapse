<?php
    /*
	Plugin Name: Accordion Collapse
	Plugin URI: http://www.washington.edu
	Description: Shortcode to create collapsable and expandable content, controlled by headers
	Version: 0.1
	Author: Natalie Wittenbrook
	*/

	// shortcode for accordion collapse
	// format: [acol acol_header="title"]collapsed content[/acol]
	function acol_func( $atts, $content = null ) {
		extract( shortcode_atts(array(
			'acol_header' => 'Expand',
			'acol_header_type' => 'h3'
			), $atts)); 

		return '<div class="acol-container closed"><' . esc_attr($acol_header_type) . ' class= "acol-header" >' . esc_attr($acol_header) . 
		'</' . esc_attr($acol_header_type) . '>' . '<div class="acol-content">' . $content . '</div></div>';
	}
/*
	// add button to WYSIWYG 
    // add button to editor
	function acol_button() {
    	add_filter( 'mce_external_plugins', 'acol_add_buttons' );
    	add_filter( 'mce_buttons', 'acol_register_buttons' );
	}

	function acol_add_button( $plugin_array ) {
    	$plugin_array['acol'] = plugin_dir_url( __FILE__ ) . 'js/acol-button.js';
    	return $plugin_array;
	}

	function acol_register_buttons( $buttons ) {
	    // add a separation before acol button
	    array_push( $buttons, '|', 'acol_button' );
	    return $buttons;
	}*/

	// load other resources
	function enqueue_resources() {
		wp_enqueue_script('jquery');
		wp_register_script('acol-script', plugins_url('js/accordion-collapse.js', __FILE__), 'jquery');
		wp_enqueue_script('acol-script');
		wp_register_style('acol-style', plugins_url('css/accordion-collapse.css', __FILE__));
		wp_enqueue_style('acol-style');
	}

	add_shortcode( 'acol', 'acol_func' );
	add_action( 'init', 'enqueue_resources');
?>