<div class="col-md-4 omega">
<a class="btn-block btn-info visible-sm visible-xs" data-target="#sidebar1" data-toggle="collapse"><i class="fa fa-plus"></i>View Additional Information</a>
  <div id="sidebar1" class="fluid-sidebar sidebar collapse" role="complementary"><div class="row">
    <?php if ( is_active_sidebar( 'sidebar1' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar1' ); ?>
    <?php else : ?>
    
    <!-- This content shows up if there are no widgets defined in the backend. -->
    
    <div class="alert alert-message">
      <p>
        <?php _e("Please activate some Widgets","ted-theme"); ?>
        .</p>
    </div>
    <?php endif; ?>
  </div></div>
</div>
