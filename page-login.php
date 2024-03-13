<?php
/**
 * Template Name: Login page
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>sample Log In</title>
    <meta name="theme-color" content="#fff">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&amp;display=swap" rel="stylesheet">
</head>
<body>
<section class="auth-page">
    <div class="auth">
        <div class="auth__logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="188" height="44" viewbox="0 0 188 44">
                <use href="<?php echo get_template_directory_uri(); ?>/img/sprites/sprite.svg#logo-small"></use>
            </svg>
        </div>
        <?php
        if (isset( $_REQUEST['checkemail'] ) && $_REQUEST['checkemail'] == 'confirm') {
            echo '<p class="login-info">Check your email for a link to reset your password.</p>';
        } elseif (isset( $_REQUEST['password'] ) && $_REQUEST['password'] == 'changed') {
            echo '<p class="login-info">Your password has been changed.<br>You can sign in now.</p>';
        }
        ?>
        <?php
        $args = [
            'redirect' => home_url(),
            'id_username' => 'login',
            'id_password' => 'password',
            'label_username' => 'Email',
            'label_password' => 'Password',
            'remember' => false
        ];
        wp_login_form($args);
        $login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
        if ($login === "failed") {
            echo '<p class="login-msg">Invalid Username or Password.</p>';
        } elseif ($login === "empty") {
            echo '<p class="login-msg">Username or Password is empty.</p>';
        } elseif ($login === "false") {
            echo '<p class="login-msg">You are logged out.</p>';
        } elseif ($login === "expiredkey") {
            echo '<p class="login-msg">Expired key.</p>';
        } elseif ($login === "invalidkey") {
            echo '<p class="login-msg">Invalid key.</p>';
        }
        ?>
        <div class="forgot_pass">
            <a href="/wp-login.php?action=lostpassword">Forgot your password?</a>
        </div>
    </div>
</section>
<script src="<?php echo get_template_directory_uri(); ?>/js/auth.js"></script>
</body>
</html>