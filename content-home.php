<?php
/**
 * The template used for displaying page content in front-page.php
 *
 * @package WordPress
 * @subpackage WP_Forge
 * @since WP-Forge 5.5.2.2
 */
?>
<div class="content_container">
	<section class="feuz-frontpage" role="document">
		<article>
			<section id="popstopfreunde-freundinwerden">
				<div class="content_wrap row">
					<div class="large-12 columns">
							<div class="entry-content">
								<div class="large-6 medium-6 small-12 columns">
									<h2>Werde</h2>
									<h2>FreundIn</h2>
									<h2>von popstop.eu —</h2>
									<h2>&nbsp;</h2>
									<h2>popstop-freunde.club</h2>
								</div>
								<div class="large-6 medium-6 small-12 columns">
									<div>
										<p>Werde Mitglied im Förderverein »popstop-freunde.club«! Deine Unterstützung sorgt dafür, dass <a href="http://popstop.eu" target="_blank">popstop.eu</a> sein Angebot ständig ausbauen kann. In Kürze werdet ihr als Popstop-Freunde auf ein Sendungsarchiv Zugang haben. Weitere Geschenke sind geplant.
										</p>
										<p>
										Der Mitgliedsbeitrag beträgt 50 € pro Jahr. Gerne kannst du uns unten auch mit einem höheren Betrag unterstützen. Alle Gelder werden direkt an <a href="http://popstop.eu" target="_blank">popstop.eu</a> überwiesen.
										</p>
										<p>
										Fördere das großartige Musikradio <a href="http://popstop.eu" target="_blank">popstop.eu</a>! Werde Mitglied von »popstop-freunde.club«! 
										</p>
									</div>
									<div class="popstopfreund-freundinwerden-cta">
										<a class="popstopfreunde-freundinwerden-button button" href="#popstopfreunde-anmeldung">FreundIn Werden!</a>
									</div>
								</div>
							</div>
					</div><!-- end .large-12 columns - popstopfreunde-freundinwerden -->
				</div><!-- end .content_wrap row - popstopfreunde-freundinwerden -->
			</section><!-- end section - popstopfreunde-freundinwerden -->		
			<section id="popstopfreunde-anmeldung">
				<div class="content_wrap row">
					<div class="large-12 columns">
						<div class="entry-content">
							<h3 class="feuz-section-title">FreundIn des Fördervereins popstop-freunde.club werden und popstop.eu unterstützen!</h3>
							<h4>Wähle dir die passende Mitgliedschaft unten aus. Danke!</h4>
							<div class="large-4 medium-12 small-12 columns ">
								<div class="woo-popstop-freunde-logo" href="<?php echo site_url(); ?>" title="popstop-freunde" rel="home">popstop</div>
									<span>-freunde.club</span><span class="popstop-freunde-abopreis">30 €</span>
									<?php echo do_shortcode('[product id="155"]'); ?>
							</div>
							<div class="large-4 medium-12 small-12 columns">
								<div class="woo-popstop-freunde-logo" href="<?php echo site_url(); ?>" title="popstop-freunde" rel="home">popstop</div>
								<span>-freunde.club</span><span class="popstop-freunde-abopreis">50 €</span>
									<?php echo do_shortcode('[product id="156"]'); ?>
							</div>
							<div class="large-4 medium-12 small-12 columns">
								<div class="woo-popstop-freunde-logo" href="<?php echo site_url(); ?>" title="popstop-freunde" rel="home">popstop</div>
								<span>-freunde.club</span><span class="popstop-freunde-abopreis">
									50 €+</span>
									<?php echo do_shortcode('[product id="157"]'); ?>
							</div>
						</div>
					</div>
				</div>	
				<div class="entry-content">
					<div class="content_wrap row">
						<div class="large-12 columns">
							<h5>Unsere Vereinssatzung (in der Schweiz heisst das »Statuten«) findest du unter <a href="<?php echo site_url() . '/statuten-vereinssatzung/'; ?>">Statuten - Vereinssatzung</a>.</h5>	
						</div>
					</div>	
				</div>	
			</section>		
			<section id="blog">
				<div class="content_wrap row">
				<h2 class="feuz-section-title">Neuigkeiten & Infos - Förderverein popstop-freunde.club</h2>
				<?php
				$query = new WP_query ( array( 'post_type' => 'post', 'in_category' => '1' ) );
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
						?>
						<a href="<?php the_permalink(); ?>" title="Learn more about ' <?php the_title(); ?>">
						<h3 class="feuz-book-title"><?php the_title(); ?></h3></a>
						<div class="entry-content">
							<?php the_excerpt(); ?>
							<?php //the_content(); ?>
							<?php //echo substr($content, 0, stripos($content, ' ', 200)); ?>
						</div>
					<?php
					}	
				}
				wp_reset_postdata();
				?>
				<a class="feuz-frontpage-readmore" href="<?php echo site_url() . '/blog'; ?>">Lies weitere Beiträge</a>
				</div><!-- end .content_wrap row - blog -->
			</section><!-- end section - blog -->				
			<section id="popstopfreunde-popstoplive">
				<div class="content_wrap row">
					<div class="large-12 columns">
						<h2 class="feuz-section-title">popstop.eu jetzt hören!</h2>
						<h4>Den »play« Knopf unten drücken und los gehts! Viel Vergnügen!</h4>
							<div class="entry-content">
							<?php echo do_shortcode('[radioforge id=1]'); ?>
							</div>
					</div>
				</div>
			</section><!-- end section - kontakt -->
			
			<section id="popstopfreunde-programm">
				<div class="content_wrap row">
					<div class="large-12 columns">
						<h2 class="feuz-section-title">popstop.eu - Das Programm von heute</h2>
							<div class="entry-content">
<?php // Get RSS Feed(s)
include_once( ABSPATH . WPINC . '/feed.php' );

// Get a SimplePie feed object from the specified feed source.
$rss = fetch_feed( 'http://popstop.eu/sendeplan.xml' );

if ( ! is_wp_error( $rss ) ) : // Checks that the object is created correctly

    // Figure out how many total items there are, but limit it to 5. 
    $maxitems = $rss->get_item_quantity( 30 ); 

    // Build an array of all the items, starting with element 0 (first element).
    $rss_items = $rss->get_items( 0, $maxitems );

endif;
?>

<ul>
    <?php if ( $maxitems == 0 ) : ?>
        <li><?php _e( 'No items', 'my-text-domain' ); ?></li>
    <?php else : ?>
        <?php // Loop through each feed item and display each item as a hyperlink. ?>
        <?php foreach ( $rss_items as $item ) : ?>
            <li>
                <a href="<?php echo esc_url( $item->get_permalink() ); ?>"
                    title="popstop.eu">
                    <?php echo esc_html ( $item->get_title() ); ?>
					<?php echo $item->get_description() ; ?>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>					
					
					</div>
				</div>
			</div>	
			</section><!-- end section - kontakt -->				
			
			<section id="popstopfreunde-kontakt">
				<div class="content_wrap row">
				<?php
				$query = new WP_query ('pagename=kontakt');
				if ( $query->have_posts() ) {
					while ( $query->have_posts() ) {
						$query->the_post();
					?>
					<h2 class="feuz-section-title">Kontakt</h2>
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
					<?php
					}	
				}
				wp_reset_postdata();
				?>
				</div>
			</section><!-- end section - kontakt -->			
		</article><!-- end article -->
	</section><!-- end .techpressrocks-frontpage -->
</div><!-- end .content_container -->