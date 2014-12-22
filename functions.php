<?php
function guru_font_url() {
	$font_url = '';
	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Lato, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'twentyfourteen' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:400,700' ), "//fonts.googleapis.com/css" );
	}

	return $font_url;
}
function guru_scripts() {        
//wp_enqueue_style( 'guru-font', guru_font_url(), array(), null );
//wp_enqueue_style( 'guru-font-y', 'http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,700,300&subset=latin,latin-ext', array(), null );
wp_enqueue_style( 'guru-bootstrap', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '3.0.3' );
wp_enqueue_style( 'guru-bootstrap-theme', get_stylesheet_directory_uri() . '/bootstrap/css/bootstrap-theme.min.css', array(), '3.0.3' );
wp_enqueue_style( 'guru-style', get_stylesheet_directory_uri() . '/style.css', array(), '3.0.3' );

//if(get_page_template_slug() == 'tpl/guru_contact.php') {
    wp_enqueue_script('jquery-masonry');
    wp_enqueue_style('jquery-masonry');
    
    //wp_enqueue_script( 'guru-mason', get_stylesheet_directory_uri() . '/js/mason/mason.js', array( 'jquery' ), '20141209', true );
    wp_enqueue_script( 'guru-modernizr', get_stylesheet_directory_uri() . '/js/modernizr.js');
    wp_enqueue_script( 'guru-easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'));
    wp_enqueue_script( 'guru-mason', get_stylesheet_directory_uri() . '/js/masonry.pkgd.min.js', array( 'jquery' ), '20141209', true );
    wp_enqueue_script( 'guru-images-loaded', get_stylesheet_directory_uri() . '/js/imagesloaded.pkgd.min.js', array( 'jquery' ), '20141209', true );
    
    
    wp_enqueue_style( 'guru-jgallery-css', get_stylesheet_directory_uri() . '/jgallery/justifiedGallery.min.css', array(), '3.0.3' );
    wp_enqueue_script( 'guru-jgallery', get_stylesheet_directory_uri() . '/jgallery/jquery.justifiedGallery.min.js');
    
if(is_front_page() ) {
    wp_enqueue_script( 'guru-home', get_stylesheet_directory_uri() . '/js/home.js', array( 'jquery' ), '20141209', true );
}
else {
    wp_enqueue_script( 'guru-script', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '20141209', true );
}

}
add_action( 'wp_enqueue_scripts', 'guru_scripts' );

    /*add_action('guru_facebook', 'guru_wp_head_facebook');
    function guru_wp_head_facebook() {
        if(is_single()):
        ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <?php
            endif;
    }*/

function guru_dequeue() {

    
	// Add Lato font, used in the main stylesheet.
	wp_dequeue_style( 'twentyfourteen-lato');
	wp_deregister_style( 'twentyfourteen-lato');

	// Add Genericons font, used in the main stylesheet.
	wp_dequeue_style( 'genericons' );
	wp_deregister_style( 'genericons' );

	// Load our main stylesheet.
	wp_dequeue_style( 'twentyfourteen-style');
	wp_deregister_style( 'twentyfourteen-style');

	// Load the Internet Explorer specific stylesheet.
	wp_dequeue_style( 'twentyfourteen-ie');
	wp_deregister_style( 'twentyfourteen-ie');
	//wp_style_add_data( 'twentyfourteen-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_dequeue_script( 'comment-reply' );
		wp_deregister_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_dequeue_script( 'twentyfourteen-keyboard-image-navigation');
		wp_deregister_style( 'twentyfourteen-keyboard-image-navigation');
	}
        
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_dequeue_script( 'jquery-masonry' );
		wp_deregister_style( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_dequeue_script( 'twentyfourteen-slider');
		wp_deregister_style( 'twentyfourteen-slider');

	}
	//wp_dequeue_script( 'twentyfourteen-script');
	//wp_deregister_style( 'twentyfourteen-script');
}
add_action( 'wp_enqueue_scripts', 'guru_dequeue', 100 );


add_action('init', 'guru_imagesize');

function guru_imagesize(){
    add_image_size('guru_fullscreen', 1920, 1280, true);
    add_image_size('guru_square', 300, 300, true);
    add_image_size('guru_bigsquare', 600, 600, true);
    add_image_size('guru_169', 640, 360, true);
    add_image_size('guru_large', 640, 9999);
    add_image_size('guru_col', 320, 9999);
    add_image_size('guru_vertical', 9999, 240);
    add_image_size('guru_blog', 640, 240, true);

    add_filter('image_size_names_choose', 'guru_image_sizes', 11);
    add_filter( 'get_image_tag_class', 'guru_image_classes' );
    add_filter( 'get_image_tag', 'guru_image_tag' );
}

