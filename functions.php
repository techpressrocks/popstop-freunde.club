<?php
/**
 * @package    popstop-freunde.club
 * @version    1.0.0
 * @author     AFB
 * @copyright  Copyright (c) 2016, Andrew F. Burton
 * @link       https://github.com/techpressrocks/techpressrocks-theme
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */
/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'popstopfreunde_theme_setup' );

function popstopfreunde_theme_setup() {
	//Make Naoto translation ready
	load_child_theme_textdomain( 'popstopfreunde', get_stylesheet_directory() . '/languages' );
	//Enqueue styles and scripts
	add_action( 'wp_enqueue_scripts', 'popstopfreunde_enqueue_scripts' );
	add_action( 'wp_print_styles', 'popstopfreunde_load_fonts' );
	add_action('wp_head', 'popstopfreunde_add_favicon' );
}
function popstopfreunde_enqueue_scripts() {
	//Load stylesheet of parent theme - WP Forge
	wp_enqueue_style( 'parent-styles', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'style', get_bloginfo('stylesheet_directory').'/style.css', array(), filemtime( get_stylesheet_directory().'/style.css' ) );
	//Smooth Scrolling
	wp_enqueue_script( 'smooth-scrolling', get_stylesheet_directory_uri() . '/js/smooth-scrolling.js', array( 'jquery' ), '1', true );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
}
function popstopfreunde_add_favicon(){ ?>
    <!-- Custom Favicons -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri();?>/images/favicon-popstopfreunde.ico"/>
    <?php }

// Load Roboto - Google Fonts
function popstopfreunde_load_fonts() {
    wp_register_style('roboto', 'http://fonts.googleapis.com/css?family=Roboto+Condensed:300,700');
	wp_register_style('fjalla', 'https://fonts.googleapis.com/css?family=Fjalla+One');
    wp_enqueue_style( 'roboto');
	wp_enqueue_style( 'fjalla');
}
function popstopfreunde_follow_links() {
	$popstopfreunde_facebook = 'http://www.facebook.com/PopStopDasMusikradio';
	//$techpress_rss = site_url() . '/feed';
	$popstopfreunde_forum = 'http://www.popstop-forum.de';
	$popstopfreunde_youtube = 'https://www.youtube.com/channel/UCAgF_-EboDPjLhmj6T5PeEQ';
	$popstopfreunde_follow_links = '<a class="naoto-youtube" href="' . $popstopfreunde_youtube . '" target="_blank" title="Folge unserem YouTube-Kanal!"></a>';
	$popstopfreunde_follow_links .= '<a class="naoto-facebook" href="' . $popstopfreunde_facebook . '" target="_blank" title="Folge popstop.eu auf Facebook!"></a>';
	$popstopfreunde_follow_links .= '<a class="naoto-forum" href="' . $popstopfreunde_forum . '" target="_blank" title="Besuche das inoffizielle Popstop Fan Forum!"></a>'; 
	echo $popstopfreunde_follow_links;
}

