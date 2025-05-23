<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Integra_Elements
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer-navigation">
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer-menu',
						'container'      => 'nav',
						'container_class'=> 'footer-nav',
						'depth'          => 1, // Typically footer menus are flat
						'fallback_cb'    => false,
					)
				);
			} else {
				// Fallback if no menu is assigned
				echo '<nav class="footer-nav">';
				echo '<ul><li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Assign a Menu to the Footer location', 'integra-elements' ) . '</a></li></ul>';
				echo '</nav>';
			}
			?>
		</div><!-- .footer-navigation -->
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'integra-elements' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'integra-elements' ), 'WordPress' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'integra-elements' ), 'integra-elements', '<a href="http://imco.design/chrisjavier">Chris Javier Oliveros, Jake Oliveros Chico</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
