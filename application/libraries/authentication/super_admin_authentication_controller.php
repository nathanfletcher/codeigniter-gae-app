<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "libraries/authentication/base_authentication_controller.php");

class Super_Admin_Authentication_Controller extends Base_Authentication_Controller {

    protected $user_type = "super-admin";
    protected $model = "super_admins_model";

    function __construct() {
        parent::__construct();
    }
}