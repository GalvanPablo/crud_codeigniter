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

    public function eliminar($persona_id){
        $this->db->where('persona_id', $persona_id);
        $this->db->delete('persona');
    }

    public function editar($persona, $persona_id){
        $this->db->where('persona_id', $persona_id);
        $this->db->update('persona', $persona);
    }
}

/*
    La BD consta de la tabla 'persona' con los siguientes atributos
    'persona_id'        int PK NOT NULL AI
    'nombre'            VARCHAR(45) NOT NULL
    'apellido'          VARCHAR(45) NOT NULL
    'fecha_nacimiento'  DATE NOT NULL
*/