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
      
      <footer>
        <? if (get_field('landing_page')){
			echo '<h4>Learn More:</h4>';
			echo '<a class="btn btn-block btn-info btn-lg" href="';
			echo get_field('landing_page');
			echo '" target="_blank">';
			echo the_title();
			echo '<i class="fa fa-arrow-right"></i></a>';
		}?>
      </footer>
      <!-- end article section --> 
    </article>
    <!-- end article -->
    <?
	$p = 0;
	if (get_field('provide_details')){
		if (get_field('program_details')){
			while(has_sub_field('program_details')){
				$p++;
				echo '<article id="program-'.$p.'" class="clearfix mar-one-b" role="complementary">';
				echo '<header><h3>';
				echo get_sub_field('title');
				echo '</h3></header>';
				echo '<section class="post_content clearfix" itemprop="articleBody">';
				the_sub_field('description');
				echo '<hr/>';
				// Start Container
				echo '<div class="container program-info">';
				// Start Date Info
				if (get_sub_field('show_date_info')){
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					echo '<h6 class="program">Dates:</h6>';
					echo '</div>';
					echo '<div class="col-xs-11">';
					if (get_sub_field('date_info')){
						echo '<ul class="list-unstyled">'; 
						while(has_sub_field('date_info')):
							echo '<li>';
							echo '<strong>';
							$program_date = DateTime::createFromFormat('Ymd', get_sub_field('date_time'));
							echo $program_date->format('F j, Y');
							echo ': </strong>';
							echo get_sub_field('start_time');
							echo ' &#8211; ';
							echo get_sub_field('end_time');
							echo '</li>';
						endwhile;
					echo '</ul>';
					}
					echo '</div>';
					echo '</div>';
				}
				// Start Location Info
				if (get_sub_field('location')){
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					echo '<h6 class="program">Location:</h6>';
					echo '</div>';
					echo '<div class="col-xs-11"><p>';
					echo get_sub_field('location');
					echo '</p></div>';
					echo '</div>';
				}
				// Start Price Info
				if (get_sub_field('price')){
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					echo '<h6 class="program">Price:</h6>';
					echo '</div>';
					echo '<div class="col-xs-11">';
					echo get_sub_field('price');
					echo '</div>';
					echo '</div>';
				}
				// Start Instructor Info
				if (get_sub_field('instructor_info')){
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					echo '<h6 class="program">Instructor:</h6>';
					echo '</div>';
					echo '<div class="col-xs-11">';
					$profs = get_sub_field('instructor_info');
					foreach ($profs as $post){
						setup_postdata($post);
						echo '<p><strong>'.get_the_title().'</strong><br/>';
						echo get_field('instructor_title');
						echo '</p>';
						
					}wp_reset_postdata();
					echo '</div>';
					echo '</div>';
				}
				// Start Who Info
				if (get_sub_field('who')){
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					echo '<h6 class="program">Who:</h6>';
					echo '</div>';
					echo '<div class="col-xs-11">';
					echo get_sub_field('who');
					echo '</div>';
					echo '</div>';
				}
				// Start Details Info
				if (get_sub_field('details')){
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					echo '<h6 class="program">Details:</h6>';
					echo '</div>';
					echo '<div class="col-xs-11">';
					echo get_sub_field('details');
					echo '</div>';
					echo '</div>';
				}
				// Start Registration Info
				$registration = get_field('register_now');
				  if( $registration ){
					while ( have_rows('register_now') ) : the_row();
					$reg_url = get_sub_field('register_url');
					$reg_cta = get_sub_field('register_cta');
					$reg_info = get_sub_field('register_info');
					$reg_head = get_sub_field('register_head');
					echo '<div class="row">';
					echo '<div class="col-xs-4 alpha">';
					if( $reg_head ): ?>
						<h6 class="program"><? echo $reg_head ?></h6>
					<?php else: ?>
						<h6 class="program">Registration</h6>
					<?php endif;
					echo '</div>';
					echo '<div class="col-xs-11">';
					if( $reg_info ): ?>
						<? echo $reg_info ?>
					<?php endif;
					 if( $reg_url ): ?>
					 <a href="<? echo $reg_url ?>" class="btn btn-info btn-block"><i class="fa fa-arrow-right"></i>
					 <? if ($reg_cta): 
					 echo $reg_cta;
					 else:
					 echo 'Register Now';
					 endif; ?>
					 </a>
					<?php endif;
					echo '</div>';
					echo '</div>';
					endwhile;
				}
				
				// End Container
				echo '</div>';
				echo '</section>';
				echo '</article>';
			}
		}
	}
	?>
    <?php 
 	  $disclaimer = get_field('program_disclaimer');
	  if( $disclaimer ): ?>
      <section id="subpage-content" class="clearfix widget" itemprop="articleBody">
      	<? echo $disclaimer; ?>
      </section>
      <? endif; ?>
    <footer class="pad-one-tb"> <a class="btn btn-default" href="/programs/overview-of-programs/"><i class="fa fa-arrow-left"></i> Back to All Programs</a> </footer>
  </div>
  <!-- end #main -->
  <?php endwhile; 
  ?>
  <?php get_sidebar('program'); // sidebar 1 ?>
</div>

<!-- end #content -->

<?php get_footer(); ?>
