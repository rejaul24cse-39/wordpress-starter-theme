<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package WordPress_Starter_Theme
 */
?>

    </div><!-- #content -->

    <footer class="site-footer">
        <div class="container">
            <div class="footer-content">
                <p class="site-info">
                    &copy; <?php echo esc_html( date_i18n( __( 'Y', 'wordpress-starter-theme' ) ) ); ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                    <span class="sep"> | </span>
                    <?php
                    /* translators: 1: Theme name */
                    printf( esc_html__( 'Theme: %1$s', 'wordpress-starter-theme' ), 'WordPress Starter Theme' );
                    ?>
                </p>
            </div>
        </div>
    </footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
