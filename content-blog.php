
    <?php

if(has_post_thumbnail()) {
$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'guru_blog' );
//$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'guru_169' );

$url = 'url(' . $thumb[0] . ')';

}
$cat = get_the_category();

    ?>
        <div class="cat-<?php echo $cat[0]->term_id; ?> <?php echo is_single() ? "col-sm-4" : "col-sm-6" ; ?>">
            <div class="loading blogpost" style="/*background-image: <?php echo $url; ?>*/">
                <header>
                    <p class="cats"><?php echo $cat[0]->name; ?></p>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                </header>
            <?php if(!is_single()): ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0] ?>" alt="<?php esc_attr($thumb[1]) ?>" class="img-responsive"
                style="margin: 0 auto;"/></a>
                <br />
                <?php endif; ?>
                <div class="">
                    <!--
                    <?php if(get_post_meta( $post->ID, 'post_subtitle', true  )): ?>
                    <span class='sub'><?php echo get_post_meta( $post->ID, 'post_subtitle', true  ); ?></span>
                    <?php endif; ?>-->
                    <?php if(is_single() ): the_content();
                    else : the_excerpt();
                    endif;?>
                </div>
                
                <div class="col-center">    
                    <div class="fb-like" data-href="<?php the_permalink(); ?> " data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                </div>
                
                <p class="date"><?php echo get_the_date(); ?></p>
            </div>
        </div>