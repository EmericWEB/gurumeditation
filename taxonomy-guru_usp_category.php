<?php
/**
 * The template for displaying Archive Team.
 *
 *
 * @package WordPress
 * @subpackage Café Danse
 * @since Café Danse 1.0
 */

get_header();

$taxname = $wp_query->queried_object->name;
$slug = $wp_query->queried_object->slug;
$p = 0;
?>

	<section id="primary" class="site-content">
		<div id="content" role="main" class="container">
		<?php if ( have_posts() ) : ?>
                    <div class="row">
			<?php
                        //for($i = 5;$i--;):
			while ( have_posts() ) : the_post();
                        ?>
                       <div class="usp">
        <?php
        
if(has_post_thumbnail()) {

}
        ?>
        <span><?php echo $taxname; ?></span>
        <div class="col-center">
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
        </div>
    </div>
                        <?php
                        //get_template_part( 'content', 'foto');
			endwhile;
                        //endfor;
?>
                    </div>
<?php			//twentytwelve_content_nav( 'nav-below' );
			?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php 
//get_sidebar();

get_footer();