function guru_image_classes($class) 
{
    return "img-responsive";
}
function guru_image_tag($html) 
{

    $array = explode(' ',$html);
    $output = array();
    foreach($array as $attr) {
        if( ( strpos($attr, "width") === FALSE ) && ( strpos($attr, "height") === FALSE ) )  {
            $output[] = $attr;
        }
    }
    return implode(' ',$output);



}
function guru_image_sizes($image_sizes) {
     // get the custom image sizes
    global $_wp_additional_image_sizes;
    //print_r($_wp_additional_image_sizes);
    // if there are none, just return the built-in sizes
    if ( empty( $_wp_additional_image_sizes ) ) {
        return $image_sizes;
    }
    // add all the custom sizes to the built-in sizes
    foreach ( $_wp_additional_image_sizes as $id => $data ) {
        // take the size ID (e.g., 'my-name'), replace hyphens with spaces,
        // and capitalise the first letter of each word
        if ( !isset($image_sizes[$id]) )
            //$image_sizes[$id] = implode('x' , $data)  . ' - ' . ucfirst( str_replace( array("_", "-"), "  ", $id ) );
            $image_sizes[$id] = ucfirst( str_replace( array("_", "-"), "  ", $id ) );
        }

    return $image_sizes;
    /*
            $addsizes = array(
                    "new-size" => __( "New Size")
                    );
        $newsizes = array_merge($sizes, $addsizes);
        return $newsizes;
     * 
     */
}

//add_action('init', 'guru_setup');
function guru_setup(){
    //register_nav_menu( 'guru-menu-home', 'Menu du Footer' );
    register_nav_menu( 'guru-menu-footer', 'Menu en Homepage' );
}

add_action( 'admin_menu', 'guru_add_theme_options' );
function guru_add_theme_options() {
                add_theme_page( 'Options  du Thème', 'Options', 'manage_options', 'guru_theme_options','guru_theme_options' );
            }
            
