<?php
/**
 * The template for displaying the Top-Bar menu and its different positions.
 * @since WP-Forge 5.5.1.7
 * @version 6.2.3.1
 */
?>
<?php
if ( is_front_page() ) {
	
?>	
<div class="nav_container norm">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wp-forge' ); ?></a>

  <?php if( get_theme_mod( 'wpforge_nav_position' ) == 'sticky') { ?>
    <?php if( get_theme_mod( 'wpforge_mobile_display' ) == 'yes') { ?>
    <div class="nav_wrap row show-for-large">
    <?php } else { ?>
    <div class="nav_wrap row">
    <?php } // end if ?>
      <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr(get_theme_mod('wpforge_nav_text','Home')); ?></a></div>
      </div><!-- end title-bar -->
      <div class="contain-to-grid">    
        <div class="top-bar" id="main-menu">
		<span class="techpress-followsticky">
			<div class="followsticky-icons">
			<?php 
			if ( function_exists( 'popstopfreunde_follow_links' ) ) {
				popstopfreunde_follow_links();
			}	
			?>
			</div>
		</span>		
          <div class="top-bar-left">
		  
		  <a class="popstop-freunde-logo" href="<?php echo site_url(); ?>" title="popstop-freunde" rel="home">popstop</a><span>-freunde.club</span>
													 
 		  <?php
			wp_nav_menu( array(
				'menu' => 'Frontpage Menu',
				'container' => false,
				'depth' => 0,
				'items_wrap' => '<ul class="right">%3$s</ul>',
				'fallback_cb' => '', // workaround to show a message to set up a menu
				'walker' => new Topbar_Menu_Walker( array(
				'in_top_bar' => true,
				'item_type' => 'li',
				'menu_type' => 'menu'
			)),
	    ));
			?>
          </div><!-- second end top-bar -->
        </div><!-- end top-bar -->
      </div><!-- contain-to-grid sticky -->
    </div><!-- .row -->
  <?php } // end if ?>
</div><!-- end .nav_container -->  

<?php
} else {
	?>
<div class="nav_container norm nofp">
  <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wp-forge' ); ?></a>

  <?php if( get_theme_mod( 'wpforge_nav_position' ) == 'sticky') { ?>
    <?php if( get_theme_mod( 'wpforge_mobile_display' ) == 'yes') { ?>
    <div class="nav_wrap row show-for-large">
    <?php } else { ?>
    <div class="nav_wrap row">
    <?php } // end if ?>
      <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo esc_attr(get_theme_mod('wpforge_nav_text','Home')); ?></a></div>
      </div><!-- end title-bar -->
      <div class="contain-to-grid nofp">    
        <div class="top-bar nofp" id="main-menu">
		<span class="techpress-followsticky">
			<div class="followsticky-icons nofp">
			<?php 
			if ( function_exists( 'popstopfreunde_follow_links' ) ) {
				popstopfreunde_follow_links();
			}	
			?>
			</div>
		</span>		
          <div class="top-bar-left nofp">
		  
		  <a class="popstop-freunde-logo-nofp" href="<?php echo site_url(); ?>" title="popstop-freunde" rel="home">popstop</a><span>-freunde.club</span>
													 
			<?php 
			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => false,
				'depth' => 0,
				'items_wrap' => '<ul class="right">%3$s</ul>',
				'fallback_cb' => '', // workaround to show a message to set up a menu
				'walker' => new Topbar_Menu_Walker( array(
				'in_top_bar' => true,
				'item_type' => 'li',
				'menu_type' => 'menu'
				) ),
            ) );						
							
			?>
          </div><!-- second end top-bar -->
        </div><!-- end top-bar -->
      </div><!-- contain-to-grid sticky -->
    </div><!-- .row -->
  <?php } // end if ?>
</div><!-- end .nav_container --> 
<?php	
}	