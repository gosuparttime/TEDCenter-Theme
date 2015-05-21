<?php
function display_events($limit, $heading, $cat, $hide) {
	if (!$hide){
		echo '<h'.$heading.'>';
		echo 'Upcoming Events';
		echo '</h'.$heading.'>';
	}
	
	global $post;
	if ($cat):
	$args = array(
		'post_type' => 'tribe_events',
		'eventDisplay'   => 'upcoming',
		'posts_per_page' => $limit,
		'tax_query' => array(
		array(
			'taxonomy' => 'tribe_events_cat',
			'field' => 'id',
			'terms' => $cat,
		)
	),);
	else:
	$args = array(
		'post_type' => 'tribe_events',
		'eventDisplay'   => 'upcoming',
		'posts_per_page' => $limit,
	);
	endif;
	
	$posts = tribe_get_events( $args );
	$myCount = count($posts);
	if ($myCount < 1){
		echo '<p><em>There are no events to display at this time</em></p>';
	} else {
		echo '<ul class="list-unstyled">';
	foreach( $posts as $post ) :
		setup_postdata( $post );
		echo '<li>';
		echo '<h5 class="mar-half-b">';
		echo '<a href="';
		echo tribe_get_event_link();
		echo '" rel="bookmark">';
		echo the_title();
		echo '</a>';
		echo '</h5>';
		echo '<p class="meta">';
		$tba = get_field('add_tba');
		if ($tba){
			echo get_field('tba_message');
		} else {
			echo tribe_events_event_schedule_details();
		}
		echo '</p>';
		echo '</li>';
	endforeach;
	echo "</ul><!-- .hfeed -->";
	}
	$event_url = tribe_get_events_link();
	echo '<div class="pad-one-b"><a class="btn btn-info btn-block" href="' . $event_url . '" rel="bookmark">';
				if ( empty( $category ) ) {
					_e( 'View All Events', 'tribe-events-calendar' );
				} else {
					_e( 'View All Events in Category', 'tribe-events-calendar' );
				}
				echo '<i class="fa fa-arrow-right"></i></a></div>';
	wp_reset_postdata();
}


?>
