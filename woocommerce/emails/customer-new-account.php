<?php
/**
 * Customer new account email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-new-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<p><?php printf( __( 'Danke, dass du ein Konto bei %s eingerichtet hast. Dein Benutzername ist <strong>%s</strong>', 'woocommerce' ), esc_html( $blogname ), esc_html( $user_login ) ); ?></p>

<?php if ( 'yes' === get_option( 'woocommerce_registration_generate_password' ) && $password_generated ) : ?>

	<p><?php printf( __( 'Dein Passwort für den Login wurde automatisch generiert: <strong>%s</strong>', 'woocommerce' ), esc_html( $user_pass ) ); ?></p>

<?php endif; ?>

	<p>Um deinen Mitgliedschaftsstatus anzusehen oder dein Passwort zu ändern, melde dich hier in deinem Benutzerkonto an:
	<a href="http://popstop-freunde.club/mein-konto/" style="color:#2199e8">Mein Konto</a>	
	</p>

<?php do_action( 'woocommerce_email_footer', $email );
