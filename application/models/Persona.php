<?php

    class Persona extends CI_Model{
        
        public $table = 'personas';
        public $table_id = 'persona_id';

        public function __construct(){
            
        }

        // Metodo para buscar un registro por Id
        function find($id){
            $this->db->select();
            $this->db->from($this->table);
            $this->db->where($this->table_id, $id);

            $query = $this->db->get();
            return $query->row();
        }

        // Metodo para buscar todos los registros de la tabla
        function findAll(){
            $this->db->select();
            $this->db->from($this->table);

            $query = $this->db->get();
            return $query->result();
        }

        // Metodo para el buscador de la tabla - Filtrado
        function search($nombre){
            $this->db->select();
            $this->db->from($this->table);
            $this->db->like("nombre", $nombre);

            $query = $this->db->get();
            return $query->result();
        }
        
        // Metodo para insertar un registro
        function insert($data) {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        }

        // Metodo para edtitar un registro
        function update($id, $data) {
            $this->db->where($this->table_id, $id);
            $this->db->update($this->table, $data);
        }

        // Metodo para eliminar un registro
        function delete($id) {
            $this->db->where($this->table_id, $id);
            $this->db->delete($this->table);
        }
    }

?>