function guru_theme_options() {
    if ( !current_user_can( 'manage_options' ) )  {
            wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    wp_enqueue_media();
    ?>
<h2>Options du Thème</h2>
<?php
    
    $options = array(
        "Général" => array(
            "Email" => array('gurutheme_email'),
            "Adresse" => array('gurutheme_address', 'textarea'),
            "Contact" => array('gurutheme_contact', 'textarea'),
            "Crédits" => array('gurutheme_credits', 'textarea'),
        ),
        "Personnalisation" => array (
            "Background Homepage" => array('gurutheme_home_background', 'media'),
        ),
        "Social Network" => array(
            "Twitter" => array('gurutheme_twitter'),
            "LinkedIn" => array('gurutheme_linkedin'),
            "FaceBook" => array('gurutheme_facebook'),
            "Vimeo" => array('gurutheme_vimeo'),
        ),
        "Google" => array(
            "Google API Key" => array('gurutheme_google_apikey'),
            "Google Analytics" => array('gurutheme_google_analytics'),
        ),
    );
    
    foreach($options as $option => $fields) {
        
        $hidden = md5($option);
        $save = false;
        if(isset( $_POST['gurutheme_nonce_'. $hidden])) {
            if ( ! wp_verify_nonce( $_POST['gurutheme_nonce_'. $hidden], 'gurutheme_options_' . $hidden) ) {
                    wp_die( __( 'Nonce Error.' ) );
                return;
            } // end if
            $save = true;
        }
        ?>
<h3 style="border-bottom: 1px solid #ccc;"><?php echo $option; ?></h3>
<form method="post" name="form_<?php echo $hidden; ?>">
<input type="hidden" name="<?php echo 'nonce'; ?>" value="Y" />
<input type="hidden" name="form_submit" value="<?php echo $hidden; ?>" />
<table>
<?php
foreach($fields as $name => $field) {
    
    $option_value = get_option($field[0]);
    
    if($save) {
        $option_value = stripslashes($_POST[$field[0]]);
        update_option($field[0], $option_value);
    }
    
    ?>
    <tr>
<td style="width:210px;text-align: right;"><p><b><?php echo $name ?></b></p></td>
<td><p>
    <?php
    $input_type = isset($field[1])?$field[1]:'input';
    switch ($input_type) {
        case 'tinymce':
            wp_editor($option_value, $field[0]);
            break;
        case 'textarea':
?>
    <textarea name="<?php echo $field[0] ?>" cols="50" rows="10"><?php echo $option_value ?></textarea>
    <?php

            break;
        case 'media':
            ?>
    <input type="text" name="<?php echo $field[0] ?>" size="120" value="<?php echo esc_attr($option_value) ?>" />
    <button class='guru-upload'>Choisir une image</button>
<?php
            break;

        default:
        case 'input':
            ?>
    <input type="text" name="<?php echo $field[0] ?>" size="60" value="<?php echo esc_attr($option_value) ?>" />
<?php
            break;
    }
    ?>
</p></td>
</tr>
   <?php
}
?>
</table>
<?php
if($save) {
?>
<div class="updated"><p><strong>Mise à jour terminée.</strong></p></div>
<?php
}
?>

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?> - <?php echo $option; ?>" />
</p>
<?php
wp_nonce_field( 'gurutheme_options_' . $hidden, 'gurutheme_nonce_'. $hidden );
?>
</form>


        <?php
        //print_r($fields);
        
    }
    
    return;
}

/*
class CustomPage {
    function __construct() {
        add_action( 'add_meta_boxes', array( $this, 'add_notice_metabox' ) );
        add_action( 'save_post', array( $this, 'save' ) );

    }
    
    function save($post_id) {
        
            // save the code
            $post_meta = isset( $_POST['page_more_short'] ) ? $_POST['page_more_short'] : '';
            // If the value for the post message exists, delete it first. Don't want to write extra rows into the table.
            if ( 0 == count( get_post_meta( $post_id,  'page_more_short') ) ) {                      
                delete_post_meta( $post_id,  'page_more_short');
            } // end if
            update_post_meta( $post_id, 'page_more_short', $post_meta);
           
    }
    
         function add_notice_metabox() {
                
                add_meta_box(
                     'page_more_id',
                    "Informations supplémentaires",
                    array( $this, 'meta_display' ),
                    'page',
                    'normal',
                    'high'
                );
            } // end add_notice_metabox

           function meta_display( $post ) {

            wp_nonce_field( plugin_basename( __FILE__ ), $this->post_type . '_nonce' );
            $this_more =  get_post_meta( $post->ID,  'page_more_short', true  );
    
    ?>
    <table>
        <tr>
            <td style="width: 150px;">Résumé de la page</td>
            <td><textarea name="<?php echo  'page_more_short' ?>" cols="40" rows="10"><?php echo $this_more ?></textarea></td>
        </tr>
    </table>
    <?php
    
                } // end meta_display   
                
}
*/
// Filter to hide protected posts
function exclude_protected($where) {
	global $wpdb;
	return $where .= " AND {$wpdb->posts}.post_password = '' ";
}

// Decide where to display them
function exclude_protected_action($query) {
	if( !is_single() && !is_page() && !is_admin() ) {
		add_filter( 'posts_where', 'exclude_protected' );
	}
}

// Action to queue the filter at the right time
add_action('pre_get_posts', 'exclude_protected_action');
function my_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post">
    <label for="' . $label . '">' . __( "Password:" ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" /><input type="submit" name="Submit" value="' . esc_attr__( "Submit" ) . '" />
    </form>
    ';
    return $o;
}
add_filter( 'the_password_form', 'my_password_form' );

if(!is_admin()) {
    
//add_filter('oembed_result', 'guru_flexvideo');
add_filter('embed_oembed_html', 'guru_flexvideo');
//add_filter('oembed_result', 'guru_flexvideo');
function guru_flexvideo($html) {
    return '<div class="container-video"><div class="flex-video">' . $html . '</div></div>';
}
    /*
function filter_guru_quote($str) {
    
    $str = str_replace("«", "«<span class='helvita'>", $str);
    $str = str_replace("“", "«<span class='helvita'>", $str);
    $str = str_replace("&lquot;", "&lquot;<span class='helvita'>", $str);
    $str = str_replace("&rquot;", "</span>&rquot;", $str);
    $str = str_replace("»", "</span>»", $str);
    $str = str_replace("�?", "</span>»", $str);
    
    return $str;
}
add_filter( 'the_title' , 'guru_quote');
add_filter( 'the_content' , 'guru_quote');
function guru_quote($str, $id) {
    return filter_guru_quote($str);
}
     * 
     */
}
/*
function guru_widgets_init() {
	require get_stylesheet_directory() . '/inc/widgets.php';
	register_widget( 'Guru_Widget_Posts' );

	register_sidebar( array(
		'name'          => __( 'Footer Sidebar', '' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Main sidebar that appears on footer.', '' ),
		'before_widget' => '<aside id="%1$s" class="widget col-md-3 col-sm-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'guru_widgets_init' );
*/
add_action('rss2_item', function(){
  global $post;

  $output = '';
  $thumbnail_ID = get_post_thumbnail_id( $post->ID );
  $thumbnail = wp_get_attachment_image_src($thumbnail_ID, 'thumbnail');
  if($thumbnail) {
    $output .= '<thumbnail>';
    $output .= '<url>'. $thumbnail[0] .'</url>';
    $output .= '<width>'. $thumbnail[1] .'</width>';
    $output .= '<height>'. $thumbnail[2] .'</height>';
    $output .= '</thumbnail>';

  echo $output;
  }
});

