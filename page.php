<?php get_header(); ?>

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
      
      
      
    </div>
    <!-- end #main -->
    <?php endwhile; ?>
    <?php get_sidebar(); // sidebar 1 ?>
  </div>

<!-- end #content -->

<?php get_footer(); ?>
