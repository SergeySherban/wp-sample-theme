<?php
/**
 * sample functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sample
 */

// Disable the REST API
add_filter('rest_enabled', '__return_false');

// Disable REST API filters
remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status' );
remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status' );
remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );

// Disable REST API events
remove_action( 'init', 'rest_api_init' );
remove_action( 'rest_api_init', 'rest_api_default_filters', 10 );
remove_action( 'parse_request', 'rest_api_loaded' );

// Disable Embeds related to REST API
remove_action( 'rest_api_init', 'wp_oembed_register_route');
remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10 );

remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );

add_filter('rest_authentication_errors', 'code_disable_rest_api');

add_action('template_redirect', function() {
    if ( preg_match( '#^/wp-json/(.*)#', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( get_option( 'siteurl' ), 301 );
        die();
    }
});

add_action('template_redirect', function() {
    if ( preg_match( '#^/embed#', $_SERVER['REQUEST_URI'] ) ) {
        wp_redirect( get_option( 'siteurl' ), 301 );
        die();
    }
});

remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'rsd_link' );

function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Enqueue scripts and styles.
 */
add_action( 'wp', 'add_my_script_where_it_necessary' );
function add_my_script_where_it_necessary() {
    if (is_front_page() || is_page(['documentation', 'privacy-policy', 'video'])) {
        add_action( 'wp_enqueue_scripts', 'home_scripts' );
    }
    if (is_page_template('page-guides.php')) {
        add_action( 'wp_enqueue_scripts', 'guides_scripts' );
    }
    if (is_page('faq')) {
        add_action( 'wp_enqueue_scripts', 'faq_scripts' );
    }
    if (is_single()) {
        add_action( 'wp_enqueue_scripts', 'single_page_scripts' );
    }
}

function home_scripts() {
    wp_enqueue_script("main", get_template_directory_uri() . "/js/main.js", array(),  time(), true);
    wp_enqueue_script("modal", get_template_directory_uri() . "/js/modal.js", array(),  time(), true);
    wp_enqueue_script("vendor", get_template_directory_uri() . "/js/vendor.js", array(),  time(), true);
    wp_enqueue_script("download-docs", get_template_directory_uri() . "/js/download-docs.js", array(),  time(), true);
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css');
}

function guides_scripts() {
    wp_enqueue_script( "main", get_template_directory_uri() . "/js/main.js", array(),  time(), true);
    wp_enqueue_script( "guidesSearch", get_template_directory_uri() . "/js/guidesSearch.js", array(),  time(), true);
    wp_enqueue_script( "tabs", get_template_directory_uri() . "/js/tabs.js", array(),  time(), true);
    wp_enqueue_script( "vendor", get_template_directory_uri() . "/js/vendor.js", array(),  time(), true);
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css');
}

function faq_scripts() {
    wp_enqueue_script( "main", get_template_directory_uri() . "/js/main.js", array(),  time(), true);
    wp_enqueue_script( "tabs", get_template_directory_uri() . "/js/tabs.js", array(),  time(), true);
    wp_enqueue_script( "questions", get_template_directory_uri() . "/js/questions.js", array(),  time(), true);
    wp_enqueue_script( "faqSearch", get_template_directory_uri() . "/js/faqSearch.js", array(),  time(), true);
    wp_enqueue_script( "vendor", get_template_directory_uri() . "/js/vendor.js", array(),  time(), true);
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css');
}

function single_page_scripts() {
    wp_enqueue_script( "main", get_template_directory_uri() . "/js/main.js", array(),  time(), true);
    wp_enqueue_script( "helpful", get_template_directory_uri() . "/js/helpful.js", array(),  time(), true);
    wp_enqueue_script( "vendor", get_template_directory_uri() . "/js/vendor.js", array(),  time(), true);
    wp_enqueue_style('main', get_template_directory_uri() . '/styles/main.css');
}

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

function disable_feed() {
    header('Location: /404.php');
    exit;
}
add_action('do_feed', 'disable_feed', 1);
add_action('do_feed_rdf', 'disable_feed', 1);
add_action('do_feed_rss', 'disable_feed', 1);
add_action('do_feed_rss2', 'disable_feed', 1);
add_action('do_feed_atom', 'disable_feed', 1);
add_action('do_feed_rss2_comments', 'disable_feed', 1);
add_action('do_feed_atom_comments', 'disable_feed', 1);

