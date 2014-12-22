<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
                    <div class="">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

$cat = get_the_category();
					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					//get_template_part( 'content', 'blog' );
                                        
                    ?>
            <div class="cat-<?php echo $cat[0]->term_id; ?> <?php echo is_single() ? "" : "col-sm-6" ; ?>">
                        
            <div class="loading blogpost" style="/*background-image: <?php echo $url; ?>*/">
                <header>
                    <p class="cats"><?php echo $cat[0]->name; ?></p>
                    <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                </header>
            
                <div class="entry-content">
                    <!--
                    <?php if(get_post_meta( $post->ID, 'post_subtitle', true  )): ?>
                    <span class='sub'><?php echo get_post_meta( $post->ID, 'post_subtitle', true  ); ?></span>
                    <?php endif; ?>
                    -->
                    <?php 
                    the_content();
                    ?>
                </div>
                
                
                <p class="date"><?php echo get_the_date(); ?></p>
            </div>
        </div>
                  
        <div class="col-bg col-social">
                <div class="clearfix">    
                    <div class="col-sm-3 col-xs-6" style="text-align:center;">
                    <div class="fb-like" data-href="<?php the_permalink(); ?> " data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div>
                    </div>
                    <div class="col-sm-3 col-xs-6" style="text-align:center;">
                        <div class="g-plusone" data-size="tall" data-annotation="none"></div>
                        <div class="g-plus" data-action="share" data-annotation="none" data-height="24"></div>
                    </div>
                    <div class="col-sm-3 col-xs-6" style="text-align:center;">
                        <script src="//platform.linkedin.com/in.js" type="text/javascript">
  lang: fr_FR
</script>
<script type="IN/Share" data-counter="right"></script>
                    </div>
                    <div class="col-sm-3 col-xs-6" style="text-align:center;">
                        <a class="twitter-share-button" href="https://twitter.com/share"
  data-size="large"
  data-count="none">
Tweet
</a>
<script type="text/javascript">
window.twttr=(function(d,s,id){var t,js,fjs=d.getElementsByTagName(s)[0];if(d.getElementById(id)){return}js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);return window.twttr||(t={_e:[],ready:function(f){t._e.push(f)}})}(document,"script","twitter-wjs"));
</script>
                    </div>
                    
                </div>
        </div>
<?php

$the_query = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'order' => 'DESC',
    'orderby' => 'ID',
    'post__not_in' => array($post->ID),
));
//print_r($the_query);
if ($the_query->have_posts()) :
    //$cols = array(6,6,4,8);
    
					
    ?>
    <div class="other-posts col-bg">
        <h1>Plus d'articles à lire</h1>
        <div class="row">
    <?php
    for($c=0;$the_query->have_posts();$c++) : $the_query->the_post();
        $cat = get_the_category();
        //get_template_part('content', 'blog');
     ?><div class="col-sm-4 cat-<?php echo $cat[0]->term_id; ?>">
         <a href="<?php    the_permalink(); ?>"><div class="box">
             <?php the_post_thumbnail('guru_169'); ?>
                 <h3><?php the_title(); ?></h3>
        </div></a>
     </div><?php 
    endfor;
    ?>
        </div>
    </div>
    <?php
endif;
?>
                    <?php
					// Previous/next post navigation.
					//twentyfourteen_post_nav();
                                        
					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
				endwhile;
			?>
                    </div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
//get_sidebar( 'content' );
//get_sidebar();
get_footer();
