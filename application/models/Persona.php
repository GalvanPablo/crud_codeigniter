<?php
class Persona extends CI_Model {
    public function agregar($persona){
        $this->db->insert('persona', $persona);
    }

    public function traer_todo(){
        $this->db->select('*');
        $this->db->from('persona');
        return $this->db->get()->result();
    }
}