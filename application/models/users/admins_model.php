<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admins_Model extends Base_User_Model {

    protected $table = "admins";

    public function __construct() {
        parent::__construct();
    }
}