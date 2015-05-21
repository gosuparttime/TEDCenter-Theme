<?php

// shortcodes

// Gallery shortcode

// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');

function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;

	$output = "";

	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<div class="row"><ul class="thumbnails">';
		foreach ( $attachments as $attachment ) {
			$output .= '<li class="span2">';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
			$output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
			$output .= '</li>';
		}
		$output .= '</ul></div>';
	}

	return $output;
}



// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'color' => 'default', /* primary, default, info, success, danger, warning, inverse */
	'url'  => '',
	'text' => '',
	'subtext' => '',
	'blank' => false,
	'block' => false,
	'icon'=>'',
	), $atts ) );
	
	if($color == "default"){
		$color = "btn btn-default";
	}
	else{ 
		$color = "btn btn-" . $color;
	}
	if($blank == false){
		$blank = "_self";
	}
	else{ 
		$blank = "_blank";
	}
	if($block == false){
		$block = "";
	}
	else{ 
		$block = "btn-block";
	}
	if(! $icon){
		$icon = "fa-arrow-right";
	} else {
		$icon = "fa-".$icon;
	}
	$output = '<a href="' . $url . '" class="'. $color .''. $block .'" target="'.$blank.'" title="'.$text.'" role="button">';
	
	
	if($subtext){
		$output .= '<div class="emphasize">';
		$output .= '<i class="fa ' . $icon . '"></i>';
		$output .= $text;
		$output .= '</div>';
		$output .= '<small>';
		$output .= $subtext;
		$output .= '</small>';
	} else{
		$output .= '<i class="fa ' . $icon . '"></i>';
		$output .= $text;
	}
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons'); 

// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= $text . '</div>';
	
	return $output;
}

add_shortcode('alert', 'alerts');

// Block Messages
function block_messages( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'alert-info', /* alert-info, alert-success, alert-error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert alert-block alert-'. $type . '">';
	if($close == 'true') {
		$output .= '<a class="close" data-dismiss="alert">×</a>';
	}
	$output .= '<p>' . $text . '</p></div>';
	
	return $output;
}

add_shortcode('block-message', 'block_messages'); 

// Block Messages
function blockquotes( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'float' => '', /* left, right */
	'cite' => '', /* text for cite */
	), $atts ) );
	
	$output = '<blockquote';
	if($float == 'left') {
		$output .= ' class="pull-left"';
	}
	elseif($float == 'right'){
		$output .= ' class="pull-right"';
	}
	$output .= '><p>' . $content . '</p>';
	
	if($cite){
		$output .= '<small>' . $cite . '</small>';
	}
	
	$output .= '</blockquote>';
	
	return $output;
}

add_shortcode('blockquote', 'blockquotes'); 
 

// Stories
function testimonials( $atts, $content = null ) {
	extract( shortcode_atts( array(	
		'name' => '',
	), $atts ) );
		
	if($name){
		$args = array( 'post_type' => 'story',
		'posts_per_page' => '1',
		'name' => $name );
	}else{ 
		$args = array( 'post_type' => 'story',
		'posts_per_page' => '1',
		'orderby' => 'rand');
	}
	$loop = new WP_Query( $args );
	$loop->the_post();
		if (has_post_thumbnail()) :
			echo the_post_thumbnail('small-feature');
		endif;
		echo '<h4>';
		echo the_title();
		echo '</h4>';
		echo'<span class="quote q-left">&#8220;</span>';
		echo the_excerpt();
		echo'<span class="quote q-right">&#8221;</span>';
	
	wp_reset_postdata();
}

add_shortcode('show-story', 'testimonials'); 

// icons
function icons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'class' => 'arrow-right', /* arrow-right, download-alt, external-link */
	), $atts ) );
	
	$output = '<i class="icon-';
	$output .= $class;
	$output .= '"></i>';
	
	return $output;
}

add_shortcode('icon', 'icons');


?>