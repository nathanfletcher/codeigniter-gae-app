<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    var $request_method;

    public function __construct() {

        parent::__construct();

        //Init
        $this->_init();
    }

    private function _init() {

        //Load base user model
        $this->load->model('users/base_user_model', 'base_user_model');

        //Load different models and libraries based on current site
        $site = $this->uri->segment(1);

        switch($site) {
            case "super-admin" :
                $this->load->model('users/super_admins_model');
                $this->load->library('authentication/super_admin_authentication_controller', '', 'super_admin_auth');
                break;
            case "admin" :
                $this->load->model('users/admins_model');
                $this->load->library('authentication/admin_authentication_controller', '', 'admin_auth');
                break;
            default:
                $this->load->model('users/users_model');
                $this->load->library('authentication/user_authentication_controller', '', 'user_auth');
                break;
        }

        //Store current request method for later use
        $this->request_method = strtolower($_SERVER['REQUEST_METHOD']);
    }

    protected function getView() {

        $callers=debug_backtrace();
        $caller = $callers[2]['function'];
        $site = $this->uri->segment(1);
        $site = ($site != "super-admin" && $site != "admin") ? "main-site" : $site;
        return $site . "/" . strtolower(get_called_class()) . "/" . $caller;
    }

    protected function validateForm() {

        $callers=debug_backtrace();
        $caller = $callers[1]['function'];
        $site = $this->uri->segment(1);
        $site = ($site != "super-admin" && $site != "admin") ? "main-site" : $site;
        return $this->form_validation->run($site . "-" . strtolower(get_called_class()) . "-" . $caller);
    }

    protected function loadSuccessView() {
        redirect($this->getView() . "_success");
    }

    protected function loadFailedView() {
        redirect($this->getView() . "_failed");
    }

    protected function loadView($data = null) {
        $this->load->view($this->getView(), $data);
    }
}