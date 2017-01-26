<?php
/**
 * The Header template of our theme.
 *
 * Displays all of the <head> section and everything up till <section class="content_wrap row" role="document">
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */
?><!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>   

	<?php get_template_part( 'content', 'nav' ); ?>
	
		<?php if ( is_front_page() ) {	?>

		<?php } else { ?>
			<div class="content_container">
				<section class="content_wrap row" role="document">
		<?php } ?>   