<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<article class="usp">
        <?php
        
if(has_post_thumbnail()) {

}
        ?>
        <span><?php echo $taxname; ?></span>
            <h1><?php the_title(); ?></h1>
            <div><?php the_content(); ?></div>
</article>
