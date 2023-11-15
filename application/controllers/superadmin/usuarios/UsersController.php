<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller {
	public function __construct(){
        parent::__construct();
		$this->load->database();
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
    public function CrearUsuario(){

		$caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$longitud = 10;
		$id_usuario = '';
		for ($i = 0; $i < $longitud; $i++) {
			$indice_aleatorio = rand(0, strlen($caracteres_permitidos) - 1);
			$caracter_aleatorio = $caracteres_permitidos[$indice_aleatorio];
			$id_usuario .= $caracter_aleatorio;
		}


		if($this->input->server("REQUEST_METHOD")=="POST"){
			$cedula = $this->input->post("documento");
            $nombre = $this->input->post("nombres");
            $apellido = $this->input->post("apellidos");
            $telefono = $this->input->post("telefono");
            $direccion = $this->input->post("direccion");
			$email = $this->input->post("email");
			$password = $this->input->post("password");
			$rol = $this->input->post("rol");
			$estado = $this->input->post("estado");
			
            if($id_usuario && $cedula && $nombre && $apellido && $telefono && $direccion && $email && $password && $rol && $estado != ""){
                
				$cedulaValida = $this->UsuariosModel->validarCedula($cedula);
				$userValido = $this->UsuariosModel->validarEmail($email);

				if($cedulaValida && $userValido){
					$this->UsuariosModel->insertar($id_usuario, $cedula, $nombre, $apellido, $telefono, $direccion, $email, $rol, $estado, $password);
					
					$data['Usuarios'] = $this->UsuariosModel->findAll();
					$data['session'] = $this->session->userdata("session_actual");
					$data['usuarioinsertado']=true;
					$this->load->view('Dashboard/superadmin/usuarios', $data);
					
				}else{
					redirect('superadmin/Dashboard/RegistrarUsuario', 'refresh');
				}
            }else{
				redirect('superadmin/Dashboard/RegistrarUsuario', 'refresh');
            }
		}
	}


	public function EditarUsuario($id_usuario=null) {
        $id_usuario = $id_usuario;
		$data['session'] = $this->session->userdata("session_actual");

        $DatosUsuario = $this->UsuariosModel->findByid($id_usuario);
        $data['usuario'] = $DatosUsuario;
		$this->load->view('Dashboard/superadmin/Editar', $data);

    }

    public function ActualizarDatosUsuario() {
        $id = $this->input->post('id');
        $cedula = $this->input->post('cedula');
        $nombre = $this->input->post('nombre');
        $apellido = $this->input->post('apellido');
        $telefono = $this->input->post('telefono');
        $direccion = $this->input->post('direccion');
        $email = $this->input->post('email');
        $rol = $this->input->post('rol');
        $estado = $this->input->post('estado');

		if($cedula && $nombre && $apellido && $telefono && $direccion && $email && $rol && $estado != ""){
                
			$cedulaValida = $this->UsuariosModel->ReValidarCedula($cedula, $id);
			$userValido = $this->UsuariosModel->ReValidarEmail($email, $id);

			if($cedulaValida && $userValido){
				$this->UsuariosModel->actualizarUsuario($id, $cedula, $nombre, $apellido, $telefono, $direccion, $email, $rol, $estado);
				redirect('superadmin/Dashboard/Usuarios', 'refresh');
				
			}else{
				redirect('superadmin/Dashboard/EditarUsuario', 'refresh');
			}
		}else{
			redirect('superadmin/Dashboard/EditarUsuario', 'refresh');
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

	public function deleteUsuario($id_usuario){
        $this->UsuariosModel->delete($id_usuario);
		redirect('superadmin/Dashboard/Usuarios', 'refresh');
    }
}