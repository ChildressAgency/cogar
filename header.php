<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="">

    <meta http-equiv="cache-control" content="public">
    <meta http-equiv="cache-control" content="private">
    <title>Cogar Plumbing</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-30535612-129', 'auto');
      ga('send', 'pageview');

    </script>
  </head>
  <body <?php body_class(); ?>>
    <div id="masthead">
      <div class="container-fluid">
        <div class="pull-right">
          <div class="phone">
            <p>CALL TODAY<a href="tel:<?php the_field('phone_number', 'option'); ?>"><?php the_field('phone_number', 'option'); ?></a></p>
          </div>
          <div class="social">
            <?php if(get_field('facebook', 'option')): ?>
              <a href="<?php the_field('facebook', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-facebook-official fa-stack-1x fa-inverse"></i>
              </a>
            <?php endif; ?>
            <?php if(get_field('twitter', 'option')): ?>
              <a href="<?php the_field('twitter', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
              </a>
            <?php endif; ?>
            <?php if(get_field('linkedin', 'option')): ?>
              <a href="<?php the_field('linkedin', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
              </a>
            <?php endif; ?>
            <?php if(get_field('google_plus', 'option')): ?>
              <a href="<?php the_field('google_plus', 'option'); ?>" class="fa-stack fa-lg" target="_blank">
               <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
              </a>
            <?php endif; ?>
          </div>
          <div class="request-service">
            <a href="<?php echo home_url('contact'); ?>" class="btn-alt btn-rounded">Request a service</a>
          </div>
        </div>
      </div>
    </div>
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <a href="<?php echo home_url(); ?>" class="logo">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-header.png" class="img-responsive star-logo" alt="Cogar Plumbing Logo" />
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/the-cogar-company.png" class="img-responsive the-cogar-company" alt="The Cogar Company" />
          </a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="expanded" aria-controls="navbar">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <?php 

          $nav_defaults = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => 'div',
            'container_class' => 'navbar-collapse collapse',
            'container_id' => 'navbar',
            'menu_class' => 'nav navbar-nav navbar-right',
            'menu_id' => '',
            'echo' => true,
            'fallback_cb' => 'cogar_main_nav_fallback_manu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new wp_bootstrap_navwalker()
          );
          wp_nav_menu($nav_defaults);

          function cogar_main_nav_fallback_manu(){ 
            //check if services or child of services
            $parent_slug = '';
            if(is_page()){
              global $post;
              $parents = get_post_ancestors($post->ID);
              $id = ($parents) ? $parents[count($parents) -1] : $post->ID;
              $parent = get_post($id);
              $parent_slug = $parent->post_name;
            } ?>

            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li<?php if(is_page('projects')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('projects'); ?>">Projects</a></li>
                <!--<li<?php if(is_page('services') || $parent_slug == 'services'){ echo ' class="active"'; } ?>><a href="<?php echo home_url('water-heaters'); ?>">Services</a></li>-->
                <li<?php if(is_page('residential')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('residential'); ?>">Residential</a></li>
                <li<?php if(is_page('commercial')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('commercial'); ?>">Commercial</a></li>
                <li<?php if(is_page('property-management')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('property-management'); ?>">Property Management</a></li>
                <li<?php if(is_page('help-desk')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('help-desk'); ?>">Help Desk</a></li>
                <li<?php if(is_page('contact')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('contact'); ?>">Contact</a></li>
              </ul>
            </div>
          <?php } ?>
        <?php 
            //check if services or child of services
            $parent_slug = '';
            if(is_page()){
              global $post;
              $parents = get_post_ancestors($post->ID);
              $id = ($parents) ? $parents[count($parents) -1] : $post->ID;
              $parent = get_post($id);
              $parent_slug = $parent->post_name;
            }
          if(is_page('services') || $parent_slug == 'services'):
          /*
            $services_navbar_args = array(
              'theme_location' => 'services-page', 
              'menu' => '',
              'container' => 'div',
              'container_class' => 'navbar-collapse collapse',
              'container_id' => 'servicesNavbar',
              'menu_class' => 'nav navbar-nav navbar-right',
              'menu_id' => '',
              'echo' => true,
              'fallback_cb' => 'cogar_services_navbar_fallback_menu',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
            );
            wp_nav_menu($services_navbar_args);
          */
            //function cogar_services_navbar_fallback_menu(){ ?>
              <!--<div id="servicesNavbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li<?php if(is_page('water-heaters')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('water-heaters'); ?>">Water Heaters</a></li>
                  <li<?php if(is_page('water-filtration')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('water-filtration'); ?>">Water Filtration</a></li>
                  <li<?php if(is_page('toilets-showers-tubs')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('toilets-showers-tubs'); ?>">Toilets, Showers &amp; Tubs</a></li>
                  <li<?php if(is_page('drain-cleaning')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('drain-cleaning'); ?>">Drain Cleaning</a></li>
                  <li<?php if(is_page('sewerwater-line-repairs')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sewerwater-line-repairs'); ?>">Sewer/Water Line Repairs</a></li>
                  <li<?php if(is_page('sewage-sump-pumps')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('sewage-sump-pumps'); ?>">Sewage &amp; Sump Pumps</a></li>
                  <li<?php if(is_page('well-pump-repairs')){ echo ' class="active"'; } ?>><a href="<?php echo home_url('well-pump-repairs'); ?>">Well Pump &amp; Repairs</a></li>
                </ul>
              </div>-->
            <?php //}
               endif; ?>
          
      </div>
    </nav>