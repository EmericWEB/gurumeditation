<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();
?>
                    

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="col-center" style="text-align: center;">
	<?php
        //the_post_thumbnail('guru_169', array('class' => 'img-responsive'));
	?>
    </div>
	<div class="entry-content">
		<?php
			the_content();
			
			edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
                    <?php
					// Include the page content template.
				//	get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
				endwhile;
			?>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php //get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
