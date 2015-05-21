<?php
	$query = new WP_Query( 
	$args = array(
		'posts_per_page' => '3',
		'post_type' => 'story',
		'orderby' => 'rand',
    ) );
	$query = new WP_Query($args);
	echo '<div class="row">';
    while ( $query->have_posts() ) : $query->the_post();	
		echo '<div class="col-sm-5 widget">';
		echo '<h4 class="block">'.get_the_title().'</h4>';
		if (has_post_thumbnail()) {
			echo get_the_post_thumbnail($post_id, 'staff-photo', array('class' => 'stock'));
			
		} else {
			echo '<img src="';
			echo get_bloginfo( 'stylesheet_directory' );
			echo '/images/SU_seal.png" alt="Syracuse University" class="thumbnail"/>';
		}
		echo the_excerpt();
		echo '<a class="btn btn-default btn-block" href="';
		echo get_permalink();
		echo '">';
		echo 'Read More <i class="fa fa-arrow-right pull-right"></i>';
		echo '</a></div>';
	endwhile;
	echo '</row>';
	wp_reset_postdata();
?>