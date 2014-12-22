<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<div class="guru-team col-lg-3 col-sm-3 col-xs-6">
    <div class="txt-team">
        <h2><?php the_title(); ?></h2>
        <?php the_content(); ?>
    </div>
    <?php
    foreach(array(1,2,3) as $i) {
        if(get_post_meta($post->ID, 'guru_team_mos_' .$i, true)) {
                echo '<img src="'. get_post_meta($post->ID, 'guru_team_mos_' .$i, true) .'" class="img-responsive img-team-'. $i .'" />';
        }
    }
?>
</div>