function popstopfreunde_sharing_links_floating() {
	//global $post;
	$techpress_sharing_header = '<div class="naoto-sharing-floating">';
	$techpress_pinterest = '<a class="naoto-floating share naoto-pinterest-floating" href="http://pinterest.com/pin/create/button/?url=' . get_permalink() . '&media=' . the_post_thumbnail() . '&description=' . get_the_title() . '" target="_blank" title="' . __( 'Pin it', 'techpress') . '"><i class="fa fa-pinterest"></i></a>';
	
	$techpress_facebook = '<a class="naoto-floating share naoto-facebook-floating" href="http://www.facebook.com/sharer.php?u=' . get_permalink() . '" target="_blank" title="' . __( 'Share on Facebook!', 'techpress') . '"><i class="fa fa-facebook"></i></a>';
	
	$techpress_twitter = '<a class="naoto-floating share naoto-twitter-floating" href="http://twitter.com/share?url=' . get_permalink() . '&text=' . get_the_title() . '" target="_blank" title="' . __( 'Tweet this!', 'techpress') . '"><i class="fa fa-twitter"></i></a>';
	
	$techpress_tumblr = '<a class="naoto-floating share naoto-tumblr-floating" href="http://tumblr.com/widgets/share/tool?canonicalUrl=' . get_permalink() . '" data-title="' . get_the_title() . '" target="_blank" title="' . __( 'Share this page on Tumblr!', 'naoto') . '"><i class="fa fa-tumblr"></i></a>';
	
	$techpress_google = '<a class="naoto-floating share naoto-google-floating" href="https://plus.google.com/share?url=' . get_permalink() . '"onclick="javascript:window.open(this.href,\'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600\');return false; "title="' . __( 'Share on Google+!', 'naoto') . '"><i class="fa fa-google-plus"></i></a>';
	
	$techpress_reddit = '<a class="naoto-floating share naoto-reddit-floating" href="http://www.reddit.com/submit?url=' . get_permalink() . '&title=' . get_the_title() . '" target="_blank" title="' . __( 'Share this page on Reddit!', 'naoto') . '"><i class="fa fa-reddit"></i></a>';
	
	$techpress_stumbleupon = '<a class="naoto-floating share naoto-stumbleupon-floating" href="http://www.stumbleupon.com/submit?url=' . get_permalink() . '&title=' . get_the_title() . '" target="_blank" title="' . __( 'Share this page on Stumbleupon!', 'naoto') . '"><i class="fa fa-stumbleupon"></i></a>';
	
	$techpress_linkedin = '<a class="naoto-floating share naoto-linkedin-floating" href="http://www.linkedin.com/shareArticle?mini=true&' . get_permalink() . '&title=' . get_the_title() . '&source=' . site_url() . '" target="_blank" title="' . __( 'Share this page on LinkedIn!', 'naoto') . '"><i class="fa fa-linkedin"></i></a>';	
	
	$techpress_sharing_end = '</div>';
	$techpress_sharing = $techpress_sharing_header . $techpress_pinterest . $techpress_facebook . $techpress_twitter . $techpress_google . $techpress_tumblr . $techpress_reddit . $techpress_stumbleupon . $techpress_linkedin . $techpress_sharing_end;
	echo $techpress_sharing;
}	

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
       global $post;
	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
//Replaces the "private" post label with "Für Mitglieder:"
add_filter( 'private_title_format', 'myprefix_private_title_format' );
function myprefix_private_title_format( $format ) {
    return 'Für Mitglieder: %s';
}
/*******************************
 * Misc. WooCommerce Adjustments
 *
 *******************************/
//Remove default thumbnails on Shop & individual product page, also remove breadcrumbs
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

