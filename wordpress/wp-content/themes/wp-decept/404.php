
<?php get_header(); ?>

  <div id="container">
    <div class="content">
        <div id="photo" class="image-format">
          <h1><?php _e( 'Page not found', 'wpeasy' ); ?></h1>
          <h2><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></h2>
        </div>
        <div class="info ">
          <div class="average-color-line" style="background: url('<?php echo get_template_directory_uri(); ?>/img/20130223_164032-15-1x1.jpg')"></div>
          <a class="photo-info-zoom" href="javascript:void(0)">
            <?php if ( has_post_thumbnail()) { ?>
              <img class="photo-infol wp-post-image" src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          </a>
          <h1><?php _e( 'Page not found', 'wpeasy' ); ?></h1>

          <div class="clear"></div>

          <div class="post-content">
            <h2><a href="<?php echo home_url(); ?>"><?php _e( 'Return home?', 'wpeasy' ); ?></a></h2>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>

          <div class="divide"></div>

        </div>
        <div class="title-nav-bar">
          <div class="title-nav-bar-inner">
            <span class="info-wrap">
              <a href="<?php echo home_url(); ?>"><i class="fa fa-home fa-border" aria-hidden="true"></i></a>
              <?php _e( 'Page not found', 'wpeasy' ); ?>
            </span>

            <div class="prev-next alignright">

            </div>
            <div class="clear"></div>
          </div>
        </div>
    </div>
  </div>

<?php get_footer(); ?>
