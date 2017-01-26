<?php
/**
 * Template Name: Blog Page Template
 *
 * Description: WP-Forge loves the no-sidebar look as much as
 * you do. Use this page template to remove the sidebar from any page.
 *
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.1.7
 */

get_header(); ?>

	<div id="content" class="medium-12 large-12 columns" role="main">
    
    	<?php if ( function_exists('yoast_breadcrumb') ) { yoast_breadcrumb('<p class="breadcrumbs">','</p>'); } ?>
		
		<?php $query = new WP_query ( array( 'post_type' => 'post' ) );
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();		
	?>
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php wpforge_entry_meta_categories(); ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
			<h2 class="entry-title"><?php the_title(); ?></h2></a>
		</header>
			<div class="entry-meta-header">
				<?php  if( get_theme_mod( 'wpforge_meta_display','yes' ) == 'yes') { ?>
					<?php wpforge_entry_meta_header(); ?>
				<?php } // end if ?>
				<?php if ( comments_open() ) : ?>			
					<span class="genericon genericon-comment"></span> <?php comments_popup_link( '<span class="leave-reply">' . __( 'Comment', 'wp-forge' ) . '</span>', __( '1 Comment', 'wp-forge' ), __( '% Comments', 'wp-forge' ) ); ?>
	
				<?php endif; // comments_open() ?>
			</div><!-- end .entry-meta-header -->
		<div class="entry-content">
			<?php the_excerpt(); ?>
		</div><!-- .entry-content -->	
	</article><!-- #post -->	
	
			<?php } // end of the while loop. ?>
			<?php } // end of if. ?>

	</div><!-- #content -->

<?php get_footer(); ?>