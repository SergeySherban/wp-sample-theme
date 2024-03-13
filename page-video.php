<?php
/**
 * Template Name: Page Video
 */
get_header();
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/header.php";
?>
<main>
    <section class="block-inner block-inner_page">
        <div class="container">
            <div class="breadcrumbs">
                <ul class="breadcrumbs__list">
                    <li class="breadcrumbs__item">
                        <a href="/" class="breadcrumbs__link">Home</a>
                    </li>
                    <li class="breadcrumbs__item">
                        <span class="breadcrumbs__link-current">Video</span>
                    </li>
                </ul>
            </div>
            <h2>Video</h2>
            <p>This section contains detailed guides on how you can mask your data, set up your database auditing and make your data and database secure.</p>
        </div>
    </section>
    <section class="video">
        <div class="contents">
            <div class="container">
                <div class="row">
                    <div class="contents__item" data-micromodal-trigger="modal-1" data-src="https://www.youtube-nocookie.com/embed/test?rel=0">
                        <div class="contents__image" style="background-image: url(/wp-content/themes/sample/img/placeholder.jpg)" href="#"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    [want_to_know]
    <div class="modal micromodal-slide video" aria-hidden="true" id="modal-1">
        <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
            <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
                <header class="modal__header">
                    <h2 class="modal__title" id="modal-1-title"></h2>
                    <button class="modal__close" aria-label="Close modal" data-micromodal-close=""></button>
                </header>
                <main class="modal__content" id="modal-1-content">
                    <div><iframe frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                </main>
            </div>
        </div>
    </div>
</main>
<?php
include_once ROOT_DIR_SITE . "/wp-content/themes/sample/footer.php";
get_footer();