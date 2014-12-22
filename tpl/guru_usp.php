<?php
/**
 * Template Name: Guru Template - USP
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
					get_template_part( 'content', 'page' );

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
    'post_type' => 'guru_team',
    'posts_per_page' => 12,
    'order' => 'ASC',
    'orderby' => 'ID',
));
//print_r($the_query);
if ($the_query->have_posts()) :
    ?>
    <div class="row">
    <?php
    while($the_query->have_posts()) : $the_query->the_post();

?>
    <div class="col-md-4 guru-team loadimg">
        <?php
        
if(has_post_thumbnail()) {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

echo '<a href="'. get_permalink().'" class="fakeajax"><img src="' . $thumb[0] . '" alt="" class="img-responsive" /></a>';

}
        ?>
        <div class="team-extra">
        <h2><?php the_title(); ?></h2>
        <p><?php echo get_post_meta( $post->ID,  'guru_team_quality', true ) ?></p>
        </div>
    </div>
    <?php
    endwhile;
    ?>
    </div>
    <?php
endif;
?>

</div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