remove_filter( 'the_content', 'wpautop' ); // Disable post autoformatting
remove_filter( 'the_excerpt', 'wpautop' ); // Disable autoformatting in announcement
remove_filter('comment_text', 'wpautop'); // Disable autoformatting in comments

add_action('admin_bar_init', function(){
    remove_action('wp_head', '_admin_bar_bump_cb'); // html margin bumps
});

add_filter('excerpt_more', function($more) {
    return '...';
});

function new_excerpt_length() {
    return 45;
}
add_filter('excerpt_length', 'new_excerpt_length');

function enter_to_site() {
    if (!is_user_logged_in() && !is_page( 'login') && !is_page('forgot-password') && !is_page('password-reset')) {
        wp_redirect( site_url( 'login' ) );
        exit();
    }
}
add_action( 'template_redirect', 'enter_to_site' );

// Show admin bar only Admins
if (!current_user_can( 'manage_options')) {
    show_admin_bar( false );
}

function restrict_admin() {
    if (!current_user_can( 'manage_options') && '/wp-admin/admin-ajax.php' != $_SERVER['PHP_SELF']) {
        wp_redirect( site_url() );
    }
}
add_action('admin_init', 'restrict_admin', 1);

function redirect_login_page() {
    $login_page  = home_url( '/login/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if( $page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit;
    }
}
add_action('init','redirect_login_page');

function login_failed() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . '?login=failed' );
    exit;
}
add_action( 'wp_login_failed', 'login_failed' );

function verify_username_password( $user, $username, $password ) {
    $login_page  = home_url( '/login/' );
    if( $username == "" || $password == "" ) {
        wp_redirect( $login_page . "?login=empty" );
        exit;
    }
}
add_filter( 'authenticate', 'verify_username_password', 1, 3);

function logout_page() {
    $login_page  = home_url( '/login/' );
    wp_redirect( $login_page . "?login=false" );
    exit;
}
add_action('wp_logout','logout_page');

function redirect_forgot_pass_page() {
    $forgot_password  = home_url( '/forgot-password/' );
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if( $page_viewed == "wp-login.php?action=lostpassword" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($forgot_password);
        exit;
    }
}
add_action('init','redirect_forgot_pass_page');

/**
 * Returns the message body for the password reset mail.
 * Called through the retrieve_password_message filter.
 *
 * @param string  $message    Default mail message.
 * @param string  $key        The activation key.
 * @param string  $user_login The username for the user.
 * @param WP_User $user_data  WP_User object.
 *
 * @return string   The mail message to send.
 */
function replace_retrieve_password_message($message, $key, $user_login, $user_data) {
    // Create new message
    $msg  = __( 'Hello!' ) . "\r\n\r\n";
    $msg .= __( 'You asked us to reset your password for your account using the email address.' ) . "\r\n\r\n";
    $msg .= __( "If this was a mistake, or you didn't ask for a password reset, just ignore this email and nothing will happen." ) . "\r\n\r\n";
    $msg .= __( 'To reset your password, visit the following address:' ) . "\r\n\r\n";
    $msg .= site_url( "/password-reset?action=rp&key=$key&login=" . rawurlencode( $user_login ) ) . "\r\n\r\n";
    $msg .= __( 'Thanks!', 'personalize-login' ) . "\r\n";
    return $msg;
}
add_filter( 'retrieve_password_message', 'replace_retrieve_password_message' , 10, 4 );

function do_password_lost()
{
    if ('POST' == $_SERVER['REQUEST_METHOD']) {
        $errors = retrieve_password();
        if (is_wp_error($errors)) {
            // Errors found
            $redirect_url = home_url('/forgot-password/');
            $redirect_url = add_query_arg('errors', join(',', $errors->get_error_codes()), $redirect_url);
        } else {
            // Email sent
            $redirect_url = home_url('/login/');
            $redirect_url = add_query_arg('checkemail', 'confirm', $redirect_url);
        }

        wp_redirect($redirect_url);
        exit;
    }
}
add_action('login_form_lostpassword',  'do_password_lost');

add_action('login_form_rp', 'redirect_to_custom_password_reset');
add_action('login_form_resetpass', 'redirect_to_custom_password_reset');

