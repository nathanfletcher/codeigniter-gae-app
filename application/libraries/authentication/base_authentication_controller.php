<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Base_Authentication_Controller
{

    var $CI;
    var $is_logged_in;
    var $user;
    protected $user_type = "";
    protected $model = "";

    function __construct()
    {

        //Get CI
        $this->CI = &get_instance();

        //Init
        $this->_init();
    }

    function _init()
    {

        if (
            !$this->CI->session->userdata($this->user_type . '_name') ||
            !$this->CI->session->userdata($this->user_type . '_hash') ||
            !$this->CI->session->userdata($this->user_type . '_email')
        ) {
            $this->is_logged_in = false;
        } else {

            //Prepare Data to get user
            $where = array(
                "name" => $this->CI->session->userdata($this->user_type . '_name'),
                "email" => $this->CI->session->userdata($this->user_type . '_email'),
                "id" => hashIdDecrypt($this->CI->session->userdata($this->user_type . '_hash'))
            );

            $select = "name, email, id";

            $result = $this->CI->{$this->model}->get_logged_in_user($select, $where);

            if (count($result) == 1) {
                $this->user['name'] = $where['name'];
                $this->user['email'] = $where['email'];
                $this->user['hash'] = $this->CI->session->userdata($this->user_type . '_hash');
                $this->is_logged_in = true;
            } else {
                $this->is_logged_in = false;
            }
        }
    }

    function isLoggedIn()
    {

        return $this->is_logged_in;
    }

    function getUser()
    {

        return $this->user;
    }

    function logOut()
    {

        $this->is_logged_in = false;

        //Destroy User Session
        $this->CI->session->sess_destroy();
    }

    function logIn($user)
    {

        //Prepare data to be saved in the session.
        $data = array(
            $this->user_type . "_name" => $user['name'],
            $this->user_type . "_email" => $user['email'],
            $this->user_type . "_hash" => hashIdEncrypt($user['id'])
        );
        $this->CI->session->set_userdata($data);
        $this->is_logged_in = true;
    }
}