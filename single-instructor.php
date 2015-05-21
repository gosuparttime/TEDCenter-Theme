<?php get_header(); ?>

<div id="content" class="col-md-12">
  <div class="white-bg row">
    <div class="page-header">
    <h1 class="page-title" itemprop="headline">
      <?php bloginfo('name');?> Instructors
    </h1>  </div>
  <div id="main" class="clearfix col-md-11 alpha" role="main">
      <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
         <? if (get_field('photo')) {
		echo '<div class="row"><div class="col-sm-9 col-md-8 col-xs-9">';
		} ?>
         <header>
           	<div class="page-title">
            <h2 class="single-title" itemprop="headline">
              <?php the_title(); ?>
            </h2>
          </div>
          <? if (get_field('instructor_title')) {
			echo '<h6>';
			echo the_field('instructor_title');
			echo '</h6>';
		}
         
         if (get_field('email')) {
			$staff_link = get_field('email');
			echo '<a href="mailto:'.$staff_link.'?subject=Email from TEDCenter Website" class="btn btn-default btn-block">';
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
			echo '" class="btn btn-default mar-one-b">';
			echo 'Contact ';
			if (get_field('contact')){
				echo get_field('contact');
			} else {
				echo get_the_title();
			}
			echo '<i class="fa fa-arrow-right"></i>';	
			echo '</a>';
		}
		?>
		<? if (get_field('photo')) {
			$staff_pix = get_field('photo');
			$staff_size = "staff-thumb";
			$staff_image = wp_get_attachment_image_src( $staff_pix, $staff_size );
			echo '</div><div class="col-sm-5 col-xs-6 col-sm-offset-1">';
			echo '<img src="';
			echo $staff_image[0];
			echo '" alt="';
			the_title();
			echo '" class="thumbnail"/>';
			echo '</div></div>';
		} ?>
        </header>
        <!-- end article header -->
        
        <section class="post_content clearfix" itemprop="articleBody">
          <?php the_content(); ?>
          <?php wp_link_pages(); ?>
        </section>
        <!-- end article section -->
        
        <footer>
          <?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","ted-theme") . ':</span> ', ' ', '</p>'); ?>
        </footer>
        <!-- end article footer --> 
        
      </article>
      <!-- end article -->
      
      
     
      
    </div>
    <!-- end #main -->
     <?php endwhile; ?>
    <?php get_sidebar(); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
