<?
//Display Modules
function display_module($type, $heading, $block, $hide) {
	echo '<div class="clearfix';
	
	echo '" role="complementary">';
    $query = new WP_Query(array( 'post_type' => 'module', 'name' => $type));
    while ( $query->have_posts() ) : $query->the_post();
	if (!$hide){
		echo '<h'.$heading.'>';
		the_title();
		echo '</h'.$heading.'>';
	}
	if (has_post_thumbnail()){
		echo '<div class="pad-one-t hidden-xs">'; 
		the_post_thumbnail('featured');
		echo '</div>'; 
	}
	the_content();//$info; 
    endwhile;
	wp_reset_postdata();
	echo '</div>'; 
}
//Display Search
function display_search($type, $heading, $block, $hide) {
	echo '<div class="clearfix" role="complementary">';
	echo get_field('program_search', 'options');
	?>
    <h3>Find Programs</h3>
    
    <form class="" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
          <input name="s" id="s" type="text" class="form-control" autocomplete="off" placeholder="<?php _e('Search','ocl-theme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
          <input type="hidden" name="post_type" value="program" />
          <button type="submit" class="btn btn-info btn-block">Search <i class="fa fa-search"></i></button>
        </form>
    <?
	echo '</div>'; 
}
// Is Post Type?
function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}
// Module Widget
class ModuleWidget extends WP_Widget
{
  function ModuleWidget()
  {
    $widget_ops = array('classname' => 'ModuleWidget', 'description' => 'Displays information from selected module section within "Homepage Options"' );
    $this->WP_Widget('ModuleWidget', 'Module Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'available' => '', 'checkbox' => '', ) );
	$available = $instance['available'];
	$checkbox = $instance['checkbox'];
	$query = new WP_Query(array( 'post_type' => 'module', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Module: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
  <p><input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
        <label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Remove Title'); ?></label>
  </p>

</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['checkbox'] = $new_instance['checkbox'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$checkbox = empty($instance['checkbox']) ? ' ' : apply_filters('widget_title', $instance['checkbox']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'module', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	
	if ($checkbox !="1"){
		echo $before_title;
		echo the_title();
		echo $after_title;
	}
	
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="clearfix">';
	
	echo the_content();
	
	echo '</div>';
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ModuleWidget");') );

// Page Widget
class PageWidget extends WP_Widget
{
  function PageWidget()
  {
    $widget_ops = array('classname' => 'PageWidget', 'description' => 'Displays information from selected page' );
    $this->WP_Widget('PageWidget', 'Page Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'available' => '', 'checkbox' => '', ) );
	$available = $instance['available'];
	$checkbox = $instance['checkbox'];
	$query = new WP_Query(array( 'post_type' => 'page', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Page: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
  <p><input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
        <label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Remove Title'); ?></label>
  </p>

</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['checkbox'] = $new_instance['checkbox'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$checkbox = empty($instance['checkbox']) ? ' ' : apply_filters('widget_title', $instance['checkbox']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'page', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	$attachment_id = get_field('page_thumbnail');
	$size = "page-highlight";
	$image = wp_get_attachment_image_src( $attachment_id, $size );
	$attachment = get_post( get_field('page_thumbnail') );
	$alt = get_post_meta($attachment->ID, '_wp_attachment_image_alt', true);
    if( $image ) {
		echo '<div class="pad-one-b hidden-xs">';
		echo '<img src="';
		echo $image[0];
		echo '" alt="';
		echo $alt;
		echo '" />';
		echo '</div>';
 	}
	if ($checkbox !="1"){
		echo $before_title;
		echo the_title();
		echo $after_title;
	}
	
    
    // WIDGET CODE GOES HERE
    
  	if (get_field('page_summary')){
		the_field('page_summary');
	} else {
		echo the_excerpt();
	}
	echo '<div class="clearfix pad-one-b"><a class="btn btn-default btn-block" href="';
	echo get_permalink();
	echo '">';
	if (get_field('page_action')){
		the_field('page_action');
	} else {
		echo the_title();
	}
	echo ' <i class="fa fa-arrow-right"></i></a></div>';
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("PageWidget");') );

// Featured Study Widget
class ProgramWidget extends WP_Widget
{
  function ProgramWidget()
  {
    $widget_ops = array('classname' => 'ProgramWidget', 'description' => 'Displays information from the Featured Program' );
    $this->WP_Widget('ProgramWidget', 'Featured Program Widget', $widget_ops);
  }

 
    function widget($args)
  {
    extract($args, EXTR_SKIP);
	$title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
	$study = get_field('featured_program', 'options');
	foreach($study as $post){
		$featured_study = $post->ID;
	}
	$query = new WP_Query(array( 'post_type' => 'program', 'page_id' => $featured_study));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	echo $before_title;
	echo the_title();
	echo $after_title;
    
    // WIDGET CODE GOES HERE
   

	echo get_field('study_summary');
	echo '<div class="clearfix pad-one-b"><a class="btn-default" href="';
	echo get_permalink();
	echo '">';
	if (get_field('page_action')){
		the_field('page_action');
	} else {
		echo 'More on "'.get_the_title().'"';
	}
	echo ' <i class="fa fa-arrow-right"></i></a></div>';
	echo '<div class="clearfix pad-one-b"><a class="btn-default" href="/studies/past-studies/">View Study Archive <i class="fa fa-arrow-right"></i></a></div>';
	
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ProgramWidget");') );


/**
 * Search widget class
 *
 * @since 2.8.0
 */
class WP_Program_Search extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'program_search', 'description' => __( "Program search form for your site") );
		$this->WP_Widget('WP_Program_Search', 'Program Search Widget', $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;
		
		// Use current theme search form if it exists
		?>
		<form class="" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
          <input name="s" id="s" type="text" class="form-control" autocomplete="off" placeholder="<?php _e('Search','ocl-theme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
          <input type="hidden" name="post_type" value="program" />
          <button type="submit" class="btn btn-info mar-half-t">Search <i class="fa fa-search"></i></button>
        </form>
		<?
		echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}
add_action( 'widgets_init', create_function('', 'return register_widget("WP_Program_Search");') );

// Support Widget
class SupportWidget extends WP_Widget
{
  function SupportWidget()
  {
    $widget_ops = array('classname' => 'SupportWidget', 'description' => 'Displays information from selected staff member for programs' );
    $this->WP_Widget('SupportWidget', 'Staff Support Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'available' => '', 'checkbox' => '', ) );
	$available = $instance['available'];
	$checkbox = $instance['checkbox'];
	$query = new WP_Query(array( 'post_type' => 'staff', 'orderby' => 'ASC', 'posts_per_page' => '-1'));?>
    <p>
  <label for="<?php echo $this->get_field_id('available'); ?>">Choose A Staff Member: </label>
  <select id="<?php echo $this->get_field_id('available'); ?>" name="<?php echo $this->get_field_name('available'); ?>" class="widefat" style="width:100%;">
    <? while ( $query->have_posts() ) : $query->the_post();
  $id = get_the_ID();?>
  <option <?php selected( $instance['available'], $id ); ?> value="<?php echo $id; ?>"><?php echo the_title(); ?></option>
  <? endwhile;
  	wp_reset_postdata(); ?>
  </select>
  <p><input id="<?php echo $this->get_field_id('checkbox'); ?>" name="<?php echo $this->get_field_name('checkbox'); ?>" type="checkbox" value="1" <?php checked( '1', $checkbox ); ?>/>
        <label for="<?php echo $this->get_field_id('checkbox'); ?>"><?php _e('Remove Title'); ?></label>
  </p>

</p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['checkbox'] = $new_instance['checkbox'];
	$instance['available'] = $new_instance['available'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	$checkbox = empty($instance['checkbox']) ? ' ' : apply_filters('widget_title', $instance['checkbox']);
	$available = empty($instance['available']) ? ' ' : apply_filters('widget_title', $instance['available']);
    $query = new WP_Query(array( 'post_type' => 'staff', 'page_id' => $available));
    while ( $query->have_posts() ) : $query->the_post();
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	
	if ($checkbox !="1"){
		echo $before_title;
		echo 'Program Support';
		echo $after_title;
	}
	
    
    // WIDGET CODE GOES HERE
   $mysupport = get_field('program_support');
		//var_dump($mysupport);
		$post = $mysupport;
	  	setup_postdata( $post ); 
		// Start Pulling Data for Staff Member
		if (get_field('photo')) {
			$staff_pix = get_field('photo');
			$staff_size = "page-highlight";
			$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
			echo '<div class="pad-one-b hidden-xs"><img src="';
			echo $staff_image[0];
			echo '" alt="';
			the_title();
			echo '"/></div>';
		} 
		echo '<p><strong class="brown">';
		echo get_the_title();
		echo '</strong><br/>';
		if (get_field('title')) {
			echo '<em>';
			echo the_field('title');
			echo '</em>';
		}
		echo '<br/><a href="tel:1-'.get_field('phone').'" class="visible-xs"><i class="icon-phone"></i> ';
		echo the_field('phone');
		echo '</a>';
		echo '<span class="hidden-xs"><i class="icon-phone"></i> ';
		echo the_field('phone');
		echo '</span></p>';
		if (get_field('email')) {
			$staff_link = get_field('email');
			echo '<a href="mailto:'.$staff_link.'?subject=Email from TEDCenter Website about '.$program_title.'" class="btn btn-default btn-block">';
			echo 'Contact ';
			if (get_field('contact')){
				echo get_field('contact');
			} else {
				echo get_the_title();
			}
			echo '<i class="fa fa-arrow-right"></i>';	
			echo '</a>';
		} else {
			$staff_link = "tedctr@syr.edu";
			echo '<a href="mailto:'.$staff_link.'?subject=Email from TEDCenter Website for ';
			echo get_the_title();
			echo ' about '.$program_title.'" class="btn btn-default btn-block">';
			echo 'Contact ';
			if (get_field('contact')){
				echo get_field('contact');
			} else {
				echo get_the_title();
			}
			echo '<i class="fa fa-arrow-right"></i>';	
			echo '</a>';
		}
	
    echo $after_widget;
	endwhile;
	wp_reset_postdata();
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("SupportWidget");') );
// Events Widget
class EventzWidget extends WP_Widget
{
  function EventzWidget()
  {
    $widget_ops = array('classname' => 'EventzWidget', 'description' => 'Displays information for desired amount of events in the sidebar' );
    $this->WP_Widget('EventzWidget', 'TEDCenter Event Widget', $widget_ops);
  }
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'count' => '', ) );
	$count = $instance['count'];
	?>
    <p>
  <label for="<?php echo $this->get_field_id('count'); ?>">Event Count: </label>
  <input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo esc_attr($count); ?>" />
   </p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
	$instance['count'] = $new_instance['count'];
    return $instance;
  }
 
    function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
	
	$count = empty($instance['count']) ? ' ' : apply_filters('widget_title', $instance['count']);
    
   
    //$title = the_title();
 	
    //if (!empty($title))
    echo $before_widget;
	
	
	
    
    // WIDGET CODE GOES HERE
   
	echo '<div class="clearfix">';
	
	display_events($count, '3'); 
	
	echo '</div>';
	
    echo $after_widget;

  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("EventzWidget");') );
?>