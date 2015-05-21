<?php get_header(); ?>
<div id="content" class="col-md-12">
<div class="white-bg row">
  <div class="page-header">
    <h1 class="page-title" itemprop="headline">
      404 Fail - Page Not Found
    </h1>
  </div>
  <div id="main" class="clearfix col-md-15 alpha" role="main">
    <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
      <header>
      	<h3>Whatever it was, isn't here!</h3>
      </header>
        <!-- end article header -->
        
        <section class="post_content">
        <p>Maybe try looking again or search using the form below.</p>
        <div class="row">
          <div class="form-control">
            <?php get_search_form(); ?>
          </div>
        </div>
        </section>
        <!-- end article section -->
        
        
        <!-- end article footer --> 
        
      </article>
      <!-- end article -->
      
      
      
    </div>
    <!-- end #main -->
  </div>

<!-- end #content -->

<?php get_footer(); ?>
