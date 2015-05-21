<?php
// Template Name: Programs Page
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
    <h3>Available Programs</h3>
      <?php 
			

    $query = new WP_Query( 
	$args = array(
		'posts_per_page' => '-1',
		'post_type' => 'program',
		'post_parent' => '0',
		'orderby' => 'title',
		'order' => 'ASC',
    ) );
	
	$query = new WP_Query($args);
	
	
	
    while ( $query->have_posts() ) : $query->the_post();
		echo '<div class="pad-one-b"><h4>';
		echo '<a href="';
		echo get_permalink();
		echo '">';
		echo the_title();
		echo '</a></h4>';
		echo '<p>';
		echo excerpt(500);
		echo '</p><a class="btn btn-info" href="';
		echo get_permalink();
		echo '"><i class="fa fa-arrow-right"></i>Learn More About ';
		echo the_title();
		echo '</a>';
		$children = wp_list_pages('title_li=&child_of='.$post->ID.'&post_type=program&echo=0');
  		if ($children) { 
			echo '<ul class="zero-mar-b">';
  			echo $children;
  			echo '</ul>';
 		}
		echo '</div>';
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
