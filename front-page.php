<?php
/**
 * Template Name: Home page
 */
get_header();
while ( have_posts() ) {
    the_post();
    the_content();
}
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/footer.php";
get_footer();
