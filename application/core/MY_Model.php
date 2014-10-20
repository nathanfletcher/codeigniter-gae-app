<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

    protected  $table;

    public function __construct() {
        parent::__construct();
    }

    public function get($select = null, $where = null, $limit = null, $desc = false) {
        if(!is_null($select)) {
            $this->db->select($select);
        }
        if(!is_null($where)) {
            $this->db->where($where);
        }
        if(!is_null($limit)) {
            $this->db->limit($limit);
        }
        if($desc) {
            $this->db->order_by('id', 'desc');
        }
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data) ? $this->db->insert_id() : null;
    }

    public function update($where, $data) {
        $this->db->where($where);
        return $this->db->update($this->table, $data);
    }

    public function delete ($where) {
        $this->db->where($where);
        return $this->db->delete($this->table);
    }
}