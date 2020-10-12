<?php

    // El nombre de la clase debe ser el mismo que el nombre del archivo
    class Personas extends CI_Controller{

        public function __construct(){
            parent::__construct();
            $this->load->helper('form'); // Carga del Helper para crear formularios
            $this->load->helper('url'); // Carga del Helper para usar el redirect
            $this->load->model('Persona'); // Carga del modelo
            $this->load->library('form_validation');// Libreria para validaciones del formulario
            
            $this->load->database();
        }

        // Función para llamar el helper creado en la carpeta Helper
        function llamar_helper(){
            $this->load->helper('list_person_helper');

            $vdata["personas"] = list_person();
            $this->load->view('personas/llamar_helper', $vdata);
        }

        function index(){
            redirect('/personas/listado');
        }
        
        public function listado(){
            $vdata['personas'] = $this->Persona->findAll();
            $this->load->view('personas/listado', $vdata);
        }

        public function guardar($persona_id = null){

            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('edad', 'Edad', 'required');
            
            $error = ""; $vdata['nombre'] = $vdata['apellido'] = $vdata['edad'] = "";

            if(isset($persona_id)){
                $persona = $this->Persona->find($persona_id);
                
                if(isset($persona)){
                    $vdata['nombre'] = $persona->nombre;
                    $vdata['apellido'] = $persona->apellido;
                    $vdata['edad'] = $persona->edad;
                }
            }

            if($this->input->server("REQUEST_METHOD") == "POST"){
                
                $data['nombre'] = $this->input->post('nombre');
                $data['apellido'] = $this->input->post('apellido');
                $data['edad'] = $this->input->post('edad');

                $vdata['nombre'] = $this->input->post('nombre');
                $vdata['apellido'] = $this->input->post('apellido');
                $vdata['edad'] = $this->input->post('edad');
                
                if ($this->form_validation->run()){ // Validar que un formulario sea valido (campos)
                    if(isset($persona_id)){
                        $this->Persona->update($persona_id, $data); // El orden de los parámetros debe coindicir con el oredn del modelo
                    }else{
                        $persona_id = $this->Persona->insert($data); // Persona es el nombre del modelo

                        $error = $this->do_upload($persona_id);

                        if($error === ""){
                            redirect("/personas/guardar/$persona_id");
                        }

                    }
                }
            }

            $vdata['error'] = $error;
            $this->load->view('personas/guardar', $vdata);
        }

        // Método para upload de archivos
        private function do_upload($persona_id)
        {
            $config['upload_path']          = 'uploads';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) //El parametro image debe ser igual al nombre del campo de la vista
            {
                return $this->upload->display_errors();
            }
            else
            {
                $data = $this->upload->data();
                //var_dump($data);
                $name = $data["file_name"];
                $save = array(
                    'image' => $name
                );
                $this->Persona->update($persona_id, $save);
            }
            return "";
        }

        public function borrar($persona_id = null){
            $this->Persona->delete($persona_id);
            
            redirect('/personas/listado');
        }

        public function borrar_ajax($persona_id = null){
            $this->Persona->delete($persona_id);
    
            echo 1;
        }

        public function ver($persona_id = null){

            if(!isset($persona_id)){
                show_404();
            }

            $persona = $this->Persona->find($persona_id);

            if(!isset($persona)){
                show_404();
            }

            if(isset($persona)){
                $vdata['nombre'] = $persona->nombre;
                $vdata['apellido'] = $persona->apellido;
                $vdata['edad'] = $persona->edad;
            }else{
                $vdata['nombre'] = $vdata['apellido'] = $vdata['edad'] = "";
            }

            $this->load->view('personas/ver', $vdata);
        }
    }

?>