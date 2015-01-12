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
		</footer><!-- #colophon -->
	<?php wp_footer(); ?>
                
</body>
</html>