function guru_excerpt_length( $length ) {
	return 24;
}
add_filter( 'excerpt_length', 'guru_excerpt_length', 999 );
function guru_excerpt_more( $more ) {
	return ' [...]<p class="read-more"><a href="'. get_permalink( get_the_ID() ) . '">Lire l\'article</a></p>';
}
add_filter( 'excerpt_more', 'guru_excerpt_more' );
/*
function guru_rss_post_thumbnail($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<div>' . get_the_post_thumbnail($post->ID) .
		'</div>' . get_the_excerpt();
	}
	return $content;
}
add_filter('the_excerpt_rss', 'guru_rss_post_thumbnail');
add_filter('the_content_feed', 'guru_rss_post_thumbnail');
 * 
 */

/*
 * OVERRIDE from functions.php theme parent
 */

function twentyfourteen_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation" role="navigation">
		<!--<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'twentyfourteen' ); ?></h1>-->
		<div class="nav-links">
                                    	<?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'twentyfourteen' ) );
			else :
				previous_post_link( '%link', __( '%title', 'twentyfourteen' ) );
                        ?><br /><?php
				next_post_link( '%link', __( '%title', 'twentyfourteen' ) );
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
function guru_array_split($array, $pieces=2)
{
// Less then 2 pieces?
if ($pieces < 2)
{
return array($array);
}
 
$newCount = ceil(count($array)/$pieces);
 
$a = array_slice($array, 0, $newCount);
 
$b = $this->array_split(array_slice($array, $newCount), $pieces-1);
 
return array_merge(array($a),$b);
}

abstract class GuruThemeFactory
{
    private static $reg = array();

    public static function init()
    {
        //add_action('plugins_loaded', array(static::instance(), '_setup'));
        add_action('init', array(static::instance(), '_setup'));
    }

    public static function instance()
    {
        $cls = get_called_class();
        !isset(self::$reg[$cls]) && self::$reg[$cls] = new $cls;
        return self::$reg[$cls];
    }

    abstract public function _setup();
}

class GuruThemeContact extends GuruThemeFactory {

