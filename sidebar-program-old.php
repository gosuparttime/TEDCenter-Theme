<? $program_title = get_the_title(); ?>

<div class="col-md-4 omega"> <a class="btn-block btn-info visible-sm visible-xs" data-target="#sidebar-program" data-toggle="collapse"><i class="fa fa-plus"></i>Additional Program Information</a>
  <aside id="sidebar-program" class="fluid-sidebar sidebar collapse" role="complementary">
    <div class="row">
      <?php 
	if (get_field('about_instructor')){ ?>
    <!-- Instructor -->
      <div id="widget-instructor" class="col-md-15 col-sm-5 widget widget_instructor">
        <h4 class="widgettitle">About The Instructor</h4>
        <?php 
	  $myteach = get_field('about_instructor');
	  $post = $myteach;
	  setup_postdata( $post ); 
	  // Start Pulling Data for Staff Member
		if (get_field('photo')) {
			$staff_pix = get_field('photo');
			$staff_size = "column-thumb";
			$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
			echo '<img src="';
			echo $staff_image[0];
			echo '" alt="';
			the_title();
			echo '" class="pad-one-b"/>';
		} 
		//echo the_content();
		echo '<p><strong class="brown">';
		echo get_the_title();
		echo '</strong><br/>';
		if (get_field('instructor_title')) {
			echo '<em>';
			echo the_field('instructor_title');
			echo '</em>';
		}
		echo '</p>';
		$staff_link = "tedctr@syr.edu";
		echo '<a href="'.get_permalink().'"';
		echo ' class="btn btn-default btn-block">';
		echo 'Learn More About: <br /><small> ';
		echo get_the_title();
		echo '</small>';
		echo '<i class="fa fa-arrow-right"></i>';	
		echo '</a>';
		
	  	wp_reset_postdata();
	  ?></div>
	  <? } ?>
      
	  <!-- Registration -->
	  <?php 
 	  $registration = get_field('register_now');
	  if( $registration ): ?>
      <div id="register-nav" class="col-md-15 col-sm-5 widget widget_support">
        <?php 
	    while ( have_rows('register_now') ) : the_row();
		$reg_url = get_sub_field('register_url');
		$reg_info = get_sub_field('register_info');
 	  	$reg_head = get_sub_field('register_head');
	  	if( $reg_head ): ?>
        	<h4 class="widgettitle"><? echo $reg_head ?></h4>
        <?php else: ?>
        	<h4 class="widgettitle">Register Now</h4>
        <?php endif; 
        if( $reg_info ): ?>
        	<? echo $reg_info ?>
        <?php endif;
         if( $reg_url ): ?>
         <a href="<? echo $reg_info ?>" class="btn btn-info btn-block"><i class="fa fa-arrow-right"></i>Register Now</a>
        <?php endif; ?>
      </div>
      <?php 
	  endwhile; 
	  endif; ?>
      <!-- Subnav -->
      <?php 
 	  $sublinks = get_field('add_subpage');
	  if( $sublinks ): ?>
      <div id="subpage-nav" class="col-md-15 col-sm-5 widget widget_support">
        <?php 
	    while ( have_rows('add_subpage') ) : the_row();
		$sublink = get_sub_field('subpage_links');
 	  	$subpage_head = get_sub_field('subpage_heading');
	  	if( $subpage_head ): ?>
        	<h4 class="widgettitle"><? echo $subpage_head ?></h4>
        <?php else: ?>
        	<h4 class="widgettitle">Program Pages</h4>
        <?php endif; ?>
        <ul class="list-inline sub-nav">
          <?php foreach( $sublink as $post): // variable must be called $post (IMPORTANT) ?>
          <?php setup_postdata($post); ?>
          <li class="col-xs-15"> <a class="btn btn-info btn-block" href="<?php the_permalink(); ?>"><i class="fa fa-arrow-right"></i>
            <?php the_title(); 
			if (function_exists('the_subheading')) { the_subheading('<br/><small>', '</small>'); }?>
            </a> </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
      <?php 
	  endwhile; 
	  endif; ?>
      <!-- Support --> 
      
      <div id="widget-support" class="col-md-15 col-sm-5 widget widget_support">
        <h4 class="widgettitle">Program Support</h4>
        <?php 
	  	$mysupport = get_field('program_support');
		//var_dump($mysupport);
		$post = $mysupport;
	  	setup_postdata( $post ); 
		// Start Pulling Data for Staff Member
		if (get_field('photo')) {
			$staff_pix = get_field('photo');
			$staff_size = "column-thumb";
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
	  	wp_reset_postdata();
	  ?>
      </div>
    </div>
  </aside>
</div>
