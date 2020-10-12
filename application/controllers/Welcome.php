<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->database(); // Load de la base de datos
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function test()
	{
		$this->load->model('Persona'); // Carga del modelo Persona
		$personas = $this->Persona->findAll(); // Se emplea el metodo findAll del modelo Persona

		var_dump($personas);

		$this->load->view('test');
	}
}
