<?php 
add_filter( 'mce_buttons_2', 'fb_mce_editor_buttons' );
function fb_mce_editor_buttons( $buttons ) {

    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
function myplugin_tinymce_buttons($buttons)
 {
	//Remove the format dropdown select and text color selector
	$remove = array('underline','forecolor','justifyfull','alignleft','aligncenter','alignright','justify','hr','blockquote', 'strikethrough');
	return array_diff($buttons,$remove);
 }
add_filter('mce_buttons_2','myplugin_tinymce_buttons');
add_filter('mce_buttons','myplugin_tinymce_buttons');

// Format Styles
add_filter( 'tiny_mce_before_init', 'fb_mce_before_init' );
function fb_mce_before_init( $settings ) {

    $style_formats = array(
        array(
            'title' => 'Colors',
			'items' => array(
				array(
					'title' => 'Red',
					'inline' => 'span',
					'classes' => 'red',
				),
				array(
					'title' => 'Brown',
					'inline' => 'span',
					'classes' => 'blue',
				),
				array(
					'title' => 'Orange',
					'inline' => 'span',
					'classes' => 'orange',
				),
				array(
					'title' => 'White',
					'inline' => 'span',
					'classes' => 'white',
				),
				array(
					'title' => 'Gray',
					'inline' => 'span',
					'classes' => 'gray',
				),
				array(
					'title' => 'Gray - Light',
					'inline' => 'span',
					'classes' => 'gray-light',
				),
				array(
					'title' => 'Gray - Lighter',
					'inline' => 'span',
					'classes' => 'gray-lighter',
				),
				array(
					'title' => 'Gray - Dark',
					'inline' => 'span',
					'classes' => 'gray-dark',
				),
				array(
					'title' => 'Gray - Warm',
					'inline' => 'span',
					'classes' => 'gray-warm',
				),
			),
        ),
        array(
            'title' => 'Unordered Lists',
			'items' => array(
				array(
					'title' => 'Unstyled',
					'selector' => 'ul',
					'classes' => 'list-unstyled',
				),
				array(
					'title' => 'Inline',
					'selector' => 'ul',
					'classes' => 'list-inline',
				),
			),
		),
		array(
            'title' => 'Tables',
			'items' => array(
				array(
					'title' => 'Table Hover',
					'selector' => 'table',
					'classes' => 'table table-hover',
				),
				array(
					'title' => 'Table Condensed',
					'selector' => 'table',
					'classes' => 'table table-condensed',
				),
				array(
					'title' => 'Table Bordered',
					'selector' => 'table',
					'classes' => 'table table-bordered',
				),
			),
		),
		array(
            'title' => 'Table - Cell Background',
			'items' => array(
				array(
					'title' => 'Yellow',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-warning',
				),
				array(
					'title' => 'Green',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-success',
				),
				array(
					'title' => 'Blue',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-info',
				),
				array(
					'title' => 'Red',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-danger',
				),
				array(
					'title' => 'Gray - Light',
					'selector' => 'td',
					'block' => 'td',
					'classes' => 'bg-gray-light',
				),
			),
		),
    );

    $settings['style_formats'] = json_encode( $style_formats );

    return $settings;

}
//
