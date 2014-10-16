<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_Model extends Base_User_Model {

    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }
}