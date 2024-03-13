<?php
/**
 * Template Name: Reset password page
 */
/** @var array $args */
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
        <p class="forgot_pass">Enter your new password</p>
        <form class="auth__form" name="resetpassform" id="resetpassform" action="<?php echo site_url('wp-login.php?action=resetpass'); ?>" method="post" autocomplete="off">
            <input type="hidden" id="user_login" name="rp_login" value="<?php echo esc_attr( $args['login'] ); ?>" autocomplete="off">
            <input type="hidden" name="rp_key" value="<?php echo esc_attr( $args['key'] ); ?>">
            <label class="label" for="pass1">New password
                <input type="password" name="pass1" id="pass1" class="input" size="20" value="" autocomplete="off" required>
            </label>
            <label class="label" for="pass2">Repeat new password
                <input type="password" name="pass2" id="pass2" class="input" size="20" value="" autocomplete="off" required>
            </label>
            <input type="submit" name="submit" id="resetpass-button" class="btn-blue submit" value="Reset Password">
            <?php if ( count( $args['errors'] ) > 0 ) : ?>
                <?php foreach ( $args['errors'] as $error ) : ?>
                    <p class="login-msg">
                        <?php echo $error; ?>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>
        </form>
    </div>
</section>
</body>
</html>
