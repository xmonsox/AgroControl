<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $validacion = $this->session->has_userdata("session_actual");
        if ($validacion) {
            $session = $this->session->userdata("session_actual");
            if ($session['tipo'] == "CLIENTE" && $session['estado'] == "ACTIVO") {
                return false;
            } else {
                redirect('Start/cerrarSession');
                die();
            }
        } else {
            redirect('Start/cerrarSession');
            die();
        }
    }

	public function Inicio(){
        $data['session'] = $this->session->userdata("session_actual");
		$this->load->view('Dashboard/cliente/plantilla', $data);
	}

    public function JugarPong(){
        $data['session'] = $this->session->userdata("session_actual");
		$this->load->view('Dashboard/cliente/pong', $data);
    }

    public function MiPerfil(){
		$data['session'] = $this->session->userdata("session_actual");
		$this->load->view('Dashboard/cliente/perfil', $data);
	}
}
