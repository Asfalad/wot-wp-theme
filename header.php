<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
    <header class="fixed-top">
    <div class="collapse target" id="navbarHeader">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 col-md-7 py-4 about-top">
            <h4 class="text-white">О нас</h4>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce malesuada massa vel varius mollis. Ut laoreet
              mauris in ligula efficitur, non condimentum metus placerat.</p>
          </div>
          <div class="col-sm-4 offset-md-1 py-4">
            <h4 class="text-white">Контакты</h4>
            <ul class="list-unstyled">
              <li>
                <a href="#" class="text-white">Follow on Twitter</a>
              </li>
              <li>
                <a href="#" class="text-white">Like on Facebook</a>
              </li>
              <li>
                <a href="#" class="text-white">Email me</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="navbar navbar-dark navbar-expand-md navbar-expand-lg box-shadow">
      <div class="container d-flex justify-content-between">
        <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
            <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url( '/' )); ?>">
                <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
            </a>
        <?php else : ?>
            <a class="navbar-brand d-flex align-items-center" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
        <?php endif; ?>
        <div class="collapse navbar-collapse target text-center" id="mainNav">
          <?php
            wp_nav_menu(array(
            'theme_location'    => 'primary',
            'menu_id'         => false,
            'menu_class'      => 'navbar-nav',
            'depth'           => 2,
            'fallback_cb'     => 'wot_bootstrap_menu_navwalker::fallback',
            'walker'          => new wot_bootstrap_menu_navwalker()
            ));
          ?>
          <?php
            wp_nav_menu(array(
            'theme_location'    => 'secondary',
            'menu_id'         => false,
            'menu_class'      => 'navbar-nav ml-auto',
            'depth'           => 2,
            'fallback_cb'     => 'wot_bootstrap_menu_navwalker::fallback',
            'walker'          => new wot_bootstrap_menu_navwalker()
            ));
        ?>
        </div>
        <button class="navbar-toggler border-danger" id="navbarHeaderToggler" data-toggle="collapse" data-target=".target" aria-controls="navbarHeader"
          aria-expanded="false" aria-label="Включить навигацию">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <button class="navbar-toggler all-toggler border-danger btn-danger" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader"
        aria-expanded="false" aria-label="Включить навигацию">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </header>
  <main role="main" id="top">

	<header id="masthead" class="site-header navbar-static-top <?php echo wp_bootstrap_starter_bg_class(); ?>" role="banner">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0">
                <div class="navbar-brand">
                    <?php if ( get_theme_mod( 'wp_bootstrap_starter_logo' ) ): ?>
                        <a href="<?php echo esc_url( home_url( '/' )); ?>">
                            <img src="<?php echo esc_attr(get_theme_mod( 'wp_bootstrap_starter_logo' )); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                        </a>
                    <?php else : ?>
                        <a class="site-title" href="<?php echo esc_url( home_url( '/' )); ?>"><?php esc_url(bloginfo('name')); ?></a>
                    <?php endif; ?>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-nav" aria-controls="" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <?php
                wp_nav_menu(array(
                'theme_location'    => 'primary',
                'container'       => 'div',
                'container_id'    => 'main-nav',
                'container_class' => 'collapse navbar-collapse justify-content-end',
                'menu_id'         => false,
                'menu_class'      => 'navbar-nav',
                'depth'           => 3,
                'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
                'walker'          => new wp_bootstrap_navwalker()
                ));
                ?>

            </nav>
        </div>
	</header><!-- #masthead -->
    <?php if(is_front_page() && !get_theme_mod( 'header_banner_visibility' )): ?>
        <div id="page-sub-header" <?php if(has_header_image()) { ?>style="background-image: url('<?php header_image(); ?>');" <?php } ?>>
            <div class="container">
                <h1>
                    <?php
                    if(get_theme_mod( 'header_banner_title_setting' )){
                        echo get_theme_mod( 'header_banner_title_setting' );
                    }else{
                        echo 'Wordpress + Bootstrap';
                    }
                    ?>
                </h1>
                <p>
                    <?php
                    if(get_theme_mod( 'header_banner_tagline_setting' )){
                        echo get_theme_mod( 'header_banner_tagline_setting' );
                }else{
                        echo esc_html__('To customize the contents of this header banner and other elements of your site, go to Dashboard > Appearance > Customize','wp-bootstrap-starter');
                    }
                    ?>
                </p>
                <a href="#content" class="page-scroller"><i class="fa fa-fw fa-angle-down"></i></a>
            </div>
        </div>
    <?php endif; ?>
	<div id="content" class="site-content">
		<div class="container">
			<div class="row">
                <?php endif; ?>