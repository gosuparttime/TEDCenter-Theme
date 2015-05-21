<?php
/*
Template Name: Homepage
*/
?>
<?php get_header(); ?>

<div id="content" class="col-md-12">
  <div class="white-bg row">
    <div id="main" class="clearfix col-md-11" role="main">
      <div id="myCarousel" class="carousel slide"> 
        <!-- Carousel items -->
        <?php global $post;
        $tmp_post = $post;
        $show_posts = 3;
        $args = array( 'numberposts' => $show_posts ); // set this to how many posts you want in the carousel
        $myposts = get_posts( $args );
        $post_num = 0;
        $paginate = 0;
    ?>
        <ol class="carousel-indicators">
          <?php   foreach( $myposts as $post ) :  setup_postdata($post);
          ?>
          <li data-target="#myCarousel" data-slide-to="<? echo $paginate ?>" class="<?php if($paginate == 0){ echo 'active'; } ?>"><? echo ($paginate)+1 ?></li>
          <? $paginate++;
      endforeach; ?>
        </ol>
        <div class="carousel-inner">
          <?php global $post;
        $tmp_post = $post;
        $show_posts = 3;
        $args = array( 'numberposts' => $show_posts ); // set this to how many posts you want in the carousel
        $myposts = get_posts( $args );
        $post_num = 0;
        foreach( $myposts as $post ) :  setup_postdata($post);
          $post_num++;
          $post_thumbnail_id = get_post_thumbnail_id();
          $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'home-carousel' );
      ?>
          <div class="<?php if($post_num == 1){ echo 'active'; } ?> item"> <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( 'home-carousel' ); ?>
            </a>
            <div class="carousel-caption">
              <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
                </a></h2>
              <p>
                <?php $excerpt_length = 250; // length of excerpt to show (in characters)
            $the_excerpt = get_the_excerpt(); 
            if($the_excerpt != ""){
            $the_excerpt = substr( $the_excerpt, 0, $excerpt_length );
              echo $the_excerpt . '... ';
        ?>
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">Read more <i class="icon-double-angle-right"></i></a>
                <?php } ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
          <?php $post = $tmp_post; ?>
        </div>
        
        </div>
      <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
        <header>
         
        </header>
        <section class="row-fluid post_content">
         
        </section>
        <!-- end article header -->
        
        <footer>
          <p class="clearfix">
            <?php the_tags('<span class="tags">' . __("Tags","bonestheme") . ': ', ', ', '</span>'); ?>
          </p>
        </footer>
        <!-- end article footer --> 
        
      </article>
      <!-- end article -->
      <aside class="clearfix">
      <div class="row">
      	<div class="col-sm-8 widget"><div class="well">
        	<?php display_module('programs-module', '3'); ?>
        	<?php get_template_part('widget', 'programs'); ?>
            <a class="btn btn-info btn-block" href="/programs/overview-of-programs/">View All Programs <i class="fa fa-arrow-right"></i></a>
        </div></div>
        <div class="col-sm-7 widget"><?php display_events('5', '3'); ?></div>
      </div>
      </aside>
      <aside class="clearfix hidden-sm">
      <?php get_template_part('widget', 'testimonials'); ?>
      </aside>
      
      <?php 
            // No comments on homepage
            //comments_template();
          ?>
      <?php endwhile; ?>
      
    </div>
    <!-- end #main -->
    
    <?php get_sidebar(); // sidebar 1 ?>
  </div>
<!-- end #content -->

<?php get_footer(); ?>
​