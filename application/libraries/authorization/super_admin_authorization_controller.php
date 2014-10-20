<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "libraries/authorization/base_authorization_controller.php");

class Super_Admin_Authorization_Controller extends Base_Authorization_Controller {

    protected $site = "super-admin";
    protected $auth = "super_admin_auth";

    public function __construct() {
        parent::__construct();
    }
}