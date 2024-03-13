<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package sample
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <title><?php echo get_the_title(); ?></title>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="robots" content="noindex"/>
    <meta name="description" content="sample Documents">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&amp;display=swap" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="header__inner">
        <div class="container">
            <div class="row">
                <div class="header__logo">
                    <a href="/">
                        <svg xmlns="http://www.w3.org/2000/svg" width="157" height="36" viewbox="0 0 157 36">
                            <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#logo-small"></use>
                        </svg>
                    </a>
                </div>
                <nav class="main-nav">
                    <button class="main-nav__toggle">
                        <span class="main-nav__toggle-icon"></span>
                    </button>
                    <div class="main-nav__inner">
                        <div class="main-nav__content">
                            <ul class="main-nav__list">
                                <li class="main-nav__item">
                                    <div class="main-nav__item-inner">
                                        <a class="main-nav__link" href="/guides/">Guides</a>
                                    </div>
                                </li>
                                <li class="main-nav__item">
                                    <div class="main-nav__item-inner">
                                        <a class="main-nav__link" href="/documentation/">Documentation</a>
                                    </div>
                                </li>
                                <li class="main-nav__item">
                                    <div class="main-nav__item-inner">
                                        <a class="main-nav__link" href="/faq/">FAQ</a>
                                    </div>
                                </li>
                                <li class="main-nav__item">
                                    <div class="main-nav__item-inner">
                                        <a class="main-nav__link" href="/video/">Video</a>
                                    </div>
                                </li>
                                <li class="main-nav__item has-sub">
                                    <div class="main-nav__item-inner">
                                        <span class="">Contact Us</span>
                                        <span class="main-nav__show-sub">
                                            <svg width="12" height="10" viewBox="0 0 12 10" xmlns="http://www.w3.org/2000/svg">
                                                <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#more-icon"></use>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="main-nav__sub-list">
                                        <div class="main-nav__sub-inner">
                                            <div class="main-nav__item">
                                                <a class="main-nav__link" href="https://www.sample.com/contact-us/">Contact Us</a>
                                            </div>
                                            <div class="main-nav__item">
                                                <a class="main-nav__link" href="https://support.sample.com/">sample Support Portal</a>
                                            </div>
                                            <div class="main-nav__item">
                                                <a class="main-nav__link" href="https://www.sample.com/">sample Homepage</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="social">
                                <div class="social__list">
                                    <a class="social__link" href="https://www.facebook.com/sample">
                                        <svg width="9" height="16" viewbox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#facebook-logo"></use>
                                        </svg>
                                    </a>
                                    <a class="social__link" href="https://www.linkedin.com/company/sample-inc">
                                        <svg width="17" height="16" viewbox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#linkedln"></use>
                                        </svg>
                                    </a>
                                    <a class="social__link" href="https://twitter.com/sample">
                                        <svg width="16" height="14" viewbox="0 0 16 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#twitter-logo"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="<?php echo wp_logout_url('/login'); ?>" class="btn btn-sm">Logout</a>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>

