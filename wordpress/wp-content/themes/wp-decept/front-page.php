<?php /* Template Name: Home Page */ get_header(); ?>

  <div id="container">
    <div class="content">
      <?php if (have_posts()): while (have_posts()) : the_post(); ?>

        <div id="photo">
          <?php  $images = get_field('gallery'); if( $images ) { ?>
            <div id="slider">
              <?php foreach( $images as $image ): ?>
                <a href="#">
                  <img class="responsive-full wp-post-image" src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                </a>
              <?php endforeach; ?>
            </div>
          <?php } else { ?>
            <?php if ( has_post_thumbnail()) { ?>
              <img class="responsive-full wp-post-image" src="<?php echo the_post_thumbnail_url(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } else { ?>
              <img class="responsive-full wp-post-image" src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
            <?php } ?>
          <?php } ?>
        </div>

        <div class="info">
          <div class="average-color-line" style="background: url('<?php echo get_template_directory_uri(); ?>/img/no-image-average-color.jpg')"></div>
          <h1><?php the_title(); ?></h1>
          <div class="post-stats">
            <div class="post-stats-type">
              <strong>Posted:</strong> <?php the_author_posts_link(); ?> on <?php the_time('d F Y'); ?></div>
            <div class="social-share">
              <div class="clear"></div>
              <div class="divide"></div>
              <div class="share fb" id="fb-wrap">
                <a class="button button-social" href="http://www.facebook.com/share.php?u=<?php echo home_url(); ?>" title="share post on facebook" target="_blank"><i class="fa fa-facebook-square"></i></a>
              </div>
              <div class="share gp" id="gp-wrap">
                <a class="button button-social" href="https://plus.google.com/share?url=<?php echo home_url(); ?>" title="share post on google+"><i class="fa fa-google-plus-square"></i></a>
              </div>
              <div class="share tw" id="tw-wrap">
                <a class="button button-social" href="http://twitter.com/share?url=<?php echo home_url(); ?>&text=Deceptive%20Media%20@Deceptive_Media&hashtags=" title="tweet post on twitter" target="_blank"><i class="fa fa-twitter-square"></i></a>
              </div>
              <div class="share pt" id="pt-wrap">
                <a title="share post on pinterest" class="button button-social" data-pin-config="above" href="http://pinterest.com/pin/create/button/?url=<?php echo home_url(); ?>&media=&description=Welcome" data-pin-do="buttonPin"><i class="fa fa-pinterest-square"></i></a>
              </div>
              <div class="share tm" id="tumblr-wrap">
                <a class="button button-social" href="http://www.tumblr.com/share/photo?source=&caption=Welcome&clickthru=<?php echo home_url(); ?>" title="Share on Tumblr"><i class="fa fa-tumblr-square"></i></a>
              </div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
          <div class="divide"></div>
          <div class="post-content">
            <?php the_content(); ?>
            <div class="clear"></div>
          </div>

          <div class="grid-outer">
            <div id="grid-info">
              <?php $terms = get_field('categories'); if( $terms ): ?>
                <?php foreach( $terms as $term ): ?>
                  <div class="arch-wrap grid-item">
                    <div class="thumb-container" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/20070317_155016-160-V2-1x1.jpg')">
                      <a class="the-thumbnail" href="<?php echo get_term_link( $term ); ?>">
                        <?php  $image = get_field('image', $term); ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                      </a>
                    </div>
                    <a class="thumb-title" href="<?php echo get_term_link( $term ); ?>"><?php echo $term->name; ?></a>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>

          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
      <div class="title-nav-bar">
        <div class="title-nav-bar-inner">
          <span class="info-wrap">
            <a href="<?php echo home_url(); ?>"><i class="fa fa-home fa-border" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" class="info-toggle"><?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?></a>
          </span>
          <div class="clear"></div>
        </div>
      </div>
    <?php endwhile; endif; ?>
  </div>

<?php get_footer(); ?>
