<?php
/**
* dkpdf-index.php
* This template is used to display the content in the PDF
*
* Do not edit this template directly,
* copy this template and paste in your theme inside a directory named dkpdf
*/
?>

<html>
    <head>
      	<link type="text/css" rel="stylesheet" href="<?php echo get_bloginfo( 'stylesheet_url' ); ?>" media="all" />
      	<?php
      		$wp_head = get_option( 'dkpdf_print_wp_head', '' );
      		if( $wp_head == 'on' ) {
      			wp_head();
      		}
      	?>
   	</head>

    <body style="text-align: center;">
	<?php
	if ( ! isset( $wp->query_vars['view-subscription'] ) || 'shop_subscription' != get_post_type( absint( $wp->query_vars['view-subscription'] ) ) || ! current_user_can( 'view_order', absint( $wp->query_vars['view-subscription'] ) ) ) {
		echo '<div class="woocommerce-error">' . esc_html__( 'Invalid Subscription.', 'woocommerce-subscriptions' ) . ' <a href="' . esc_url( wc_get_page_permalink( 'myaccount' ) ) . '" class="wc-forward">'. esc_html__( 'My Account', 'woocommerce-subscriptions' ) .'</a>' . '</div>';
		return;
	}

	$subscription = wcs_get_subscription( $wp->query_vars['view-subscription'] );

?>
<img style="margin-bottom: 20px;" src="https://popstop-freunde.club/wp-content/uploads/2017/01/popstop-freunde-emailheade-transp.png">

<h2>Deine Mitgliedschaftsbestätigung</h2>
<h3><?php $current_user = wp_get_current_user();echo esc_html( $current_user->display_name ); ?></h3>

<table style="border: solid 1px black; border-collapse: collapse; padding: 15px; margin-left:auto; margin-right:auto; margin-top: 20px;" class="shop_table subscription_details">
	<tr style="padding: 15px; background-color: rgb(241,241,241);">
		<td style="border: solid 1px black; padding: 15px; "><?php esc_html_e( 'Status', 'woocommerce-subscriptions' ); ?></td>
		<td style="border: solid 1px black; padding: 15px; "><?php echo esc_html( wcs_get_subscription_status_name( $subscription->get_status() ) ); ?></td>
	</tr>
	<tr>
		<td style="border: solid 1px black; padding: 15px;"><?php echo esc_html_x( 'Start Date', 'table heading',  'woocommerce-subscriptions' ); ?></td>
		<td style="border: solid 1px black; padding: 15px;"><?php echo esc_html( $subscription->get_date_to_display( 'date_created' ) ); ?></td>
	</tr>
	<?php foreach ( array(
		'last_order_date_created' => _x( 'Letzter Mitgliedsantrag', 'admin subscription table header', 'woocommerce-subscriptions' ),
		'next_payment'            => _x( 'Next Payment Date', 'admin subscription table header', 'woocommerce-subscriptions' ),
		'end'                     => _x( 'End Date', 'table heading', 'woocommerce-subscriptions' ),
		'trial_end'               => _x( 'Trial End Date', 'admin subscription table header', 'woocommerce-subscriptions' ),
		) as $date_type => $date_title ) : ?>
		<?php $date = $subscription->get_date( $date_type ); ?>
		<?php if ( ! empty( $date ) ) : ?>
			<tr>
				<td style="border: solid 1px black; padding: 15px;"><?php echo esc_html( $date_title ); ?></td>
				<td style="border: solid 1px black; padding: 15px;"><?php echo esc_html( $subscription->get_date_to_display( $date_type ) ); ?></td>
			</tr>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php do_action( 'woocommerce_subscription_before_actions', $subscription ); ?>
	<?php $actions = wcs_get_all_user_actions_for_subscription( $subscription, get_current_user_id() ); ?>
	<?php if ( ! empty( $actions ) ) : ?>
		<tr>
			<td><?php esc_html_e( 'Actions', 'woocommerce-subscriptions' ); ?></td>
			<td>
				<?php foreach ( $actions as $key => $action ) : ?>
					<a href="<?php echo esc_url( $action['url'] ); ?>" class="button <?php echo sanitize_html_class( $key ) ?>"><?php echo esc_html( $action['name'] ); ?></a>
				<?php endforeach; ?>
			</td>
		</tr>
	<?php endif; ?>
	<?php do_action( 'woocommerce_subscription_after_actions', $subscription ); ?>
</table>
<div style="text-align: center; margin-left:auto; margin-right:auto;">
	<?php wc_get_template( 'order/order-details-customer.php', array( 'order' => $subscription ) ); ?>
</div>	
  		</div>
		<h4>Diese Mitgliedschaftsbestätigung ist gültig ohne Unterschrift und kann an Veranstaltungen von Popstop.eu oder Förderverein popstop-freunde.club als Ausweis gezeigt werden.</h4>
		<h5>Bestätigung erstellt am: <?php echo date(get_option('date_format')); ?></h5>
		<h6>Förderverein popstop-freunde.club, 8132 Egg/Schweiz — Website: https://popstop-freunde.club — Email: info@popstop-freunde.club</h6>
    </body>

</html>
