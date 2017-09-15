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
        <p class="site-title"><a href="<?php echo home_url(); ?>" rel="home">Deceptive Media</a></p>
        <p class="site-description">Mainly abstract photoblog</p>
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
          <ul id="menu-side-menu" class="">
            <li id="menu-item-15461" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-15461"><a href="http://www.deceptivemedia.co.uk/">Home</a></li>
            <li id="menu-item-17176" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-17176"><a href="http://www.deceptivemedia.co.uk/photoblog">Photoblog</a>
              <ul class="sub-menu">
                <li id="menu-item-15463" class="menu-item menu-item-type-taxonomy menu-item-object-category current-post-ancestor current-menu-parent current-post-parent menu-item-15463"><a href="http://www.deceptivemedia.co.uk/category/photoblog">Archives</a></li>
                <li id="menu-item-23480" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-23480"><a href="http://www.deceptivemedia.co.uk/category/projects/portfolio">Portfolio</a></li>
              </ul>
            </li>
            <li id="menu-item-16600" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-16600"><a href="http://www.deceptivemedia.co.uk/category/videos">Videos</a></li>
            <li id="menu-item-18037" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-18037"><a href="http://www.deceptivemedia.co.uk/category/news">News</a></li>
            <li id="menu-item-17995" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-17995"><a href="http://www.deceptivemedia.co.uk/category/reviews">Reviews</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="search-form">
      <form method="get" id="search" class="err" action="http://www.deceptivemedia.co.uk/">
        <input placeholder="Enter search text and hit enter" type="text" value="" name="s" id="s">
      </form>
    </div>

    <div class="filter">
      <div class="filter-menu" style="display: block">
        <div class="categories-menu-show show_categories" style="display:block">
          <h2 class="filter-heading">Categories</h2>
          <ul class="hierarchy">
            <li class="cat-item cat-item-766"><a href="http://www.deceptivemedia.co.uk/category/cameras">Cameras</a> (734)
              <ul class="children">
                <li class="cat-item cat-item-713"><a href="http://www.deceptivemedia.co.uk/category/cameras/canon-eos-300d">Canon EOS 300D</a> (96)
                </li>
                <li class="cat-item cat-item-714"><a href="http://www.deceptivemedia.co.uk/category/cameras/canon-eos-500d">Canon EOS 500D</a> (21)
                </li>
                <li class="cat-item cat-item-715"><a href="http://www.deceptivemedia.co.uk/category/cameras/canon-eos-5d">Canon EOS 5D</a> (313)
                </li>
                <li class="cat-item cat-item-728"><a href="http://www.deceptivemedia.co.uk/category/cameras/pentax-optio-33lf">Pentax Optio 33LF</a> (1)
                </li>
                <li class="cat-item cat-item-730"><a href="http://www.deceptivemedia.co.uk/category/cameras/sony-cybershot">Sony Cybershot</a> (2)
                </li>
              </ul>
            </li>
            <li class="cat-item cat-item-765"><a href="http://www.deceptivemedia.co.uk/category/lenses">Lenses</a> (704)
              <ul class="children">
                <li class="cat-item cat-item-732"><a href="http://www.deceptivemedia.co.uk/category/lenses/canon-ef-100-400mm-f4-5-5-6l-is">Canon EF 100-400mm f/4.5-5.6L IS</a> (92)
                </li>
                <li class="cat-item cat-item-733"><a href="http://www.deceptivemedia.co.uk/category/lenses/canon-ef-17-40mm-f4l">Canon EF 17-40mm f/4L</a> (99)
                </li>
                <li class="cat-item cat-item-775"><a href="http://www.deceptivemedia.co.uk/category/lenses/canon-ef-24-105-f4l-is">Canon EF 24-105 f/4L IS</a> (1)
                </li>
                <li class="cat-item cat-item-748"><a href="http://www.deceptivemedia.co.uk/category/lenses/tamron-90mm-f2-8-macro">Tamron 90mm f/2.8 macro</a> (164)
                </li>
              </ul>
            </li>
            <li class="cat-item cat-item-155"><a href="http://www.deceptivemedia.co.uk/category/news">News</a> (8)
            </li>
            <li class="cat-item cat-item-149"><a href="http://www.deceptivemedia.co.uk/category/photoblog">Photoblog</a> (735)
            </li>
          </ul>
        </div>
        <div class="clear"></div>
      </div>
    </div>

    <div class="connect">
      <div class="divide"></div>
      <div class="widget">
        <h3>Elsewhere</h3>
        <ul class="xoxo blogroll">
          <li><a href="http://www.arcangel.com/C.aspx?VP3=SearchResult&amp;VBID=2U1HZO9RCHXD" target="_blank">Arcangel</a></li>
          <li><a href="http://www.c-dek.co.uk/" title="Ambient electronica" target="_blank">C-Dek</a></li>
          <li><a href="http://www.gettyimages.co.uk/search/2/image?artist=deceptive%20media&amp;excludenudity=false&amp;page=1&amp;sort=newest" title="Sock photography at Getty Images" target="_blank">Getty Images</a></li>
          <li><a href="http://www.greatbigcanvas.com/category/bell-andy/" target="_blank">Great Big Canvas</a></li>
          <li><a href="http://www.lcuk.photo/author/deceptive/" title="A member of Landscape Collective UK" target="_blank">LCUK</a></li>
          <li><a href="http://photoblogs.org/blogs/deceptivemedia.co.uk" target="_blank">Photoblogs.org</a></li>
          <li><a href="http://trigger.photoshelter.com/search?I_DSC=Andy+Bell&amp;I_DSC_AND=t&amp;_ACT=search" title="Trigger Image" target="_blank">Trigger Image</a></li>
        </ul>
        <div class="clear"></div>
      </div>
      <div class="divide"></div>
      <div class="widget"><a class="ambient-light-button-social" href="https://www.flickr.com/photos/deceptivemedia/"><i class="fa fa-flickr"></i></a><a class="ambient-light-button-social" href="https://www.facebook.com/DeceptiveMedia/"><i class="fa fa-facebook"></i></a><a class="ambient-light-button-social" href="https://500px.com/deceptivemedia"><i class="fa fa-500px"></i></a><a class="ambient-light-button-social" href="https://twitter.com/Deceptive_Media"><i class="fa fa-twitter"></i></a><a class="ambient-light-button-social" href="http://deceptivemedia.tumblr.com/"><i class="fa fa-tumblr"></i></a>
        <div class="clear"></div>
      </div>
      <footer>
        <div class="divide"></div>
        <div class="copyright">
          ©2004-2017 Deceptive Media </div>
      </footer>
    </div>

  </div>
