<?php
/**
 * The template for displaying all single posts and attachments
 *
 */
$post = $wp_query->post;

get_header();
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/header.php";
?>
<main class="without-overflow">
    <?php
    while ( have_posts() ) : the_post();
        ?>
        <section class="block-inner block-inner_page block-inner_guides-detail">
            <div class="container">
                <div class="breadcrumbs">
                    <ul class="breadcrumbs__list">
                        <li class="breadcrumbs__item">
                            <a class="breadcrumbs__link" href="/">Home</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a class="breadcrumbs__link" href="/guides/">Guides</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <span class="breadcrumbs__link-current"><?php echo the_title(); ?></span>
                        </li>
                    </ul>
                </div>
                <h2><?php echo the_title(); ?></h2>
            </div>
        </section>
        <section class="guide-detail">
            <div class="container">
                <div class="tab tab_search">
                    <div class="col-left">
                        <div class="tab__list sticky">
                            <?php
                            $posts = get_posts([
                                'post_type' => 'post',
                                'post_status' => 'publish',
                                'order' => 'DESC',
                                'category' => get_the_category()[1]->term_taxonomy_id,
                                'posts_per_page' => -1,
                            ]);
                            $current_id = get_the_ID();
                            foreach ($posts as $post) {
                                setup_postdata($post);
                                ?>
                                <a class="tab__item link <?php if ($current_id === get_the_ID()) echo 'tab__item_active'?>" href="<?php the_permalink(); ?>"><?php the_title();?></a>
                                <?php
                            }
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="col-right">
                        <div class="tab__content-list">
                            <div class="tab__content-item tab__content-item_active">
                                <div class="guide-detail__header">
                                    <h3><?php the_title(); ?></h3>
                                    <div class="guide-tags">
                                        <?php
                                        $tags = get_the_tags();
                                        foreach ($tags as $tag) {
                                            ?>
                                            <span class="guide-tag"><?php echo $tag->name ?></span>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="guide-detail__text">
                                    <?php the_content(); ?>
                                </div>
                                <div class="helpful">
                                    <div class="helpful__inner">
                                        <div class="state-block">
                                            <h3>Did this guide help you?</h3>
                                        </div>
                                        <button class="helpful__btn btn-yes"><span>Yes</span>
                                            <svg width="15" height="14" viewBox="0 0 15 14" xmlns="http://www.w3.org/2000/svg">
                                                <use href="<?php echo get_template_directory_uri() ?>/img/sprites/sprite.svg#thumb-up"></use>
                                            </svg>
                                        </button>
                                        <button class="helpful__btn btn-no"><span>No</span>
                                            <svg width="15" height="14" viewBox="0 0 15 14" xmlns="http://www.w3.org/2000/svg">
                                                <use href="<?php echo get_template_directory_uri() ?>/img/sprites/sprite.svg#thumb-down"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
        get_template_part( 'content', get_post_format() );
    endwhile;
    ?>
</main>
<?php
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/footer.php";
get_footer();