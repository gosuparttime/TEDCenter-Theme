<?php get_header(); ?>

<div id="content" class="col-md-12">
  <div class="white-bg row">
    <div class="page-header">
    <h1 class="page-title" itemprop="headline">
      <?php bloginfo('name');?> News
    </h1>
  </div>
  <div id="main" class="clearfix col-md-11 alpha" role="main">
   
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
         <header>
          <div class="page-header">
            <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
              <?php the_title(); ?>
              </a></h2>
          </div>
          <h6 class="meta">
            <?php _e("Posted", "ted-theme"); ?>
            <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate>
              <?php the_date(); ?>
            </time>
            <?php _e("by", "ted-theme"); ?>
            <?php the_author_posts_link(); ?>
            <span class="amp">&</span>
            <?php _e("filed under", "ted-theme"); ?>
            <?php the_category(', '); ?>
            .</h6>
        </header>
        <!-- end article header -->
        
        <section class="post_content clearfix">
          <?php echo excerpt('300'); ?>
        </section>
        <!-- end article section -->
        
        <footer>
          <p class="tags">
            <?php the_tags('<span class="tags-title">' . __("Tags","ted-theme") . ':</span> ', ' ', ''); ?>
            <hr />
          </p>
        </footer>
        <!-- end article footer --> 
        
      </article>
      <!-- end article -->
      
      <?php endwhile; ?>
      <?php if (function_exists('page_navi')) { // if expirimental feature is active ?>
      <?php page_navi(); // use the page navi function ?>
      <?php } else { // if it is disabled, display regular wp prev & next links ?>
      <nav class="wp-prev-next">
        <ul class="clearfix">
          <li class="prev-link">
            <?php next_posts_link(_e('&laquo; Older Entries', "ted-theme")) ?>
          </li>
          <li class="next-link">
            <?php previous_posts_link(_e('Newer Entries &raquo;', "ted-theme")) ?>
          </li>
        </ul>
      </nav>
      <?php } ?>
      <?php else : ?>
      <article id="post-not-found">
        <header>
          <h1>
            <?php _e("Not Found", "ted-theme"); ?>
          </h1>
        </header>
        <section class="post_content">
          <p>
            <?php _e("Sorry, but the requested resource was not found on this site.", "ted-theme"); ?>
          </p>
        </section>
        <footer> </footer>
      </article>
      <?php endif; ?>
    </div>
    <!-- end #main -->
    
    <?php get_sidebar('news'); // sidebar 1 ?>
  </div>
<!-- end #content -->

<?php get_footer(); ?>
