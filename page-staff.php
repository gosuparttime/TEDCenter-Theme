<?php
// Template Name: Staff Page
//
get_header(); ?>

<div id="content" class="col-md-12">
<div class="white-bg row">
  <?php while (have_posts()) : the_post(); ?>
  <div class="page-header">
    <h1 class="page-title" itemprop="headline">
      <?php the_title(); ?>
    </h1>
  </div>
  <div id="main" class="clearfix col-md-11 alpha" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
      	<?php if(has_post_thumbnail()){
			echo '<div class="pad-one-b">';
			the_post_thumbnail('page-featured');
			echo '</div>';
		}
		if (function_exists('the_subheading')) { the_subheading('<h2 class="subheading">', '</h2>'); }
		?>
      </header>
      <!-- end article header -->
      
      <section class="post_content clearfix" itemprop="articleBody">
        <?php the_content(); ?>
      </section>
      <!-- end article section -->
      
      <footer>
        <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","ted-theme") . ':</span> ', ', ', '</p>'); ?>
      </footer>
      <!-- end article footer --> 
      
    </article>
    <!-- end article -->
    
    <?php endwhile; ?>
    <article id="staff-section">
      <?php 
			

    $query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
		'post_type' => 'staff',
		'order' => 'ASC',
    ) );
	
	$query = new WP_Query($args);
	
	
	
    while ( $query->have_posts() ) : $query->the_post();
		echo '<div class="well">';
		echo '<h4>';
		echo the_title();
		echo '</h4>';
		echo '<div class="">';
		echo '<div class="col-xs-5 pull-right">';
		if (get_field('photo')) {
			$staff_pix = get_field('photo');
			$staff_size = "staff-thumb";
			$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
			echo '<img src="';
			echo $staff_image[0];
			echo '" alt="';
			the_title();
			echo '" class="thumbnail"/>';
			
		} else {
			echo '<img src="';
			echo get_bloginfo( 'stylesheet_directory' );
			echo '/images/SU_seal.png" alt="Syracuse University" class="thumbnail"/>';
		}
		echo '</div>';
		//echo '<div class="col-sm-10 col-sm-pull-5">';
		if (get_field('title')) {
			echo '<h5>';
			echo the_field('title');
			echo '</h5>';
		}
		echo '<div class="pad-half-tb"><a href="tel:1-'.get_field('phone').'" class="visible-xs"><i class="icon-phone"></i> ';
		echo the_field('phone');
		echo '</a>';
		echo '<span class="hidden-xs"><i class="icon-phone"></i> ';
		echo the_field('phone');
		echo '</span></div>';
		if (get_field('bio')) {
			echo the_field('bio');
		}
		echo '<div class="clearfix" style="clear: right;">';
		if (get_field('email')) {
			$staff_link = get_field('email');
			echo '<a href="mailto:'.$staff_link.'?subject=Email from TEDCenter Website" class="btn btn-info btn-block">';
			echo 'Contact ';
			echo get_the_title();
			echo '<i class="fa fa-arrow-right"></i>';	
			echo '</a>';
		} else {
			$staff_link = "tedctr@syr.edu";
			echo '<a href="mailto:'.$staff_link.'?subject=Email from TEDCenter Website for ';
			echo get_the_title();
			echo '" class="btn btn-info btn-block">';
			echo 'Contact ';
			if (get_field('contact')){
				echo get_field('contact');
			} else {
				echo get_the_title();
			}
			echo '<i class="fa fa-arrow-right"></i>';	
			echo '</a>';
		}
		
		
		echo '</div></div></div>';
	endwhile;
	
	wp_reset_postdata();
    
	
	?>
    </article>
  </div>
  <!-- end #main -->
  
  <?php get_sidebar(); // sidebar 1 ?>
</div>

<!-- end #content -->

<?php get_footer(); ?>
