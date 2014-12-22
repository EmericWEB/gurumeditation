<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
        <base href="<?php echo home_url('/'); ?>" />
	<?php wp_head(); ?>
</head>

<?php $page_header = get_post_meta($post->ID, 'page_header', true); ?>
<body <?php body_class(); ?>>
    <?php 
    if(is_single()):
        ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <?php
            endif;
    ?>
<div id="page" class="hfeed site">
	<?php /*if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif;*/ ?>

    <nav id="primary-navigation" class="site-navigation primary-navigation  <?php if(is_front_page()): ?>homenav<?php endif; ?>" role="navigation">
        <div class="container">
        <div class="header-menu">
            <div class="nav-left">
            <a href="" id="btn-menu">MENU</a>
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'nav-menu',  'menu_class' => 'nav-menu' ) ); ?>
            </div>
            <div class="nav-right clearfix">
                <div>
                <a href="contact" id="btn-contact">Contact</a>
                <a href="" id="btn-newsletter">Newsletter</a>
                </div>
                <div class="social-blk">
                     <?php 
            foreach (array('facebook', 'linkedin') as $social) {
                if(get_option('gurutheme_' . $social)):
                    ?>
                <a href="<?php echo get_option('gurutheme_' . $social); ?>" class="ico-social" id="ico-<?php echo $social; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/social/<?php echo $social; ?>.png" alt="" /></a>
            <?php
                endif;
            }
            ?>
                </div>
                
            </div>
            <div class="nav-right clearfix">
                <div class="form-newsletter">
                <?php if(function_exists('gurunewslettersubform')) :
                echo gurunewslettersubform();
                endif; ?>
                </div>
            </div>
        </div><!--
        <div class="header-toggle"><a href="" id="btn-header">Open</a></div>
              -->
        </div>
    </nav>
	<header id="masthead" role="banner" class="site-header <?php if($page_header): ?>header-white<?php endif; ?>"
            <?php if($page_header) : ?>
            style="background: transparent url(<?php echo get_post_meta($post->ID, 'page_header', true) ?>) no-repeat center;"
            <?php endif; ?>>
		<div class="header-main">
                    <h1 class="site-title">
                        <?php
                        if(is_tax()) : 
                            echo single_cat_title( '', false ) ;
                        elseif(is_singular('post')) : 
                        ?>
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>blog" rel="home">BLOG</a>
                        <?php
                        else:
                        the_title();
                        endif;
                        ?></h1>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/depur-consulting<?php if($page_header): ?>-white<?php endif; ?>.png" alt="" style="max-width:240px;height:auto;" />
                    </a>
		</div>
                    <?php //guru_breadcrumb($post); ?>
	</header><!-- #masthead -->

	<div id="main" class="site-main container">
            <div class="clearfix">
