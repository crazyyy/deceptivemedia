<?php if (have_posts()): while (have_posts()) : the_post(); ?>
  <div id="post-<?php the_ID(); ?>" <?php post_class('arch-wrap grid-item'); ?>>
    <div class="thumb-container" style="background-image:url('http://www.deceptivemedia.co.uk/wp-content/uploads/2015/05/20150510_154050-2-1x1.jpg')">
      <a class="the-thumbnail" href="<?php the_permalink(); ?>">
        <?php if ( has_post_thumbnail()) { ?>
          <img src="<?php echo the_post_thumbnail_url('medium'); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
        <?php } else { ?>
          <img src="<?php echo catchFirstImage(); ?>" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
        <?php } ?>
      </a>
    </div>
    <a class="thumb-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </div>
<?php endwhile; endif; ?>
