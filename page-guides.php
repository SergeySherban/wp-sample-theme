<?php
/**
 * Template Name: Page Guides
 */
get_header();
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/header.php";
?>
<main>
    <section class="block-inner block-inner_page block-inner_guides">
        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item">
                        <a class="breadcrumbs__link" href="/">Home</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__link-current">Guides</span>
                    </li>
                </ul>
            </div>
            <h2>Guides</h2>
            <p>This section contains detailed guides on how you can mask your data, set up your database auditing and make your data and database secure.</p>
        </div>
    </section>
    <section class="guides">
        <div class="container">
            <div class="row">
                <h3 class="guides__title">Use the guides to maximize the effectiveness of sample products</h3>
                <div class="guides__search">
                    <div class="search-block">
                        <form class="search-block__form">
                            <input class="search-block__input" placeholder="Search"/>
                            <button class="search-block__remove-btn" type="button">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#close"></use>
                                </svg>
                            </button>
                            <button class="search-block__btn" type="submit">
                                <svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                    <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#search-icon"></use>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab tab_search">
                <div class="col-left">
                    <div class="tab__list">
                        <?php
                        $terms = get_term_children( 1, 'category' );
                        foreach ($terms as $child) {
                            $term = get_term_by( 'id', $child, 'category' );
                        ?>
                        <div class="tab__item "><?php echo $term->name ?></div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-right">
                    <div class="tab__content-list">
                        <?php
                        $terms = get_term_children( 1, 'category' );
                        foreach ($terms as $child) {
                            $term = get_term_by( 'id', $child, 'category' );
                            $posts = get_posts([
                                'post_type'      => 'post',
                                'post_status'    => 'publish',
                                'order'          => 'DESC',
                                'category'       => $term->term_id,
                                'posts_per_page' => -1,
                            ]);
                            ?>
                            <div class="tab__content-item">
                                <?php
                                foreach( $posts as $post ) {
                                setup_postdata($post);
                                ?>
                                <div class="guide-preview hover-underline">
                                    <a class="guide-preview__link" href="<?php the_permalink(); ?>">
                                        <div class="guide-preview__inner">
                                            <h3><?php the_title(); ?></h3>
                                            <p><?php the_excerpt(); ?></p>
                                        </div>
                                    </a>
                                    <div class="guide-preview__under">
                                        <div class="guide-tags">
                                            <?php
                                            $tags = get_the_tags();
                                            foreach ($tags as $tag) {
                                            ?>
                                            <p class="guide-tag"><?php echo $tag->name ?></p>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <a class="text-link" href="<?php the_permalink(); ?>">Learn More</a>
                                    </div>
                                </div>
                                <?php
                                }
                                wp_reset_postdata();
                                ?>
                            </div>
                            <?php
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php echo do_shortcode('[want_to_know]') ?>
</main>
<?php
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/footer.php";
get_footer();
