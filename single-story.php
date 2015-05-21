<?php get_header(); ?>

<div id="content" class="col-md-12">
  <div class="white-bg row">
    <div class="page-header">
    <h1 class="page-title" itemprop="headline">
      <?php bloginfo('name');?> Testimonials
    </h1>  </div>
  <div id="main" class="clearfix col-md-11 alpha" role="main">
      <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
         <?php the_post_thumbnail( 'home-carousel' ); ?>
         <header>
         	<div class="page-header">
            <h2 class="single-title" itemprop="headline">
              <?php the_title(); ?>
            </h2>
          </div>
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
    <?php get_sidebar('news'); // sidebar 1 ?>
</div>
<!-- end #content -->

<?php get_footer(); ?>
