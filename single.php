<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress_Starter_Theme
 */

get_header(); ?>

<div class="site-content">
    <div class="container">
        <main class="content-area">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
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
                        the_content();

                        wp_link_pages(
                            array(
                                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'wordpress-starter-theme' ),
                                'after'  => '</div>',
                            )
                        );
                        ?>
                    </div>

                    <footer class="entry-footer">
                        <?php
                        $categories_list = get_the_category_list( esc_html__( ', ', 'wordpress-starter-theme' ) );
                        if ( $categories_list ) {
                            printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'wordpress-starter-theme' ) . '</span>', $categories_list );
                        }

                        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'wordpress-starter-theme' ) );
                        if ( $tags_list ) {
                            printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'wordpress-starter-theme' ) . '</span>', $tags_list );
                        }
                        ?>
                    </footer>
                </article>

                <?php
                // Post navigation
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'wordpress-starter-theme' ) . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'wordpress-starter-theme' ) . '</span> <span class="nav-title">%title</span>',
                    )
                );

                // Comments template
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile;
            ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