    public function _setup() {
        
        if(isset($_POST['guru_contact'])) {
            $json = array();
            $errors = array();
            
            $message = '';
            if ( ! wp_verify_nonce( $_POST['_wp_contact'], 'contact') ) {
                    //$this->json['error'] = true;
                    $errors[] = "What ? Un problème est apparu pendant l'envoi. Merci de recharger la page"
                            . " ou nous contacter par email";
                    //return;
            }
            else {
                switch($_POST['guru_contact']) {
                    default:
                         $errors[] = '???';
                       break;
                    case 'plus':
                        if( empty($_POST['what']) or empty($_POST['who']) or empty($_POST['where']) or empty($_POST['email']) or empty($_POST['concept'])) {
                        $errors[] = 'Tous les champs sont obligatoires.';
                    }
                    elseif(! is_email($_POST['email']) ) {
                        $errors[] = "L'adresse <b>" . $_POST['email'] . "</b> n'est pas une adresse valide.";
                    }
                    else {
                        $message .= '<h2>'. get_bloginfo('name') . '</h2>';
                        $message .= "<h3>Nom et forme juridique</h3>";
                        $message .= stripslashes($_POST['company']);
                        $message .= "<h3>Adresse</h3>";
                        $message .= stripslashes($_POST['address']);
                        $message .= "<h3>N° Téléphone</h3>";
                        $message .= stripslashes($_POST['phone']);
                        $message .= "<h3>Email</h3>";
                        $message .= stripslashes($_POST['email']);
                        $message .= "<h3>Site Internet</h3>";
                        $message .= stripslashes($_POST['website']);
                        $message .= "<h3>Nombre de salariés</h3>";
                        $message .= stripslashes($_POST['workers']);
                        $message .= "<h3>Dirigeant - Nom et prénom</h3>";
                        $message .= stripslashes($_POST['lastname']);
                        
                        $message .= "<h3>Avez-vous déjà un concept ?</h3>";
                        $message .= stripslashes($_POST['concept']);
                        $message .= "<h3>Quelle est l’histoire / l’élément fondateur à l’origine du concept ?</h3>";
                        $message .= stripslashes($_POST['history']);
                        $message .= "<h3>Où en êtes-vous dans votre projet ?</h3>";
                        $message .= stripslashes($_POST['where']);
                        $message .= "<h3>Quels sont vos références de concepts/ restos/ bars ?</h3>";
                        $message .= stripslashes($_POST['who']);
                        $message .= "<h3>Qu’attendez-vous de notre collaboration ?</h3>";
                        $message .= stripslashes($_POST['what']);

                        $mails = get_option('gurutheme_email');
                        wp_mail($mails, 'Contact', $message);
                        /*
                        foreach( explode(',', $mails) as $mail) {
                            $email = trim($mail);
                            if(is_email($email)) {
                                 wp_mail($email, 'Contact', $message);
                            }
                        }*/
                            $json['success'] = '<p class="alert alert-success">Votre message a bien été envoyé.</p>';
                            $_POST = array();

                    } // endif

                        break;
                    case 'contact':
                        if( empty($_POST['lastname']) or empty($_POST['email']) or empty($_POST['message']) or empty($_POST['phone'])) {
                            $errors[] = 'Tous les champs sont obligatoires.';
                        }
                        elseif(! is_email($_POST['email']) ) {
                            $errors[] = "L'adresse <b>" . $_POST['email'] . "</b> n'est pas une adresse valide.";
                        }
                        else {
                            $message .= '<h2>'. get_bloginfo('name') . '</h2>';
                            $message .= "<h3>Nom et prénom</h3>";
                            $message .= stripslashes($_POST['lastname']);
                            $message .= "<h3>N° Téléphone</h3>";
                            $message .= stripslashes($_POST['phone']);
                            $message .= "<h3>Email</h3>";
                            $message .= stripslashes($_POST['email']);
                            $message .= "<h3>Message</h3>";
                            $message .= stripslashes($_POST['message']);

                        } // endif
                        break;
                    case 'bad':
                        if( empty($_POST['concept']) or empty($_POST['email']) or empty($_POST['lastname'])) {
                            $errors[] = 'Tous les champs sont obligatoires.';
                        }
                        elseif(! is_email($_POST['email']) ) {
                            $errors[] = "L'adresse <b>" . $_POST['email'] . "</b> n'est pas une adresse valide.";
                        }
                        else {
                            $message .= '<h2>'. get_bloginfo('name') . '</h2>';
                            $message .= "<h3>Nom et prénom</h3>";
                            $message .= stripslashes($_POST['lastname']);
                            $message .= "<h3>N° Téléphone</h3>";
                            $message .= stripslashes($_POST['phone']);
                            $message .= "<h3>Email</h3>";
                            $message .= stripslashes($_POST['email']);
                            $message .= "<h3>Concept</h3>";
                            $message .= stripslashes($_POST['concept']);

                        } // endif
                        break;
                }
                
                if(count($errors)) {
                        $json['error'] = true;
                        $json['errors'] = '<div class="info info-error">' . implode("\n", $errors) . '</div>';

                }
                else {

                    $mails = get_option('gurutheme_email');
                    wp_mail($mails, 'Contact', $message);
                    /*
                    foreach( explode(',', $mails) as $mail) {
                        $email = trim($mail);
                        if(is_email($email)) {
                             wp_mail($email, 'Contact', $message);
                        }
                    }*/
                    $json['success'] = '<p class="info info-success">Votre message a bien été envoyé.</p>';
                    $_POST = array();
                }
                echo json_encode($json);
                die();
            }
        }
        
        return;
        if(isset($_POST['guru_contact'])) {

            $json = array();
                $errors = array();
                if ( ! wp_verify_nonce( $_POST['_wp_contact'], 'contact') ) {
                    $errors[] = "What ? Un problème est apparu pendant l'envoi. Merci de recharger la page"
                            . " ou nous contacter par email";
                    //return;
                }
                else {
                    //if( empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['email']) or empty($_POST['message'])) {
                    if( empty($_POST['lastname']) or empty($_POST['email']) or empty($_POST['message']) or empty($_POST['phone'])) {
                        $errors[] = 'Tous les champs sont obligatoires.';
                    }
                    elseif(! is_email($_POST['email']) ) {
                        $errors[] = "L'adresse <b>" . $_POST['email'] . "</b> n'est pas une adresse valide.";
                    }
                    else {
                        $message = '<h2>'. get_bloginfo('name') . '</h2>';
                        $message .= "<h3>Nom et prénom</h3>";
                        $message .= stripslashes($_POST['lastname']);
                        $message .= "<h3>N° Téléphone</h3>";
                        $message .= stripslashes($_POST['phone']);
                        $message .= "<h3>Email</h3>";
                        $message .= stripslashes($_POST['email']);
                        $message .= "<h3>Message</h3>";
                        $message .= stripslashes($_POST['message']);

                        $mails = get_option('gurutheme_email');
                        wp_mail($mails, 'Contact', $message);
                        /*
                        foreach( explode(',', $mails) as $mail) {
                            $email = trim($mail);
                            if(is_email($email)) {
                                 wp_mail($email, 'Contact', $message);
                            }
                        }*/
                            $json['success'] = '<p class="info info-success">Votre message a bien été envoyé.</p>';
                            $_POST = array();

                    } // endif


                }
                
                    if(count($errors)) {
                        $json['error'] = true;
                        $json['errors'] = '<div class="info info-error">' . implode("\n", $errors) . '</div>';

                    }
                    else {

                    }
            echo json_encode($json);
            die();
        }
    }

}

