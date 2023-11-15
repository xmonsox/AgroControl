<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->model('ProveedoresModel');
		$this->load->model('UsuariosModel');

        $validacion = $this->session->has_userdata("session_actual");
		
        if ($validacion) {
            $session = $this->session->userdata("session_actual");
            if ($session['rol'] == "SUPERADMIN" && $session['estado'] == "ACTIVO") {
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
		$this->load->view('Dashboard/superadmin/plantilla', $data);
	}

	public function Usuarios(){
		$data['Usuarios'] = $this->UsuariosModel->findAll();

		$data['session'] = $this->session->userdata("session_actual");
		$this->load->view('Dashboard/superadmin/usuarios', $data);
	}
	public function Proveedores(){
		$data['Proveedores'] = $this->ProveedoresModel->findAll();

		$data['session'] = $this->session->userdata("session_actual");
		$this->load->view('Dashboard/superadmin/proveedores', $data);
	}


	public function MiPerfil(){
		$data['session'] = $this->session->userdata("session_actual");
		$this->load->view('Dashboard/superadmin/perfil', $data);
	}


}
