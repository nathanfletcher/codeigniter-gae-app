<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . "libraries/authentication/base_authentication_controller.php");

class User_Authentication_Controller extends Base_Authentication_Controller {

    protected $user_type = "user";
    protected $model = "users_model";

    function __construct() {
        parent::__construct();
	}
}