class GuruThemeContactPlus extends GuruThemeFactory {

    public function _setup() {
        
        if(isset($_POST['guru_contact_plus'])) {

            $json = array();
                $errors = array();
                if ( ! wp_verify_nonce( $_POST['_wp_contact'], 'contact') ) {
                    $errors[] = "What ? Un problème est apparu pendant l'envoi. Merci de recharger la page"
                            . " ou nous contacter par email";
                    //return;
                }
                else {
                    //if( empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['email']) or empty($_POST['message'])) {
                    if( empty($_POST['what']) or empty($_POST['who']) or empty($_POST['where']) or empty($_POST['email']) or empty($_POST['concept'])) {
                        $errors[] = 'Tous les champs sont obligatoires.';
                    }
                    elseif(! is_email($_POST['email']) ) {
                        $errors[] = "L'adresse <b>" . $_POST['email'] . "</b> n'est pas une adresse valide.";
                    }
                    else {
                        $message = '<h2>'. get_bloginfo('name') . '</h2>';
                        $message .= "<h3>Nom et forme juridique</h3>";
                        $message .= stripslashes($_POST['company']);
                        $message .= "<h3>Adresse</h3>";
                        $message .= stripslashes($_POST['address']);
                        $message .= "<h3>N° Téléphone</h3>";
                        $message .= stripslashes($_POST['phone']);
                        $message .= "<h3>Email</h3>";
                        $message .= stripslashes($_POST['email']);
                        $message .= "<h3>Site Internet</h3>";
                        $message .= stripslashes($_POST['website']);
                        $message .= "<h3>Nombre de salariés</h3>";
                        $message .= stripslashes($_POST['workers']);
                        $message .= "<h3>Dirigeant - Nom et prénom</h3>";
                        $message .= stripslashes($_POST['lastname']);
                        
                        $message .= "<h3>Avez-vous déjà un concept ?</h3>";
                        $message .= stripslashes($_POST['concept']);
                        $message .= "<h3>Quelle est l’histoire / l’élément fondateur à l’origine du concept ?</h3>";
                        $message .= stripslashes($_POST['history']);
                        $message .= "<h3>Où en êtes-vous dans votre projet ?</h3>";
                        $message .= stripslashes($_POST['where']);
                        $message .= "<h3>Quels sont vos références de concepts/ restos/ bars ?</h3>";
                        $message .= stripslashes($_POST['who']);
                        $message .= "<h3>Qu’attendez-vous de notre collaboration ?</h3>";
                        $message .= stripslashes($_POST['what']);

                        $mails = get_option('gurutheme_email');
                        wp_mail($mails, 'Contact', $message);
                        /*
                        foreach( explode(',', $mails) as $mail) {
                            $email = trim($mail);
                            if(is_email($email)) {
                                 wp_mail($email, 'Contact', $message);
                            }
                        }*/
                            $json['success'] = '<p class="alert alert-success">Votre message a bien été envoyé.</p>';
                            $_POST = array();

                    } // endif


                }
                
                    if(count($errors)) {
                        $json['error'] = true;
                        $json['errors'] = '<div class="info info-error">' . implode("\n", $errors) . '</div>';

                    }
                    else {

                    }
            echo json_encode($json);
            die();
        }
    }

}

