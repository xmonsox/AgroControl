<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedoresController extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->database();
		$this->load->model('ProveedoresModel');

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
    public function CrearProveedor(){

		$caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$longitud = 10;
		$id_proveedor = '';
		for ($i = 0; $i < $longitud; $i++) {
			$indice_aleatorio = rand(0, strlen($caracteres_permitidos) - 1);
			$caracter_aleatorio = $caracteres_permitidos[$indice_aleatorio];
			$id_proveedor .= $caracter_aleatorio;
		}
		if($this->input->server("REQUEST_METHOD")=="POST"){
            $nombre = $this->input->post("nombres");
            $telefono = $this->input->post("telefono");
            $direccion = $this->input->post("direccion");
			$email = $this->input->post("email");
			
            if($telefono && $direccion && $email != ""){
                
				//$cedulaValida = $this->UsuariosModel->validarCedula($cedula);
				$proveedorValido = $this->ProveedoresModel->validarEmail($email);

				if($proveedorValido){
					$this->ProveedoresModel->insertar($id_proveedor, $nombre, $telefono, $direccion, $email);
					
					$data['Proveedores'] = $this->ProveedoresModel->findAll();
					$data['session'] = $this->session->userdata("session_actual");
					$data['proveedorinsertado']=true;
					$this->load->view('Dashboard/superadmin/proveedores', $data);
					
				}else{
					redirect('superadmin/Dashboard/Proveedores', 'refresh');
				}
            }else{
				redirect('superadmin/Dashboard/RegistrarUsuario', 'refresh');
            }
		}
	}


	public function EditarProveedor($id_proveedor=null) {
        $id_proveedor = $id_proveedor;
		$data['session'] = $this->session->userdata("session_actual");

        $DatosProveedor = $this->ProveedoresModel->findByid($id_proveedor);
        $data['proveedor'] = $DatosProveedor;
		$this->load->view('Dashboard/superadmin/EditarProveedor', $data);

    }

    public function ActualizarDatosProveedor() {
        $id_proveedor = $this->input->post('id_proveedor');
        $nombre = $this->input->post('nombre');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');

		if($id_proveedor && $nombre && $telefono && $direccion && $email != ""){
                
			
			$proveedorValido = $this->ProveedoresModel->ReValidarEmail($email, $id_proveedor);

			if($proveedorValido){
				$this->ProveedoresModel->actualizarProveedor($id_proveedor, $nombre, $telefono, $direccion, $email);
				redirect('superadmin/Dashboard/Proveedores', 'refresh');
				
			}else{
				redirect('superadmin/Dashboard/EditarProveedor', 'refresh');
			}
		}else{
			redirect('superadmin/Dashboard/EditarProveedor', 'refresh');
		}
	}

	public function ActualizarMiPerfil() {
        $id = $this->input->post('id');
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');
        $tipo = $this->input->post('rol');
        $estado = $this->input->post('estado');

		if($cedula && $nombre && $apellido && $telefono && $direccion && $email != ""){
                
			$cedulaValida = $this->UsuariosModel->ReValidarCedula($cedula, $id);
			$userValido = $this->UsuariosModel->ReValidarEmail($email, $id);

			if($cedulaValida && $userValido){
				$this->UsuariosModel->actualizarPerfil($id, $cedula, $nombre, $apellido, $telefono, $direccion, $email, $tipo, $estado);
                redirect('Start/cerrarSession');
				
			}else{
				redirect('superadmin/Dashboard/MiPerfil', 'refresh');
			}
		}else{
			redirect('superadmin/Dashboard/MiPerfil', 'refresh');
		}
	}

	public function cambiarPassword($id){
        $CurrentPasword = $this->input->post('CurrentPassword');
        $NewPassword = $this->input->post('nuevaPassword');
        $ConfirmPassword = $this->input->post('confirmarPassword');
		
		$datoUsuario = $this->UsuariosModel->getCurrentPassword($id);
		$contrasenaEnBdD = $datoUsuario->passw;

		if($CurrentPasword && $NewPassword && $ConfirmPassword != ""){
			if(md5($CurrentPasword) == $contrasenaEnBdD){
				if($NewPassword == $ConfirmPassword){
					$this->UsuariosModel->UpdatePassword($id, $NewPassword);
					redirect('Start/cerrarSession');
				}else{
					echo "error en la nueva contraseña";
				}
			}else{
				echo "La constraseña ingresada no coincide";
			}
		}else{
			echo "Los inputs se enviarion vacios";
		}
		

	}

	public function deleteProveedores($id_proveedor){
        $this->ProveedoresModel->delete($id_proveedor);
		redirect('superadmin/Dashboard/Proveedores', 'refresh');
    }
}
