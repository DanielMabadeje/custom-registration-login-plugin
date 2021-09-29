<?php


$logged_in = is_user_logged_in();

if ($logged_in) {

    echo "User is logged in.";
    // wp_redirect('/');
} else {

    echo "User isn't logged in.";
}



if ($_SERVER['REQUEST_METHOD'] == "POST" && wp_verify_nonce($_POST['rimplenet-user-login-form'], 'rimplenet-user-login-form')) {
    $data = $_POST;

    $results = add_action('after_setup_theme', array($this, 'customLogin'));
    // $results = $this->customLogin($data);

    if ($results) {
        echo "<script>alert('Login Successful')</script>";
    } else {
        echo "<script>alert('Login Unsuccessful')</script>";
?>
<?php
        return;
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title>Finapp</title>
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, wallet, banking, fintech mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="icon" type="image/png" href="<?php echo WP_PLUGIN_URL; ?>/finapp/includes/layouts/assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo WP_PLUGIN_URL; ?>/finapp/includes/layouts/assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body>

    <!-- loader -->
    <div id="loader">
        <img src="<?php echo WP_PLUGIN_URL; ?>/finapp/includes/layouts/assets/img/loading-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->





    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="#" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <h1>Log in</h1>
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mb-5 p-2">

            <form action="" method="post">
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="email1">E-mail</label>
                                <input type="email" class="form-control" id="email1" placeholder="Your e-mail" name="user_email">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>

                        <div class="form-group basic">
                            <div class="input-wrapper">
                                <label class="label" for="password1">Password</label>
                                <input type="password" class="form-control" id="password1" autocomplete="off" placeholder="Your password" name="user_pass">
                                <i class="clear-input">
                                    <ion-icon name="close-circle"></ion-icon>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-links mt-2">
                    <div>
                        <a href="app-register.html">Register Now</a>
                    </div>
                    <div><a href="app-forgot-password.html" class="text-muted">Forgot Password?</a></div>
                </div>

                <?php wp_nonce_field('rimplenet-user-login-form', 'rimplenet-user-login-form'); ?>
                <div class="form-button-group  transparent">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">Log in</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> <!-- Splide -->
    <script src="<?php echo WP_PLUGIN_URL; ?>/finapp/public/js/base.js"> </script>
</body>

</html>