GuruThemeContact::init();
//GuruThemeContactPlus::init();
/*
add_action('init', 'my_guru_contact', 1);
function my_guru_contact() {
    
    
    if(isset($_POST['guru_contact'])) {

    $json = array();
        $errors = array();
        if ( ! wp_verify_nonce( $_POST['_wp_contact'], 'contact') ) {
            $errors[] = 'Who are you ?';
            //return;
        }
        else {
            //if( empty($_POST['nom']) or empty($_POST['prenom']) or empty($_POST['email']) or empty($_POST['message'])) {
            if( empty($_POST['lastname']) or empty($_POST['email']) or empty($_POST['message'])) {
                $errors[] = 'Tous les champs sont obligatoires.';
            }
            elseif(! is_email($_POST['email']) ) {
                $errors[] = "L'adresse <b>" . $_POST['email'] . "</b> n'est pas une adresse valide.";
            }
            else {
                $message = '<h2>'. get_bloginfo('name') . '</h2>';
                $message .= $_POST['lastname'] . ' ';
                $message .= $_POST['email'] . ' ';
                $message .= stripslashes($_POST['message']);

                $mails = get_option('gurutheme_email');
                foreach( explode(',', $mails) as $mail) {
                    $email = trim($mail);
                    if(is_email($email)) {
                         wp_mail($email, 'Contact', $message);
                    }
                }
                    $json['success'] = '<p class="alert alert-success">Votre message a bien été envoyé.</p>';
                    $_POST = array();
                //wp_mail(get_option('kf_email'), 'Contact', $message);

            } // endif


            if(count($errors)) {
                $json['error'] = true;
                $json['errors'] = implode('', $errors);

            }
            else {

            }
        }
    echo json_encode($json);
    die();
    }
    
}
*/
/*
 * Custom Back-Office
 */

function guru_login_headerurl($url) {
    return home_url();
}

function guru_login_headertitle($title) {
    return get_bloginfo('name');
}
function guru_admin_filters(){
    
add_filter( 'login_headerurl', 'guru_login_headerurl' , 11);
add_filter( 'login_headertitle', 'guru_login_headertitle' , 11);
/*    
$login_header_url = apply_filters( 'login_headerurl', $login_header_url );
$login_header_title = apply_filters( 'login_headertitle', $login_header_title );
*/
}
add_action( 'login_init', 'guru_admin_filters', 1 );


