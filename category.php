<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">

			<?php if ( have_posts() ) : ?>

			<header class="archive-header">
				<h1 class="archive-title"><?php printf( '%s', single_cat_title( '', false ) ); ?></h1>

				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .archive-header -->

			<?php
					// Start the Loop.
					while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
if(has_post_thumbnail()) {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'guru_bigsquare' );

$url = 'url(' . $thumb[0] . ')';

}
$cat = get_the_category();
    ?>
        <div class="col-sm-6">
            <div class="loading blog" style="/*background-image: <?php echo $url; ?>*/">
                <header>
                    <p class="cat-<?php echo $cat[0]->term_id; ?>"><?php echo $cat[0]->name; ?></p>
                    <h1><span><?php the_title(); ?></span></h1>
                </header>
            <?php //the_post_thumbnail('guru_square') ?>
            
            <img src="<?php echo $thumb[0] ?>" alt="<?php esc_attr($thumb[1]) ?>" class="img-responsive"/>
                <div class="abs">
                    <?php the_excerpt(); ?>
                </div>
            </div>
        </div>
                        <?php
					//get_template_part( 'content', get_post_format() );

					endwhile;
					// Previous/next page navigation.
					twentyfourteen_paging_nav();

				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );

				endif;
			?>
		</div><!-- #content -->
	</section><!-- #primary -->

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
