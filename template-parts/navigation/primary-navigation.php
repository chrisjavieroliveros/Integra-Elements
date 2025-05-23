<?php
/**
 * Template part for displaying the primary navigation
 *
 * @package WP-Integra-Elements
 */
?>
<div class="nav-wrapper">
    <nav id="primary-navigation" class="primary-navigation">
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
            
            <button id="mobile-nav-toggle" class="mobile-nav-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e( 'Menu', 'integra-elements' ); ?></span>
                <span class="menu-toggle-icon"></span>
            </button>
            
            <div class="nav-menu-wrapper">
                <?php
                if ( has_nav_menu( 'primary-navigation' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary-navigation',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'menu_class'     => 'primary-menu',
                            'fallback_cb'    => false,
                        )
                    );
                } else {
                    // Fallback if no menu is assigned
                    echo '<ul class="primary-menu">';
                    echo '<li><a href="' . esc_url( admin_url( 'nav-menus.php' ) ) . '">' . esc_html__( 'Assign a Menu', 'integra-elements' ) . '</a></li>';
                    echo '</ul>';
                }
                ?>
            </div>
        </div>
    </nav>
</div><!-- .nav-wrapper -->
