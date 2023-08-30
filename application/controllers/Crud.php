<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('form');	// Me permite usar etiquetas predefinidas para el form por codeigniter
		$this->load->model('Persona');	// Carga el modelo
	}

	public function index()	{
		$datos['personas'] = $this->Persona->traer_todo();	// Traigo los datos de la DB
		$this->load->view('crud', $datos);	// Cargar la vista
	}


	public function agregar(){
		// Obtengo los datos del form
		$persona['nombre'] = $this->input->post('nombre');
		$persona['apellido'] = $this->input->post('apellido');
		$persona['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');
		// var_dump($persona); // Esto me permite visualizar variables

		// Uso la funcion agregar del modelo para cargar los datos a la BD
		$this->Persona->agregar($persona);
		redirect('crud');
	}

	public function eliminar($persona_id){
		$this->Persona->eliminar($persona_id);
		redirect('crud');
	}

	public function editar($persona_id){
		$persona['nombre'] = $this->input->post('nombre');
		$persona['apellido'] = $this->input->post('apellido');
		$persona['fecha_nacimiento'] = $this->input->post('fecha_nacimiento');

		$this->Persona->editar($persona, $persona_id);
		redirect('crud');
	}


}
