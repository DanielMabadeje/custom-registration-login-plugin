<?php

class UserLogin
{

    public $postdata;
    public function __construct()
    {
        add_shortcode('finapp_user_login', array($this, 'showLoginForm'));
        add_action('after_setup_theme', 'showLoginForm');
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

        if ($user_data = $this->addUser()) {

            global $wpdb;


            return;
        } else {
            # code...
        }


        return;
    }

    public function loginUser($data = null)
    {
        // $user_id = email_exists($data['user_email']);
        // $user_id=username_exists($data['user_login'])
        // $user_id = false;
        if (is_null($data)) {
            $data = $this->postdata;
        }

        $user_id = email_exists($data['user_email']);
        if ($user_id) {

            global $wpdb;
            $credentials = wp_insert_user(array(
                'user_login' => $data['user_email'],
                'user_pass' => $data['password']
            ));
            //             $user_id = wp_create_user($data['user_login'], $data['password'], $data['user_email']);

            // wp_signon($credentials, '');

            $user = wp_signon($credentials, false);

            if (is_wp_error($user)) {
                echo $user->get_error_message();
            }

            wp_set_auth_cookie();

            do_action('wp_login',  $user_login, $user);
        }
    }




    public function sanitizePost()
    {
        $_POST['user_pass']   =   esc_attr($_POST['user_pass']);
        $_POST['user_email']   =   sanitize_email($_POST['user_email']);
    }
}
