<?php get_header(); ?>

  <div id="container">
    <div class="content">
      <div class="cat-description">
        <h1>Tag</h1>
      </div>
      <div class="grid-outer">
        <div id="grid">

          <?php get_template_part('loop'); ?>

        </div>
        <div class="new-items"></div>
      </div>
      <div class="clear"></div>
        <div class="title-nav-bar">
        <div class="title-nav-bar-inner">
          <span class="info-wrap">
            <a href="<?php echo home_url(); ?>"><i class="fa fa-home fa-border" aria-hidden="true"></i></a>
            <a href="javascript:void(0)" class="info-toggle"><?php if (function_exists('easy_breadcrumbs')) easy_breadcrumbs(); ?></a>
          </span>
          <div class="clear"></div>
        </div>
      </div>
    </div>
  </div>

<?php get_footer(); ?>
