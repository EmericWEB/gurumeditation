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
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php
    
            $args = array(
                //'sort_order' => 'ASC',
                'sort_column' => 'menu_order',
                'hierarchical' => 0,
                'exclude' => '',
                'include' => '',
                'meta_key' => '',
                'meta_value' => '',
                'authors' => '',
                'child_of' => 0,
                'parent' => 0,
                'exclude_tree' => '',
                'number' => '',
                'offset' => 0,
                'post_type' => 'page',
                'post_status' => 'publish'
            ); 
            $pages = get_pages($args); 
?>
    <div id="homesplash">
        <div id="home-nav">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="" style="max-width:180px;height:auto;" />
        <nav>
            <ul>
            <?php
             /*$menu_name = 'guru-menu-home';

    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

	$menu_items = wp_get_nav_menu_items($menu->term_id);

	$menu_list = '<ul id="menu-' . $menu_name . '">';

	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $title = $menu_item->title;
	    $url = $menu_item->url;
	    $menu_list .= '<li><a href="' . $url . '">' . $title . '</a></li>';
	}
	$menu_list .= '</ul>';
    } else {
	$menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
    }
              * 
              */
            foreach ($pages as $page) {
                ?>
                <li><a href=" <?php echo get_page_link($page->ID); ?> " class="home" data-rel="#slide-<?php echo $page->ID; ?>"><?php echo $page->post_title; ?></a></li>
                <?php
            }
            ?>
            </ul>
        </nav>
        <div id="homesocial">
            <?php 
            foreach (array('facebook', 'linkedin') as $social) {
                if(get_option('gurutheme_' . $social)):
                    ?>
            <a href="<?php echo get_option('gurutheme_' . $social); ?>" target="_blank" class="ico-social" id="ico-<?php echo $social; ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/img/social/<?php echo $social; ?>.png" alt="" /></a>
            <?php
                endif;
            }
            ?>
        </div>
        </div>
    </div>
    <div id="fullscreen-slide" style="background-image: url(<?php echo get_option('gurutheme_home_background'); ?>)">
        <div class="slides">
        <?php 
            foreach ($pages as $page) {

                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($page->ID), 'guru_fullsreen' );
                //$url = 'url(' . $thumb[0] . ')';
                if( is_array($thumb)):
                ?>
        <div class="slide" id="slide-<?php echo $page->ID; ?>" style="background-image: url(<?php echo $thumb[0]; ?>)">
            <img src="<?php echo $thumb[0]; ?>" alt="" />
        </div><?php
        endif;
            }
            ?>
        </div>
    </div>
    
	<?php wp_footer(); ?>
    
        <?php if(get_option('gurutheme_google_analytics')): ?>
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','<?php echo get_option('gurutheme_google_analytics'); ?>');ga('send','pageview');
        </script>
        <?php endif; ?>
</body>
</html>