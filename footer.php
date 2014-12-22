<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- .row -->
            </div><!-- #main -->

                    <div id="loading"></div>

	</div><!-- #page -->

		<footer id="colophon" class="site-footer" role="contentinfo">

                    <div class="container">
                        <div class="">
                            <div class="col">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/depur-consulting.png" alt="DEPUR" class="" />
                            </div>
                            <div class="col" id="legal">
                                <div class=""><?php echo wpautop(get_option('gurutheme_address')); ?></div>
                                <div class=""><?php echo wpautop(get_option('gurutheme_contact')); ?></div>
                            </div>
                            <div class="col">
                            </div>
                            <div class="col" id="credits">
                                <p class="ext" style="text-align: right">Branding & Design by CHICHE / GuruMeditation</p>
                            </div>
                        </div>
                    </div>
			<?php //get_sidebar( 'footer' ); ?>
		</footer><!-- #colophon -->
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