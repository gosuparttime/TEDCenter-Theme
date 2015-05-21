<?php
	$query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
		'post_type' => 'program',
		'post_parent' => '0',
		'order' => 'ASC',
    ) );
	$query = new WP_Query($args);
	echo '<ul class="list-unstyled">';
    while ( $query->have_posts() ) : $query->the_post();	
		echo '<li>';
		echo '<a href="';
		echo get_permalink();
		echo '">';
		echo the_title();
		echo '</a></li>';
	endwhile;
	echo '</ul>';
	wp_reset_postdata();
?>