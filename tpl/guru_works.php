<?php
/**
 * Template Name: Guru Template - Projets
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
$_post = $post;
get_header(); ?>

<div id="main-content" class="main-content">


	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					//get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
				endwhile;
			?>
		</div><!-- #content -->
	</div><!-- #primary -->
<?php

$the_query = new WP_Query(array(
    'post_type' => 'guru_works',
    'posts_per_page' => 12,
    //'order' => 'ASC',
    //'orderby' => 'ID',
));
//print_r($the_query);
if ($the_query->have_posts()) :
    //$cols = array(6,6,4,8);
    ?>
    <div class="clearfix row">
        <div class="homecol">
    <?php
    for($c=0;$the_query->have_posts();$c++) : $the_query->the_post();

if(has_post_thumbnail()) {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'guru_bigsquare' );

$url = 'url(' . $thumb[0] . ')';

}

    ?>
        <div class="col-sm-6 col-md-4">
            <a href="<?php the_permalink(); ?>"><div class="pic loading" style="/*background-image: <?php echo $url; ?>*/">
            <?php //the_post_thumbnail('guru_square') ?>
            <img src="<?php echo $thumb[0] ?>" alt="<?php esc_attr($thumb[1]) ?>" class="img-responsive"/>
                <div class="abs">
                    <div><?php echo wpautop(get_post_meta(get_the_ID(), 'guru_works_shortdesc', true)); ?></div>
                </div>
                <div class="abs-bottom">
                    <div>
                    <h3><span><?php the_title(); ?></span></h3>
                    </div>
                </div>
                </div>
            </a>
        </div>
    <?php
    endfor;
    ?>
        </div>
    </div>
    <?php
endif;
?>
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
