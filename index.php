<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 *
 * @package WordPress_Starter_Theme
 */

get_header(); ?>

<div class="site-content">
    <div class="container">
        <main class="content-area">
            <?php
            if ( have_posts() ) :
                // Start the Loop
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <?php
                            if ( is_singular() ) :
                                the_title( '<h1 class="entry-title">', '</h1>' );
                            else :
                                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            endif;
                            ?>
                            <div class="entry-meta">
                                <span class="posted-on">
                                    Posted on <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time>
                                </span>
                                <span class="byline">
                                    by <span class="author vcard"><?php the_author(); ?></span>
                                </span>
                            </div>
                        </header>

                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail( 'large' ); ?>
                            </div>
                        <?php endif; ?>

                        <div class="entry-content">
                            <?php
                            if ( is_singular() ) :
                                the_content();
                            else :
                                the_excerpt();
                            endif;
                            ?>
                        </div>

                        <?php if ( ! is_singular() ) : ?>
                            <footer class="entry-footer">
                                <a href="<?php echo esc_url( get_permalink() ); ?>" class="read-more">
                                    Read More
                                </a>
                            </footer>
                        <?php endif; ?>
                    </article>
                    <?php
                endwhile;

                // Pagination
                the_posts_pagination( array(
                    'mid_size'  => 2,
                    'prev_text' => __( '&laquo; Previous', 'wordpress-starter-theme' ),
                    'next_text' => __( 'Next &raquo;', 'wordpress-starter-theme' ),
                ) );
            else :
                ?>
                <div class="no-posts">
                    <h2><?php esc_html_e( 'Nothing Found', 'wordpress-starter-theme' ); ?></h2>
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wordpress-starter-theme' ); ?></p>
                </div>
                <?php
            endif;
            ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
