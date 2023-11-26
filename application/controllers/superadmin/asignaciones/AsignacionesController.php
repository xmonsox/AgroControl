<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AsignacionesController extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->model('AsignacionesModel');

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


    public function insertAsignacion(){
        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$longitud = 10;
		$id_asignacion = '';
		for ($i = 0; $i < $longitud; $i++) {
			$indice_aleatorio = rand(0, strlen($caracteres_permitidos) - 1);
			$caracter_aleatorio = $caracteres_permitidos[$indice_aleatorio];
			$id_asignacion .= $caracter_aleatorio;
		}

        $id_actividad = $this->input->post('id_actividad');
		$id_usuario = $this->input->post('id_usuario');
        $id_maquinaria = $this->input->post('id_maquinaria');
        $estado_asignacion = $this->input->post('estado_asignacion');
        $fecha_inicio = $this->input->post('fecha_inicio');
    	$fecha_finalizacion = strtotime($this->input->post('fecha_finalizacion'));

		if ($id_asignacion!="" &&  $id_actividad!="" &&  $id_usuario!="" && $id_maquinaria!="" && $estado_asignacion!=""  && $fecha_inicio!="" && $fecha_finalizacion!="") {
			
			if (strtotime($fecha_inicio) > $fecha_finalizacion) {
				$data['session'] = $this->session->userdata("session_actual");
				$data['fechaIncorrect'] = true;
				$data['asignaciones'] = $this->AsignacionesModel->findAll();
				$this->load->view('Dashboard/superadmin/asignaciones', $data);
			}else{
				$this->AsignacionesModel->insertAsignacion($id_asignacion, $id_actividad, $id_usuario, $id_maquinaria, $estado_asignacion, $fecha_inicio, $fecha_finalizacion);

				$data['session'] = $this->session->userdata("session_actual");
				$data['InsertAsignacion'] = true;
				$data['asignaciones'] = $this->AsignacionesModel->findAll();
				$this->load->view('Dashboard/superadmin/asignaciones', $data);
			}

		}else{
			$data['session'] = $this->session->userdata("session_actual");
			$data['camposvacios'] = true;
			$data['asignaciones'] = $this->AsignacionesModel->findAll();
			$this->load->view('Dashboard/superadmin/asignaciones', $data);
		}

	}

    public function viewForUpdate($id_asignacion = null){
		$id_asignacion = $id_asignacion;
		$data['session'] = $this->session->userdata("session_actual");
        $data['actividades'] = $this->AsignacionesModel->getIdNameActividades();
		$data['usuarios'] = $this->AsignacionesModel->getIdNameUsuarios();
		$data['maquinarias'] = $this->AsignacionesModel->getIdNameMaquinarias();
		$data['asignacion'] = $this->AsignacionesModel->findById($id_asignacion);
		$this->load->view('Dashboard/superadmin/modificarAsignaciones', $data);
	}

    public function updateAsignaciones(){
	
		if ($this->input->server("REQUEST_METHOD") == "POST"){

			$id_asignacion = $this->input->post('id_asignacion');
            $id_actividad = $this->input->post('id_actividad');
			$id_usuario = $this->input->post('id_usuario');
			$id_maquinaria = $this->input->post('id_maquinaria');
			$estado_asignacion = $this->input->post('estado_asignacion');
			$fecha_inicio = $this->input->post('fecha_inicio');
    		$fecha_finalizacion = strtotime($this->input->post('fecha_fin'));


			if ($id_asignacion!="" &&  $id_actividad!="" &&  $id_usuario!="" && $id_maquinaria!="" && $estado_asignacion!=""  && $fecha_inicio!="" && $fecha_finalizacion!="") {
				
				//Validacion de fechas
				if (strtotime($fecha_inicio) > $fecha_finalizacion) {

					$data['actividades'] = $this->AsignacionesModel->getIdNameActividades();
					$data['usuarios'] = $this->AsignacionesModel->getIdNameUsuarios();
					$data['maquinarias'] = $this->AsignacionesModel->getIdNameMaquinarias();
					$data['fecha_actual'] = date('d-m-Y');
					$data['asignaciones'] = $this->AsignacionesModel->findAll();
					$data['session'] = $this->session->userdata("session_actual");
					$data['fechaIncorrect']= true;
					$this->load->view('Dashboard/superadmin/Asignaciones', $data);
					
				}else{

					$this->AsignacionesModel->updateAsignaciones($id_asignacion, $id_actividad, $id_usuario, $id_maquinaria, $estado_asignacion, $fecha_inicio, $fecha_finalizacion);
					$data['session'] = $this->session->userdata("session_actual");
					$data['asignacionActualizada']= true;
					$this->load->view('Dashboard/superadmin/Asignaciones', $data);

				}
				
			}else{
				$data['actividades'] = $this->AsignacionesModel->getIdNameActividades();
				$data['usuarios'] = $this->AsignacionesModel->getIdNameUsuarios();
				$data['maquinarias'] = $this->AsignacionesModel->getIdNameMaquinarias();
				$data['asignacion'] = $this->AsignacionesModel->findById($id_asignacion);
				$data['session'] = $this->session->userdata("session_actual");
				$data['camposvacios']=true;
				$this->load->view('Dashboard/superadmin/modificarAsignaciones', $data);
			}
		}
	}

    public function deleteAsignacion($id_asignacion = null){
		$this->AsignacionesModel->deleteAsignaciones($id_asignacion);
		redirect('superadmin/Dashboard/Asignaciones');
	}




    



}