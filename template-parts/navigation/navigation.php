<?php
/**
 * Template part for displaying the main navigation
 *
 * @package WP-Integra-Elements
 */
?>
<div class="nav-wrapper">
    <nav id="site-navigation" class="site-navigation">
        <div class="nav-container">
            <div class="nav-logo">
                <?php if ( has_custom_logo() ) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">
                        <?php bloginfo( 'name' ); ?>
                    </a>
                <?php endif; ?>
            </div>
            
            <button id="mobile-nav-toggle" class="mobile-nav-toggle" aria-controls="main-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'integra-elements' ); ?></span>
                <span class="menu-toggle-icon"></span>
            </button>
            
            <div class="nav-menu-wrapper">
                <?php
                if ( has_nav_menu( 'navigation' ) ) { // Changed 'main_menu' to 'navigation'
                    wp_nav_menu(
                        array(
                            'theme_location' => 'navigation', // Changed 'main_menu' to 'navigation'
                            'menu_id'        => 'main-menu',
                            'container'      => false,
                            'menu_class'     => 'main-menu',
                            'fallback_cb'    => false,
                        )
                    );
                } else {
                    // Fallback if no menu is assigned
                    echo '<ul class="main-menu">';
                    echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Assign a Menu to the Navigation location', 'integra-elements' ) . '</a></li>';
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </nav>
</div><!-- .nav-wrapper -->
