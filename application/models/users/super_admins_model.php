<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_Admins_Model extends Base_User_Model {

    protected $table = 'super-admins';

    public function __construct() {
        parent::__construct();
    }
}