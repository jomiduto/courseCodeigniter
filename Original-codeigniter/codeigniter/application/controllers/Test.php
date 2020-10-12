<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

    public function index() {
        $this->load->library('session');
        var_dump($this->session->userdata("name"));
        $this->session->set_userdata('name', "aaaa");
        var_dump($this->session->userdata("name"));
    }

}
