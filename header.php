<!doctype html>

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>
<?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
			echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?>
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- icons & favicons -->
<!-- For iPhone 4 -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
<!-- For iPad 1-->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
<!-- For iPhone 3G, iPod Touch and Android -->
<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
<!-- For Nokia -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
<!-- For everything else -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

<!-- media-queries.js (fallback) -->
<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

<!-- html5.js -->
<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<!-- wordpress head functions -->
<?php wp_head(); ?>
<!-- end of wordpress head -->

</head>

<body>
<!--[if lt IE 8]><div class="alert"><button type="button" class="close" data-dismiss="alert">×</button>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</div><![endif]--> 
<a href="#content" tabindex="1" class="off-screen">skip navigation</a>
<div class="container-fluid brown-bar">
  <div class="container hidden-xs">
    <div class="row">
      <div class="col-sm-9 col-sm-offset-3">
        <?php bones_utility_links(); ?>
      </div>
      <div class="col-sm-3">
        <form class="navbar-search row" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
          <input name="s" id="s" size="0" type="text" class="form-control search-query" autocomplete="off" placeholder="<?php _e('Search','ted-theme'); ?>" data-provide="typeahead" data-items="4" data-source='<?php echo $typeahead_data; ?>'>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container" id="wrapper">
<div class="row clearfix">
  <header role="banner" id="inner-header">
    <div class="row siteinfo" role="heading">
      <div class="col-md-4 col-xs-7" id="branding"><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/TEDCenter_logo.png" alt="<?php bloginfo( 'name' ); ?>" />
        <h1 class="hidden">
          <?php bloginfo('name'); ?>
        </h1>
        </a> </div>
      <div id="quote" class="col-md-10 col-sm-offset-1 visible-md visible-lg pad-one-t">
        <?php $args = array( 'post_type' => 'quote', 'orderby' => 'rand', 'posts_per_page' => '1' );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post();
					echo '<p class="quote">'.get_the_title().'</p>';
					echo '<small><em>'.get_field('author').'</em></small>';
		  	endwhile; ?>
      </div>
      <div id="site-description" class="visible-sm visible-xs col-xs-8">
        <h5>Talent&nbsp;&&nbsp;Education Development&nbsp;Center</h5>
        <p class="small">at University&nbsp;College of Syracuse&nbsp;University</p>
      </div>
    </div>
  </header>
  <!-- end header --> 
</div>
<div class="row clearfix">
<div class="col-md-3">
<div class="row">
  <div id="site-information" class="pad-half mar-one-r visible-md visible-lg">
    <h5>Talent&nbsp;&&nbsp;Education Development&nbsp;Center</h5>
    <p class="small">at University&nbsp;College of Syracuse&nbsp;University</p>
  </div>
  <nav id="main-navigation" class="navbar navbar-default row">
  <button type="button" class="navbar-toggle btn-default" data-toggle="collapse" data-target=".navbar-collapse">
      <div class="link-description">Site Navigation</div>
      <div class="bars"><span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span></div>
    </button>
  <div class="collapse navbar-collapse"><?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?></div>
  </nav>
  <div id="social-media" class="mar-one-t clearfix visible-md visible-lg">
    <ul class="list-inline clearfix">
      <li><a class="fc-webicon facebook" href="https://www.facebook.com/pages/University-College-of-Syracuse-University/137830326322609" target="_blank"></a></li>
      <li><a class="fc-webicon twitter" href="https://twitter.com/tedctr" target="_blank"></a></li>
      <li><a class="fc-webicon linkedin" href="https://www.linkedin.com/groups/TEDCenter-University-College-Syracuse-University-4966620" target="_blank"></a></li>
    </ul>
  </div>
 </div>
</div>