add_action('login_head', 'guru_style_login');
function guru_style_login() {
    echo '<style>
body.login {background-color:#f9f9f9;}
#login {padding:4em 0 0;}
.login h1 a {background-image : url('. get_stylesheet_directory_uri() .'/img/logo.png);
width:100%;
display:block;
background-position:center center;
height:80px;
background-size:contain;
}
</style>';
}

//add_filter('admin_footer_text',   'guru_admin_footer',99);
function guru_admin_footer() {
    return '<p>Created by 200%</p>';
}


add_filter('post_gallery', 'guru_gallery', 10, 2);
//add_shortcode('gallery', 'kf_gallery');
//add_shortcode('kf_gallery', 'kf_gallery');
function guru_gallery($output, $attr) {
    //return 'FF';
    
    //return 'ATTRS : ' .  implode(',', $attr);
    $post = get_post();
        // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
        if ( isset( $attr['orderby'] ) ) {
                $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
                if ( !$attr['orderby'] )
                        unset( $attr['orderby'] );
        }

        extract(shortcode_atts(array(
                'order'      => 'ASC',
                'orderby'    => 'menu_order ID',
                'id'         => $post->ID,
                'itemtag'    => 'div',
                'icontag'    => 'div',
                'captiontag' => 'div',
                'columns'    => 0,
                'size'       => 'thumbnail',
                'include'    => '',
                'exclude'    => '',
                'start'    => 0,
        ), $attr));

    
        $id = intval($id);
        if ( 'RAND' == $order )
                $orderby = 'none';

        if ( !empty($include) ) {
                $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

                $attachments = array();
                foreach ( $_attachments as $key => $val ) {
                        $attachments[$val->ID] = $_attachments[$key];
                }
        } elseif ( !empty($exclude) ) {
                $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        } else {
                $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
        }

        if ( empty($attachments) )
                return '';

        $output = '<div class="masonry clearfix">';
        $i = 0;
        switch($start) {
            default:
            case 1:
                $i = 0;
                break;
        }
        
        $cycle = 22;
        
        //$big = array(2,6,12,17,23,29,36);
        $big = array(3,6, 9, 12, 17, 20);
        //$big = array();
        foreach ( $attachments as $id => $attachment ) {
            
                $i++;
                //$size = in_array( ($i%$cycle), $big) ? 'team_large_c' : 'team_tiny_c' ;
                //$size = 'team_tiny_c' ;
            
                //$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
                $link = wp_get_attachment_image_src($id, 'guru_vertical');
                
                $output .= '<div class="item">
                    <img src="'. $link[0] .'" class="preload" width="'. $link[1] .'" height="'. $link[1] .'" />
                    </div>';
                
        }
        $output .= '</div>';
    return $output;
}

add_action( 'admin_head', 'guru_remove_gallery_settings' );
if( !function_exists( 'guru_remove_gallery_settings' ) ) {
    function guru_remove_gallery_settings() {
        echo '
            <style type="text/css">
                .gallery-settings {
                display:none;
                }
            </style>';
    }
}

if (function_exists( 'add_theme_support' )){
    add_filter('manage_posts_columns', 'guru_posts_columns', 5);
    add_action('manage_posts_custom_column', 'guru_posts_custom_columns', 5, 2);
    add_filter('manage_pages_columns', 'guru_posts_columns', 5);
    add_action('manage_pages_custom_column', 'guru_posts_custom_columns', 5, 2);
}
function guru_posts_columns($defaults){

    //$d = array_splice($defaults, 1, 0, array('wps_post_thumbs' => ''));
    //return array_splice($defaults, 1, 0, array('wps_post_thumbs' => ''));
    return array_merge($defaults, array('wps_post_thumbs' => ''));
}
function guru_posts_custom_columns($column_name, $id){
    //echo 'COLUMN ' . $column_name;  
    if($column_name === 'wps_post_thumbs'){
        echo the_post_thumbnail( array(125,80) );
    }
}

if(!function_exists('guru_pagination')):
function guru_pagination($pages = '', $range = 2, $current_query = '')
{
	$showitems = ($range * 2)+1;

	if( $current_query == '' ) {
		global $paged;
		if( empty( $paged ) ) $paged = 1;
	} else {
		$paged = $current_query->query_vars['paged'];
	}

	if( $pages == '' ) {
		if( $current_query == '' ) {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if(!$pages) {
				 $pages = 1;
			}
		} else {
			$pages = $current_query->max_num_pages;
		}
	}

	 if(1 != $pages)
	 {
	 	
            echo "<div id='pagination' class='clearfix'>"
             . "<div>"
             //. "<h3>Pages</h3>"
                     ;
             if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<span class='page-first'><a href='".get_pagenum_link(1)."'><<</a></span>";
             
             if($paged > 1) echo "<span class='page-prev'><a class='pagination-prev' href='".get_pagenum_link($paged - 1)."'>".__('<')."</a></span>";

             for ($i=1; $i <= $pages; $i++)
             {
                     if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                     {
                             echo ($paged == $i)? "<span class='current pagination-item'>".$i."</span>":"<span><a href='".get_pagenum_link($i)."' class='pagination-item inactive' >".$i."</a></span>";
                     }
             }

             if ($paged < $pages) echo "<span class='page-next'><a class='pagination-next' href='".get_pagenum_link($paged + 1)."'>".__('>')."</a></span>";
             
             if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<span class='page-last'><a href='".get_pagenum_link($pages)."'>>></a></span>";
             
             echo "</div>"
             . "</div>\n";
	 }
}
endif;


function guru_breadcrumb($post) {
    //print_r($post);

    $title = get_the_title($post);
        
    $output = '<p id="breadcrumb">';
    $output = '<a href="'. home_url() .'">' . get_bloginfo() . '</a> /';
    
    if($post->post_parent){
        $anc = array_reverse(get_post_ancestors( $post->ID ));
        
        foreach ( $anc as $ancestor ) {
            $output .= '<a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'" class="gajax">'.get_the_title($ancestor).'</a> / ';
        }
    }
    else {
        switch ($post->post_type) {
            case 'page':
                //$output .= '<a href="' . get_permalink($post) . '">' . $title . '</a>';
                break;
            case 'post':
                $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'tpl/guru_blog.php'
                ));
                if(isset($pages[0])) {
                    $output .= ' <a href="'. get_permalink($pages[0]) .'">'.get_the_title($pages[0]).' </a> / ';
                }
                break;
            case 'guru_works':
                $pages = get_pages(array(
                        'meta_key' => '_wp_page_template',
                        'meta_value' => 'tpl/guru_works.php'
                ));
                if(isset($pages[0])) {
                    $output .= ' <a href="'. get_permalink($pages[0]) .'">'.get_the_title($pages[0]).' </a> / ';
                }
                break;
            default:
                break;
        }
    }
    $output .= '<span class="current" title="'.$title.'"> '.$title.'</span></p>';
    
    echo $output;
}

require get_stylesheet_directory() . '/inc/custom.php';
require get_stylesheet_directory() . '/inc/shortcodes.php';
//new CustomPost();
