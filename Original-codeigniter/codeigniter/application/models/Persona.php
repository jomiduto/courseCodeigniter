<?php

class Persona extends CI_Model {

    public $table = 'personas';
    public $table_id = 'persona_id';

    public function __construct() {
        
    }

    function find($id) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->where($this->table_id, $id);

        $query = $this->db->get();
        return $query->row();
    }

    function findAll() {
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }

    function getList($pag_size, $offset, $general_search, $col_nombre, $col_apellido, $col_edad, $pag = true) {
        $this->db->select();
        $this->db->from($this->table);

        if ($col_nombre != "" || $col_apellido != "" || $col_edad != "") {
            $this->db->group_start();

            if ($col_nombre != "")
                $this->db->like("nombre", $col_nombre);

            if ($col_apellido != "")
                $this->db->like("apellido", $col_apellido);

            if ($col_edad != "")
                $this->db->like("edad", $col_edad);
            $this->db->group_end();
        }else if ($general_search != "") {
            $this->db->group_start();
            $this->db->or_like("nombre", $general_search);
            $this->db->or_like("apellido", $general_search);
            $this->db->or_like("edad", $general_search);
            $this->db->group_end();
        }

        if ($pag)
            $this->db->limit($pag_size, $offset);

        //$this->db->where($this->table_id, 1);

        $query = $this->db->get();
        if ($pag)
            return $query->result();
        else
            return $query->num_rows();
    }

    function count($general_search) {
        $this->db->select();
        $this->db->from($this->table);

        if ($general_search != "") {
            $this->db->group_start();
            $this->db->or_like("nombre", $general_search);
            $this->db->or_like("apellido", $general_search);
            $this->db->or_like("edad", $general_search);
            $this->db->group_end();
        }

        $query = $this->db->get();
        return $query->num_rows();
    }

    function search($nombre) {
        $this->db->select();
        $this->db->from($this->table);
        $this->db->like("nombre", $nombre);

        $query = $this->db->get();
        return $query->result();
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    function update($id, $data) {
        $this->db->where($this->table_id, $id);
        $this->db->update($this->table, $data);
    }

    function delete($id) {
        $this->db->where($this->table_id, $id);
        $this->db->delete($this->table);
    }

}
