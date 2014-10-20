<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct($rules = array()) {

        parent::__construct($rules);
    }

    public function error_array() {

        // No errors, validation passes!
        if (count($this->_error_array) === 0) {
            return array();
        }

        return $this->_error_array;
    }

    public function clear_field_data() {

        $this->_field_data = array();
        return $this;
    }

    public function valid_date($str, $separator = "-") {

        //Explode at separator
        $ex = explode ( $separator, $str );

        //Check date and return result
        return checkdate( $ex[0], $ex[1], $ex[2] );
    }

    public function is_exists($str, $field) {

        list($table, $field)=explode('.', $field);
        $query = $this->CI->db->limit(1)->get_where($table, array($field => $str));
        return $query->num_rows() === 1;
    }

    public function less_than_or_equal($str, $max) {

        if ( ! is_numeric($str)) {
            return FALSE;
        }
        return $str <= $max;
    }

    public function greater_than_or_equal($str, $min) {

        if ( ! is_numeric($str)) {
            return FALSE;
        }
        return $str >= $min;
    }
}