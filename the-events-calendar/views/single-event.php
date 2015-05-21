<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back"><a class="btn btn-info" href="<?php echo tribe_get_events_link() ?>"><i class="fa fa-arrow-left"></i> <?php _e( 'Back To All Events', 'tribe-events-calendar' ) ?></a></p>

	<!-- Notices -->
	<?php tribe_events_the_notices() ?>

	<?php the_title( '<h2 class="tribe-events-single-event-title summary">', '</h2>' ); ?>

	<div class="tribe-events-schedule updated published tribe-clearfix">
		<h3><?php 
		$tba = get_field('add_tba');
		if ($tba){
			echo get_field('tba_message');
		} else {
			echo tribe_events_event_schedule_details(); 
		}?></h3>
		<?php echo tribe_events_event_recurring_info_tooltip(); ?>
		<?php  if ( tribe_get_cost() ) :  ?>
			<h5 class="red">Cost: <?php echo tribe_get_cost( null, true ) ?></h5>
		<?php endif; ?>
	</div>

	<!-- Event header -->
	

	<?php while ( have_posts() ) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>
			<!-- Event featured image -->
			<?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					 echo '<div class="mar-one-tb">';
 					 the_post_thumbnail('home-carousel');
					 echo '</div>';
				  } ?>

			<!-- Event content -->
			
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div><!-- .tribe-events-single-event-description -->
			
            
            <?php if(tribe_get_event_website_url()){ ?>
            <div class="pad-one-tb">
            <h4>More Information:</h4>
            <a class="btn btn-info btn-lg" href="<?php echo tribe_get_event_website_url(); ?>" target="_blank">
			<? if (get_field('event_url_label')){
				echo get_field('event_url_label');
			} else {
				the_title();
			} ?><i class="fa <? echo get_field('icon_types') ?>"></i></a>
            </div>
            <? } ?>
           

			<!-- Event meta -->
           <div>
		   <?php 
		   //echo tribe_events_single_event_meta();
		   $post_id = get_the_ID();
		   $name = tribe_get_venue( $post_id ); 
		   echo '<div class="pad-one-b"><h4>Location Details:</h4><h5>'.$name.'</h5><ul class="list-unstyled venue-details">';
           echo '<li><address class="zero-mar-b"><strong>Address: </strong>' . tribe_get_full_address( get_the_ID() ) . '</address></li>';
		   echo '<li><strong>Phone: </strong><a class="tel" href="tel:';
		   echo tribe_get_phone( 'tribe_event_venue' );
		   echo '">';
		   echo tribe_get_phone( 'tribe_event_venue' );
		   echo '</a></li>';
		   echo '<li><a class="btn btn-default" href="';
		   echo tribe_get_map_link();
		   echo '">View in Google Maps<i class="fa fa-external-link"></i></a>';
		   echo '</li>';
		   echo '</ul></div>';
           echo tribe_get_meta( 'tribe_venue_map' ); ?>
           </div>
			
				
				
			
			</div><!-- .hentry .vevent -->
		<?php if( get_post_type() == TribeEvents::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>

	

</div><!-- #tribe-events-content -->