//Add to Cart on Homepage: Skip cart and go directly to checkout for 3 subscription packages ("Mitgliedschaften" 30, 50 and 100 Euro)
function my_custom_add_to_cart_redirect( $url ) {
	if ( ! isset( $_REQUEST['add-to-cart'] ) || ! is_numeric( $_REQUEST['add-to-cart'] ) ) {
		return $url;
	}
	$product_id = apply_filters( 'woocommerce_add_to_cart_product_id', absint( $_REQUEST['add-to-cart'] ) );
	// Only redirect the product IDs in the array to the checkout
	if ( in_array( $product_id, array( 155, 156, 157) ) ) {
		$url = WC()->cart->get_checkout_url();
	} else {
		$url = WC()->cart->get_cart_url();
	}
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'my_custom_add_to_cart_redirect' );
//Checkout Page: Custom Text for error string confirming to terms & conditions
add_filter( 'gettext', 'my_text_strings', 20, 3 );
function my_text_strings( $translated_text, $text, $domain ) {
	switch ( $translated_text ) {
		case 'Die Zustimmung zu unseren Allgemeinen Geschäftsbedingungen (AGB) ist erforderlich.' :
			$translated_text = 'Die Zustimmung zu un den Vereinsstatuten (Vereinssatzung) ist erforderlich. Danke.';
			break;
	}
	return $translated_text;
}
//Checkout Page: Unset unused fields
add_filter( 'woocommerce_checkout_fields' , 'popstopfreunde_unset_checkout_fields' );
  	function popstopfreunde_unset_checkout_fields( $fields ) {
	unset($fields['billing']['billing_company']);
	unset($fields['billing']['billing_address_2']);
	unset($fields['billing']['billing_state']);
	unset($fields['billing']['billing_phone']);
	unset($fields['order']['order_comments']);
	return $fields;
}
//Checkout Page: Add "empty cart" button with custom text - Initialisation
add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
  global $woocommerce;
	if ( isset( $_GET['empty-cart'] ) ) {
		$woocommerce->cart->empty_cart(); 
		wp_redirect( home_url() );
	}
}
//Checkout Page: Add "empty cart" button with custom text - Hook after cart contents
add_action('woocommerce_review_order_after_cart_contents', 'woo_empty_cart_button' );
function woo_empty_cart_button() {
	global $woocommerce;
	$cart_url = $woocommerce->cart->get_cart_url();
	?>
	<tr>
		<td colspan="6" class="actions">
		<?php if (empty($_GET)) { ?>
			<a class="button" href="<?php echo $woocommerce->cart->get_cart_url(); ?>?empty-cart">Mitgliedschaftsantrag Abbrechen</a>
		<?php } else { ?>
			<a class="button" href="<?php echo $woocommerce->cart->get_cart_url(); ?>?empty-cart">Mitgliedschaftsantrag Abbrechen</a>
		<?php } ?>
		</td>
	</tr>
	<?php
}
//Remove "Add to Cart" Message when item put in cart
add_filter( 'wc_add_to_cart_message', '__return_empty_string' );
//Replace 'customer' role (WooCommerce use by default) with your own one.
add_filter( 'woocommerce_new_customer_data', 'my_new_customer_data' );
function my_new_customer_data( $new_customer_data ) {
            $new_customer_data['role'] = 'Mitglied';
            return $new_customer_data;
}
//Titel "Order Received" Seite
function bk_title_order_received( $title, $id ) {
	if ( is_order_received_page() && get_the_ID() === $id ) {
		$title = "Danke für deinen Antrag um Mitgliedschaft!";
	}
	return $title;
}
add_filter( 'the_title', 'bk_title_order_received', 10, 2 );
//Create custom number input added to the membership selection (last column 50+)
add_filter( 'woocommerce_loop_add_to_cart_link', 'popstopfreunde_spendeninput_form', 10, 2 );
function popstopfreunde_spendeninput_form( $html, $product ) {
	if ( $product->id == 157 ) {
		$html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart popstopfreunde" method="post" enctype="multipart/form-data">';
		$html .= '<span class="popstopfreunde-spende"><label for="popstopfreunde_spende">Dein Beitrag mit Spende</label><input id="popstopfreunde_spende" name="popstopfreunde_spende" placeholder="Betrag eingeben" type="number" min="50" step="1" maxlength="10" value="" required></span>';
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}
//Save user input (donation and membership fee) as cart item data
function popstopfreunde_spendeninput_save( $cart_item_data, $product_id ) {
    if( isset( $_POST['popstopfreunde_spende'] )  ) {
        $cart_item_data[ "popstopfreunde_spende" ] = $_POST['popstopfreunde_spende'];     
    }
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'popstopfreunde_spendeninput_save', 98, 2 );
//Use cart item data (value "popstopfreunde_spende) and add it to the cart/checkout totals
function popstopfreunde_spendeninput_cart( $cart_object ) {  
    if( !WC()->session->__isset( "reload_checkout" )) {
        /* Gift wrap price */
		foreach ( $cart_object->cart_contents as $key => $value ) {
            if( isset( $value["popstopfreunde_spende"] ) ) {
                  $value['data']->set_price ($value["popstopfreunde_spende"]);
            }
        }   
    }   
}
add_action( 'woocommerce_before_calculate_totals', 'popstopfreunde_spendeninput_cart', 99 );
