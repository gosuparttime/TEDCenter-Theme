<?
	
echo '<div class="tribe-events-single-section tribe-events-event-meta tribe-clearfix yonana">';
// Event Details
echo tribe_get_meta_group( 'tribe_event_details' );
// When there is no map show the venue info up top
if ( ! $group_venue && ! tribe_embed_google_map( $event_id ) ) {
	// Venue Details
	echo tribe_get_meta_group( 'tribe_event_venue' );
	$group_venue = false;
} else if ( ! $group_venue && ! tribe_has_organizer( $event_id ) && tribe_address_exists( $event_id ) && tribe_embed_google_map( $event_id ) ) {
	echo sprintf( '%s<div class="tribe-events-meta-group tribe-events-meta-group-gmap">%s</div>',
	tribe_get_meta_group( 'tribe_event_venue' ),
	tribe_get_meta( 'tribe_venue_map' ));
	$group_venue = false;
	} else {
		$group_venue = true;
	}
	// Organizer Details
	if ( tribe_has_organizer( $event_id ) ) {
		echo tribe_get_meta_group( 'tribe_event_organizer' );
	}
echo apply_filters( 'tribe_events_single_event_the_meta_addon', '', $event_id );
echo '</div>';
$venue_details = tribe_get_meta_group( 'tribe_event_venue' );
tribe_get_meta( 'tribe_venue_map' );
echo apply_filters( 'tribe_events_single_event_the_meta_venue_row', sprintf( '<div class="tribe-events-single-section tribe-events-event-meta tribe-clearfix">%s</div>', $venue_details) );
?>