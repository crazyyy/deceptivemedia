<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <title><?php wp_title( '' ); ?><?php if ( wp_title( '', false ) ) { echo ' :'; } ?> <?php bloginfo( 'name' ); ?></title>

  <link href="http://www.google-analytics.com/" rel="dns-prefetch"><!-- dns prefetch -->

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/ico/dm-100x100.png" sizes="32x32">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/ico/dm.png" sizes="192x192">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/ico/dm.png">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/ico/dm.png">
  <meta name="theme-color" content="#000000">

  <!-- icons -->
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">
  <link href="<?php echo get_template_directory_uri(); ?>/favicon.ico" rel="shortcut icon">

  <!--[if lt IE 9]>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- css + javascript -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

  <header>
    <div class="header-inner">
      <div class="logo svg-logo">
        <a href="<?php echo home_url(); ?>" rel="home">
          <img alt="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.svg">
        </a>
      </div>

      <div class="title-description-wrap">
        <p class="site-title"><a href="<?php echo home_url(); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
        <p class="site-description"><?php bloginfo( 'description' ); ?></p>
      </div>

      <div class="open-icons alignright">
        <a href="javascript:void(0)" onclick="toggleFullScreen();" class="open-full-screen" style="display:block">
          <i class="fa fa-arrows-alt fa-border" aria-hidden="true"></i>
        </a>
        <a href="#" onclick="event.preventDefault();" class="open-filter" style="display:block">
          <i class="fa fa-filter fa-border"></i>
        </a>
        <a href="#" onclick="event.preventDefault();" class="open-search" style="display:block">
          <i class="fa fa-search fa-border"></i>
        </a>
        <a href="#" onclick="event.preventDefault();" class="open-connect">
          <i class="fa fa-share-alt fa-border"></i>
        </a>
        <a href="#" onclick="event.preventDefault();" class="open-menu" style="display:block">
          <i class="fa fa-bars fa-border"></i>
        </a>
      </div>
    </div>
    <div class="ajax-error" style="display: none;"><i style="margin-top: 2px" class="fa fa-window-close hand alignright close" aria-hidden="true"></i></div>
  </header>
  <div class="nav-container">
    <nav>
      <div class="navigation">
        <div class="menu-header">
          <?php wpeHeadNav(); ?>
        </div>
      </div>
    </nav>

    <div class="search-form">
      <form method="get" id="search" class="err" action="<?php echo home_url(); ?>">
        <input placeholder="Enter search text and hit enter" type="text" value="" name="s" id="s">
      </form>
    </div>

    <div class="filter">
      <div class="filter-menu" style="display: block">
        <div class="categories-menu-show show_categories" style="display:block">
          <h2 class="filter-heading">Categories</h2>
          <?php wpeFootNav(); ?>
        </div>
        <div class="clear"></div>
      </div>
    </div>

    <div class="connect">
      <div class="divide"></div>
      <div class="widget">
        <h3>Elsewhere</h3>
        <ul class="xoxo blogroll">
          <li><a href="#" target="_blank">Arcangel</a></li>
          <li><a href="#" title="Ambient electronica" target="_blank">C-Dek</a></li>
          <li><a href="#" title="Sock photography at Getty Images" target="_blank">Getty Images</a></li>
          <li><a href="#" target="_blank">Great Big Canvas</a></li>
          <li><a href="#" title="A member of Landscape Collective UK" target="_blank">LCUK</a></li>
          <li><a href="#" target="_blank">Photoblogs.org</a></li>
          <li><a href="#" title="Trigger Image" target="_blank">Trigger Image</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="divide"></div>
      <div class="widget">
        <a class="ambient-light-button-social" href="https://www.flickr.com/photos/deceptivemedia/"><i class="fa fa-flickr"></i></a>
        <a class="ambient-light-button-social" href="https://www.facebook.com/DeceptiveMedia/"><i class="fa fa-facebook"></i></a>
        <a class="ambient-light-button-social" href="https://500px.com/deceptivemedia"><i class="fa fa-500px"></i></a>
        <a class="ambient-light-button-social" href="https://twitter.com/Deceptive_Media"><i class="fa fa-twitter"></i></a>
        <a class="ambient-light-button-social" href="http://deceptivemedia.tumblr.com/"><i class="fa fa-tumblr"></i></a>
        <div class="clear"></div>
      </div>
      <footer>
        <div class="divide"></div>
        <div class="copyright">
          ©2004-<?php echo date("Y"); ?> <?php bloginfo('name'); ?> </div>
      </footer>
    </div>

  </div>