function redirect_to_custom_password_reset() {
    if ( 'GET' == $_SERVER['REQUEST_METHOD'] ) {
        // Verify key / login combo
        $user = check_password_reset_key( $_REQUEST['key'], $_REQUEST['login'] );
        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( '/login/?login=expiredkey' ) );
            } else {
                wp_redirect( home_url( '/login/?login=invalidkey' ) );
            }
            exit;
        }

        $redirect_url = home_url( '/password-reset/' );
        $redirect_url = add_query_arg( 'login', esc_attr( $_REQUEST['login'] ), $redirect_url );
        $redirect_url = add_query_arg( 'key', esc_attr( $_REQUEST['key'] ), $redirect_url );

        wp_redirect( $redirect_url );
        exit;
    }
}
add_action('login_form_rp', 'redirect_to_custom_password_reset');

function render_password_reset_form( $attributes, $content = null ) {
    $default_attributes = ['show_title' => false];
    $args = shortcode_atts( $default_attributes, $attributes );
    $WP_Error = new WP_Error();
    if ( is_user_logged_in() ) {
        return 'You are already signed in.';
    } else {
        if ( isset( $_REQUEST['login'] ) && isset( $_REQUEST['key'] ) ) {
            $args['login'] = $_REQUEST['login'];
            $args['key'] = $_REQUEST['key'];

            // Error messages
            $errors = [];
            if ( isset( $_REQUEST['error'] ) ) {
                $error_codes = explode( ',', $_REQUEST['error'] );
                foreach ( $error_codes as $code ) {
                    $errors[] = $WP_Error->get_error_message( $code );
                }
            }
            $args['errors'] = $errors;

            return get_template_part( 'page', 'password-reset', $args );
        } else {
            return 'Invalid password reset link.';
        }
    }
}
add_shortcode('custom-password-reset-form', 'render_password_reset_form');
do_shortcode( '[custom-password-reset-form]' );

/**
 * Resets the user's password if the password reset form was submitted.
 */
function do_password_reset() {
    if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {
        $rp_key = $_REQUEST['rp_key'];
        $rp_login = $_REQUEST['rp_login'];

        $user = check_password_reset_key( $rp_key, $rp_login );

        if ( ! $user || is_wp_error( $user ) ) {
            if ( $user && $user->get_error_code() === 'expired_key' ) {
                wp_redirect( home_url( '/forgot-password/?errors=expiredkey' ) );
            } else {
                wp_redirect( home_url( '/forgot-password/?errors=invalidkey' ) );
            }
            exit;
        }

        if ( isset( $_POST['pass1'] ) ) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                // Passwords don't match
                $redirect_url = home_url( '/password-reset/' );

                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'error', 'password_reset_mismatch', $redirect_url );

                wp_redirect( $redirect_url );
                exit;
            }

            if (empty($_POST['pass1'])) {
                // Password is empty
                $redirect_url = home_url( '/password-reset/' );

                $redirect_url = add_query_arg( 'key', $rp_key, $redirect_url );
                $redirect_url = add_query_arg( 'login', $rp_login, $redirect_url );
                $redirect_url = add_query_arg( 'error', 'password_reset_empty', $redirect_url );

                wp_redirect( $redirect_url );
                exit;
            }

            // Parameter checks OK, reset password
            reset_password( $user, $_POST['pass1'] );
            wp_redirect( home_url( '/login/?password=changed' ) );
        } else {
            echo "Invalid request.";
        }
        exit;
    }
}
add_action('login_form_rp', 'do_password_reset');
add_action('login_form_resetpass', 'do_password_reset');

function shortcode_want_to_know() {
    return '<div class="container">
                <div class="contact-us-promo">
                    <h2 class="invert">Want to Know More?</h2>
                    <p class="sub-heading invert">Our experts will be glad to answer your questions.</p>
                    <a href="https://support.sample.com/" class="btn btn-lg">Support Center</a>
                </div>
            </div>';
}
add_shortcode('want_to_know', 'shortcode_want_to_know');

add_filter( 'wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3 );
function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $blogname ) {
    $key = get_password_reset_key($user);
    $message  = sprintf( __( 'Email: %s' ), $user->user_email ) . "\r\n\r\n";
    $message .= __( 'To set your password, visit the following address:' ) . "\r\n\r\n";
    $message .= network_site_url( "/password-reset?action=rp&key=$key&login=" . rawurlencode( $user->user_login ), 'login' ) . "\r\n\r\n";
    $wp_new_user_notification_email['message'] = $message;
    return $wp_new_user_notification_email;
}