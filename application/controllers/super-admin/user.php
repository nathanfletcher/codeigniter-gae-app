<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {

    var $site = "super-admin";
    var $auth = "super_admin_auth";
    var $model = "super_admins_model";

    public function __construct() {

        parent::__construct();
    }

    public function index() {
        $this->login();
    }

    public function login() {

        if ( $this->request_method == "get" ) {

            //Show Login Form
            $this->loadView();

        } else if ( $this->request_method == "post" ) {

            //Process Login Form
            if ( $this->validateForm()) {

                //Prepare Data to get user
                $data = array(
                    "email" => $this->input->post('email'),
                    "password" => md5 ($this->input->post('password'))
                );
                $select = "id, name, email";

                //Get User
                $result = $this->{$this->model}->get($select, $data);

                //Check Result
                if ( count($result) == 1 ) {

                    //Store current user information in the session
                    $auth = $this->auth;
                    $this->$auth->logIn( $result[0] );

                    //Redirect to homepage
                    redirect('/' . $this->site);

                } else {

                    //Set other error
                    $data = array (
                        'custom_errors' => array(
                            'Invalid E-mail or Password.'
                        )
                    );

                    //User doesn't exists. Show Login Form with other_error
                    $this->loadView($data);
                }

            } else {

                //Form not validated. Show Login Form
                $this->loadView();
            }
        }
    }

    public function forgot_password() {

        if ( $this->request_method == "get" ) {

            //Show Forgot Password Form
            $this->loadView();

        } else if ( $this->request_method == "post" ) {

            //Process Login Form
            if ( $this->validateForm()) {

                //Prepare Data to get user
                $data = array(
                    "email" => $this->input->post('email')
                );

                $select = "id, name, email";

                //Get User
                $result = $this->{$this->model}->get($select, $data);

                //Check Result
                if ( count($result) == 1 ) {

                    //Get password reset token
                    $token = get_token();

                    //Update password token
                    $where = array("email" => $this->input->post('email'));
                    $data = array("token" => $token);
                    $this->{$this->model}->update($where, $data);

                    //Load mail controller
                    $this->load->library('mail_controller', '', 'mail');

                    //Send Forgot Password Link
                    $this->mail->super_admin_forgot_password_mail ( array(
                        "name" => $result[0]['name'],
                        "email" => $result[0]['email'],
                        "id" => hashIdEncrypt($result[0]['id']),
                        "token" => $token
                    ));

                    //Clear Field Data
                    $this->form_validation->clear_field_data();

                    $this->loadSuccessView();

                } else {

                    //Set Error
                    $data = array( "custom_errors" => array("E-mail doesn't exist.") );

                    $this->loadView($data);
                }

            } else {

                //Form not validated. Show Forgot Password Form
                $this->loadView();
            }
        }
    }

    public function forgot_password_success () {

        $this->loadView();
    }

    public function reset_password_failed () {

        $this->loadView();
    }

    public function reset_password_success () {

        $this->loadView();
    }


    public function reset_password($id = "", $token = "") {

        if($id == "" || $token == "") {
            $this->loadFailedView();
        }

        $id = rawurldecode( $id );

        $id = hashIdDecrypt($id);

        $data = array(
            "id" => $id,
            "token" => $token
        );

        $select = "id";

        $result = $this->{$this->model}->get($select, $data);

        //Check Result
        if ( count($result) == 1 ) {

            if ( $this->request_method == "get" ) {

                //Change Password
                $this->loadView();

            } else if ( $this->request_method == "post" ) {

                //Process Login Form
                if ( $this->validateForm() ) {

                    //Update Password
                    $where = array(
                        "id" => $id
                    );
                    $data = array(
                        "password" => md5 ($this->input->post('new-password')),
                        "token" => ""
                    );
                    $result = $this->{$this->model}->update($where, $data );

                    if ( $result ) {

                        $this->loadSuccessView();

                    } else {

                        //Set Error
                        $data = array( "custom_errors" => "Unable to update your password. Please try again after some time." );

                        //Show Change Password.
                        $this->loadView($data);
                    }

                } else {

                    $this->loadView();
                }
            }

        } else {

            $this->loadFailedView();
        }
    }

    public function logout() {

        $auth = $this->auth;
        $this->$auth->logOut();

        redirect('/' . $this->site);
    }
}