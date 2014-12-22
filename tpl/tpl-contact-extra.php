<?php
/**
 * Template Name: Guru Template - Futur client
 *
 * @package WordPress
 * @subpackage Guru_Meditation
 * @since Gur Meditation 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">

<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
                    <div class="container">
                    <div class="row">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					/*if ( comments_open() || get_comments_number() ) {
						comments_template();
					}*/
                                        
                                        do_action('guru_contact');
                                        ?>
                        <div class="col-center">
                <div class="form-groups">
                    <div class="">
                        <input type="radio" name="date" class="" id="inputDate1" value="0" data-rel="#contact-date1">
                        <label for="inputDate1" class=""> a/ Vous êtes un client emmerdant, mauvais payeur, hyper demandeur, donc peu rentable</label>
                    </div>
                </div>
                <div class="form-groups">
                    
                    <div class="">
                        <input type="radio" name="date" class="" id="inputDate2" value="1"  data-rel="#contact-date2">
                        <label for="inputDate2" class=""> b/ Au contraire, vous êtes dynamique, enthousiaste, généreux et ouvert</label>
                    </div>
                </div>
                        <!--Si vous avez répondu b), merci de remplir le questionnaire afin de nous aider à mieux cerner 

les contours de votre projet.-->
                        </div>
                        
                <div id="contact-date1" class="clearfix col-center contact-hide">
                    
                    <form  action="<?php the_permalink() ?>" class="form-horizontal json"  method="POST" >
                        
                    <h2>Projets</h2>
                    <p>Bon c'est pas gagné mais on peut faire quelque chose ensemble. On aime les défis.</p>
                <div class="form-groups">
                    <div class="">
                    <label for="inputConcept" class="control-labels">Avez-vous déjà un concept ?</label>
                        <textarea name="concept" class="form-controls" id="inputConcept" rows="5" placeholder="Un resto rouge, des soirées ambiance médiévale..."><?php echo esc_textarea($_POST['concept']) ?></textarea>
                    </div>
                </div>
                    <h2>Votre société (si déjà existante)</h2>
                <div class="form-groups">
                    <div class="">
                        <label for="inputCompany" class="control-labels">Nom et forme juridique</label>
                        <input type="text" name="company" class="form-controls" id="inputCompany" placeholder="" value="<?php echo esc_attr($_POST['company']) ?>">
                    </div>
                </div>

                <div class="form-groups">
                    <div class="">
                    <label for="inputPhone" class="control-labels">N° Téléphone</label>
                    <input type="tel" name="phone" class="form-controls" id="inputEmail" placeholder="(+33)6" value="<?php echo esc_attr($_POST['phone']) ?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                    <label for="inputEmail" class="control-labels">Email</label>
                        <input type="email" name="email" class="form-controls" id="inputEmail" placeholder="contact@depur.com" value="<?php echo esc_attr($_POST['email']) ?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                    <label for="inputLastname" class="control-labels">Dirigeant<br />Nom et prénom</label>
                      <input type="text" name="lastname" class="form-controls" id="inputLastname" placeholder="Nom" value="<?php echo esc_attr($_POST['lastname']) ?>">
                    </div>
                </div>	
                    
                <div class="form-groups">
                    <div class="">
                      <button type="submit" class="">Envoyer</button>
                    </div>
                  </div>
                    <input type="hidden" name="guru_contact" value="bad" />
                    <?php wp_nonce_field("contact", "_wp_contact") ?>
                    </form>
                </div>
                <div id="contact-date2" class="clearfix col-center contact-hide">
                    
                    <form  action="<?php the_permalink() ?>" class="form-horizontal json"  method="POST" >
                        
                    <h2>Projets</h2>
                <div class="form-groups">
                    <div class="">
                    <label for="inputConcept" class="control-labels">Avez-vous déjà un concept ?</label>
                        <textarea name="concept" class="form-controls" id="inputConcept" rows="5" placeholder="Un resto rouge, des soirées ambiance médiévale..."><?php echo esc_textarea($_POST['concept']) ?></textarea>
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                        <label for="inputHistory" class="control-labels">Quelle est l’histoire / l’élément fondateur à l’origine du concept ?</label>
                        <textarea name="history" class="form-controls" id="inputHistory" rows="5" placeholder="Un voyage au chili, la rencontre d'un chat bleu"><?php echo esc_textarea($_POST['history']) ?></textarea>
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                        <label for="inputWhere" class="control-labels">Où en êtes-vous dans votre projet ?</label>
                        <textarea name="where" class="form-controls" id="inputWhere" rows="5" placeholder="Perdu dans l'Univers"><?php echo esc_textarea($_POST['where']) ?></textarea>
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                        <label for="inputWho" class="control-labels">Quels sont vos références de concepts / restos/ bars ?</label>
                        <textarea name="who" class="form-controls" id="inputWho" rows="5" placeholder=""><?php echo esc_textarea($_POST['who']) ?></textarea>
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                        <label for="inputWhat" class="control-labels">Qu’attendez-vous de notre collaboration ?</label>
                        <textarea name="what" class="form-controls" id="inputWhat" rows="5" placeholder="Un succés fou, du champagne à gogo"><?php echo esc_textarea($_POST['what']) ?></textarea>
                    </div>
                </div>
                    <h2>Votre société (si déjà existante)</h2>
                <div class="form-groups">
                    <div class="">
                        <label for="inputCompany" class="control-labels">Nom et forme juridique</label>
                        <input type="text" name="company" class="form-controls" id="inputCompany" placeholder="" value="<?php echo esc_attr($_POST['company']) ?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                    <label for="inputAddress" class="control-labels">Adresse</label>
                        <input type="text" name="address" class="form-controls" id="inputAddress" placeholder="" value="<?php echo esc_attr($_POST['address']) ?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                    <label for="inputPhone" class="control-labels">N° Téléphone</label>
                    <input type="tel" name="phone" class="form-controls" id="inputEmail" placeholder="(+33)6" value="<?php echo esc_attr($_POST['phone']) ?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                    <label for="inputEmail" class="control-labels">Email</label>
                        <input type="email" name="email" class="form-controls" id="inputEmail" placeholder="contact@depur.com" value="<?php echo esc_attr($_POST['email']) ?>">
                    </div>
                </div>
                <div class="form-groups">
                    <div class="">
                    <label for="inputWebsite" class="control-labels">Site Internet</label>
                        <input type="url" name="website" class="form-controls" id="inputWebsite" placeholder="http://" value="<?php echo esc_attr($_POST['website']) ?>">
                    </div>
                </div>	
                <div class="form-groups">
                    <div class="">
                    <label for="inputWorkers" class="control-labels">Nombre de salariés</label>
                        <input type="number" name="workers" class="form-controls" id="inputWorkers" placeholder="" value="<?php echo esc_attr($_POST['workers']) ?>">
                    </div>
                </div>	
                <div class="form-groups">
                    <div class="">
                    <label for="inputLastname" class="control-labels">Dirigeant<br />Nom et prénom</label>
                      <input type="text" name="lastname" class="form-controls" id="inputLastname" placeholder="Nom" value="<?php echo esc_attr($_POST['lastname']) ?>">
                    </div>
                </div>	
                <div class="form-groups">
                    <div class="">
                      <button type="submit" class="">Envoyer</button>
                    </div>
                  </div>
                    <input type="hidden" name="guru_contact" value="plus" />
                    <?php wp_nonce_field("contact", "_wp_contact") ?>
                </form>
                
                </div>
                
                <div class="col-center">
                    <div class="json-log"></div>
                </div>
                    <?php
				endwhile;
			?>

                        </div><!-- .row -->
                    </div><!-- .container -->
		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_sidebar( 'content' ); ?>
</div><!-- #main-content -->

<?php
//get_sidebar();
get_footer();
