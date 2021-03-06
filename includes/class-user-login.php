<?php
class UserLogin
{

    public $postdata;
    public function __construct()
    {
        add_shortcode('finapp-user-login', array($this, 'showLoginForm'));
        // add_action('after_setup_theme', array($this, 'showLoginForm'));

    }

    public function showLoginForm()
    {
        ob_start();
        include plugin_dir_path(__FILE__) . 'layouts/user-login.php';
        $output = ob_get_clean();
        return $output;
    }


    public function customLogin()
    {

        $this->sanitizePost();
        $this->postdata = $_POST;
        $email = $this->postdata['user_email'];

        // add_action('after_setup_theme', array($this, 'loginUser'));
        // Run before the headers and cookies are sent.
        // add_action('after_setup_theme', array($this, 'loginUser'));
        if ($user_data = $this->loginUser()) {

            global $wpdb;

            var_dump($user_data);
            return true;
        } else {
            return false;
        }
    }

    public function loginUser($data = null)
    {
        if (is_null($data)) {
            $data = $this->postdata;
        }
        var_dump($data);

        $user_id = email_exists($data['user_email']);
        if ($user_id) {
            global $wpdb;
            $credentials = array(
                'user_login' => $data['user_email'],
                'user_password' => $data['user_pass']
            );
            // wp_signon($credentials, '');

            // $cookie = wp_set_auth_cookie();
            $user = wp_signon($credentials, $cookie);

            if (is_wp_error($user)) {
                echo $user->get_error_message();
                return false;
            }

            // wp_set_auth_cookie($user->ID);
            // do_action('wp_login',  $user_login, $user);

            return true;
        }
    }
    public function sanitizePost()
    {
        $_POST['user_pass']   =   esc_attr($_POST['user_pass']);
        $_POST['user_email']   =   sanitize_email($_POST['user_email']);
    }
}
