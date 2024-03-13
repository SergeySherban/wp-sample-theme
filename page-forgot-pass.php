<?php
/**
 * Template Name: Forgot password page
 */
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Forgot Password</title>
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
        <p class="forgot_pass">Enter your email address and we'll send you a link you can use to pick a new password</p>
        <form class="auth__form" id="lostpasswordform" action="<?php echo wp_lostpassword_url(); ?>" method="post">
            <label class="label" for="user_login">Email
                <input class="input" id="user_login" type="email" name="user_login" required>
            </label>
            <input type="submit" name="submit" class="btn-blue submit" value="Reset Password">
        </form>
        <?php
        $login  = (isset($_GET['errors']) ) ? $_GET['errors'] : 0;
        if ( $login === "invalid_email" ) {
            echo '<p class="login-msg">Invalid Email</p>';
        } elseif ($login === "retrieve_password_email_failure") {
            echo '<p class="login-msg">Retrieve password email failure</p>';
        } elseif ($login === "expiredkey") {
            echo '<p class="login-msg">Expired key</p>';
        } elseif ($login === "invalidkey") {
            echo '<p class="login-msg">Invalid key</p>';
        }
        ?>
    </div>
</section>
</body>
</html>
