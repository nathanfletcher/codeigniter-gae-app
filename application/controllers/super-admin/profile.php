<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "libraries/authorization/super_admin_authorization_controller.php");

class Profile extends Super_Admin_Authorization_Controller
{

    var $site = "super-admin";
    var $page = "profile";
    var $auth = "super_admin_auth";
    var $model = "super_admins_model";

    public function __construct()
    {

        parent::__construct();
    }

    public function edit() {

        $user = $this->{$this->auth}->getUser();

        //Get ID for the user
        $user['id'] = hashIdDecrypt($user['hash']);

        if ( $this->request_method == "get" ) {

            //Prepare data to be passed to the view
            $data = array (
                "name" => $user['name'],
                "email" => $user['email'],
                "method" => "get"
            );

            $this->loadView($data);

        } else if ( $this->request_method == "post" ) {

            //Process Administrator - Edit Form
            if ( $this->validateForm()) {

                //Check if there is any change in email
                if ( $user['email'] != $this->input->post('email') ) {

                    //Email is changed, In this case we need to check whether the new email is unique or not.
                    $email_result = $this->super_admins_model->get(
                        "email",
                        array(
                            "email" => $this->input->post('email')
                        )
                    );

                    //Check for email result
                    if ( count($email_result) != 0 ) {

                        //Set other error
                        $data = array(
                            'custom_errors' => array(
                                'Given E-mail is already in use.'
                            )
                        );

                        //Show View
                        $this->loadView($data);

                        return;
                    }
                }

                //Prepare Edit Data
                $where = array(
                    "id" => $user['id']
                );
                $data = array(
                    "name" => $this->input->post('name'),
                    "email" => $this->input->post('email'),
                );

                //Update
                $result = $this->super_admins_model->update ( $where, $data );

                if ( $result ) {

                    //Update currently logged-in user
                    $this->super_admin_auth->logIn(array(
                        "name" => $this->input->post('name'),
                        "email" => $this->input->post('email'),
                        "id" => $user['id']
                    ));

                    $this->loadSuccessView();

                } else {

                    $data = array (
                        'custom_errors' => array(
                            'Unable to update administrator.'
                        )
                    );

                    //Show View
                    $this->loadView($data);
                }
            } else {

                //Form not validated. Show View
                $this->loadView();
            }
        }
    }

    public function change_password() {

        $user = $this->{$this->auth}->getUser();

        //Get ID for the user
        $user['id'] = hashIdDecrypt($user['hash']);

        if ( $this->request_method == "get" ) {

            $this->loadView();

        } else if ( $this->request_method == "post" ) {

            if ( $this->validateForm() ) {

                //Get password
                $result = $this->{$this->model}->get('password', array("id" => $user['id']));

                $user['password'] = $result[0]['password'];

                if($user['password'] != md5($this->input->post('current-password'))) {

                    //Set other error
                    $data = array(
                        'custom_errors' => array(
                            'Invalid Current Password.'
                        )
                    );

                    //Show View
                    $this->loadView($data);

                    return;
                }

                //Prepare Edit Data
                $where = array(
                    "id" => $user['id']
                );
                $data = array(
                    "password" => md5($this->input->post('new-password'))
                );

                //Update
                $result = $this->super_admins_model->update ( $where, $data );

                if ( $result ) {

                    $this->loadSuccessView();

                } else {

                    $data = array (
                        'custom_errors' => array(
                            'Unable to update password.'
                        )
                    );

                    //Show View
                    $this->loadView($data);
                }
            } else {

                $this->loadView();
            }
        }
    }

    public function change_password_success() {

        $this->loadView();
    }

    public function edit_success() {

        $this->loadView();
    }

}