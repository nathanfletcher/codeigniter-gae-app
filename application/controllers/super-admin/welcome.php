<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends MY_Controller {

    var $site = "super-admin";
    var $welcome_page = "welcome";

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        if (!$this->super_admin_auth->isLoggedIn()) {
            redirect( '/' . $this->site . '/user/login');
        } else {
            $this->loadView();
        }
    }
}