<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_User_Model extends MY_Model {

    protected $table = '';

    function __construct() {
        parent::__construct();
    }

    function get_logged_in_user($select, $where) {

        return $this->get($select, $where);
    }
}