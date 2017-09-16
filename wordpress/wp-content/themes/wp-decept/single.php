<?php get_header(); ?>

  <div id="container">
    <div class="content">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>
        <?php if (get_field('photo_vs_video')) { ?>

        <div id="photo" class="image-format">

          <?php
            $prev = mod_get_adjacent_post('prev', array('post'));
            $next = mod_get_adjacent_post('next', array('post'));
          ?>
          <div class="photo-links">
            <?php if($prev) : ?>
              <div class="photo-link-overlay photo-link-previous">
                <a href="<?php echo get_permalink( $prev->ID ); ?>" rel="prev"></a>
              </div>
            <?php endif; ?>
            <div class="photo-link-overlay photo-link-zoom">
              <a onclick="event.preventDefault();" href="javascript:void(0)"></a>
            </div>
            <?php if($next) : ?>
              <div class="photo-link-overlay photo-link-next">
                <a href="<?php echo get_permalink($next->ID)?>" rel="next"></a>
              </div>
            <?php endif; ?>
          </div>

          <?php if ( has_post_thumbnail()) { ?>
            <img class="responsive-full wp-post-image" src="<?php echo the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
          <?php } else { ?>
            <img class="responsive-full wp-post-image" src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
          <?php } ?>

        </div>
        <?php } else { ?>

          <div class="video-wrap">
            <div id="video">
              <?php the_field('video'); ?>
            </div>
          </div>

        <?php } ?>


        <div class="info ">
          <div class="average-color-line" style="background: url('<?php echo get_template_directory_uri(); ?>/img/20130223_164032-15-1x1.jpg')"></div>

            <a class="photo-info-zoom" href="javascript:void(0)">
              <?php if ( has_post_thumbnail()) { ?>
                <img class="photo-info wp-post-image" width="250" big-src="<?php echo the_post_thumbnail_url(); ?>" src="<?php echo the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
              <?php } else { ?>
                <img class="photo-info wp-post-image" big-src="<?php echo catchFirstImage(); ?>" src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
              <?php } ?>
            </a>

            <?php $images = get_field('gallery'); if( $images ) { ?>
              <?php foreach( $images as $image ): ?>
                <a class="photo-info-zoom" href="javascript:void(0)">
                  <img class="photo-info wp-post-image" big-src="<?php echo $image['sizes']['large']; ?>" src="<?php echo $image['sizes']['small']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
              <?php endforeach; ?>
            <?php } ?>

          <h1><?php the_title(); ?></h1>
          <div class="post-stats">
            <div class="post-stats-type">
              <strong>Posted:</strong> <?php the_author_posts_link(); ?> on <?php the_time('d F Y'); ?></div>
            <div class="post-stats-type">
              <strong>Categories:</strong>
              <?php the_category(', '); // Separated by commas ?>
            </div>
            <div class="post-stats-type">

              <?php the_tags( '<strong>Tags:</strong> ', ', ', '<br>'); ?>
            </div>
            <div class="exif" style="display:block">
              <div class="clear"></div>
              <div class="divide"></div><span class="camera-stat"><span class="camera-icon">Taken</span>ACF DATE TODO</span>
            </div>

            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="divide"></div>

          <div class="post-content">
            <?php the_content(); ?>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>

          <div class="divide"></div>

        </div>
        <div class="title-nav-bar">
          <div class="title-nav-bar-inner">
            <span class="info-wrap">
              <a href="<?php echo home_url(); ?>"><i class="fa fa-home fa-border" aria-hidden="true"></i></a>
              <a href="javascript:void(0)" class="info-toggle"><?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?></a>
            </span>
            <div class="prev-next alignright">
              <?php if($prev) : ?>
                <a href="<?php echo get_permalink( $prev->ID ); ?>" rel="prev"><i class="fa fa-chevron-left fa-border" aria-hidden="true"></i></a>
              <?php endif; ?>
              <?php if($next) : ?>
                <a href="<?php echo get_permalink($next->ID)?>" rel="next"><i class="fa fa-chevron-right fa-border" aria-hidden="true"></i></a>
              <?php endif; ?>
            </div>
            <div class="clear"></div>
          </div>
        </div>
      <?php endwhile; endif; ?>
    </div>
  </div>

  <?php get_footer(); ?>


