<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProveedoresModel extends CI_Model{

    public $table = 'proveedores';
    public $table_id = 'id_proveedor';

    public function __construct(){
        $this->load->database();
    }

    public function validarIngreso($email, $password){
        $this->db->select('email, passw');
		$this->db->where('email', $email);
		$this->db->where('passw', md5($password) );
		$this->db->where('estado', 'ACTIVO');
		$registros = $this->db->get('usuarios')->result();

		if (sizeof($registros)==0) {
			return false;
		}else{
			return true;
		}
    }

    public function getUsuarioByEmail($email){
        
        $this->db->select('id_usuario, documento, nombre, apellido, telefono, direccion, rol, estado, email, passw');
        $this->db->where('email', $email);
        $registros = $this->db->get('usuarios')->result();
        
        if(sizeof($registros)!=0){
            return $registros[0];
        }else{
            return null;
        }
    }

    public function getCurrentPassword($id){
        
        $this->db->select('passw');
        $this->db->where('id_usuario', $id);
        $registros = $this->db->get('usuarios')->result();
        
        if(sizeof($registros)!=0){
            return $registros[0];
        }else{
            return null;
        }
    }

    public function validarCedula($cedula)
    {
        $this->db->select('*');
        $this->db->where("documento", $cedula);
        $registros = $this->db->get('usuarios')->result();

        return (sizeof($registros) == 0);
    }

    public function validarEmail($email)
    {
        $this->db->select('*');
        $this->db->where("email", $email);
        $registros = $this->db->get('proveedores')->result();

        return (sizeof($registros) == 0);
    }

    public function ReValidarCedula($cedula, $id)
    {
        $this->db->select('*');
        $this->db->where("documento", $cedula);
        $this->db->where("id_usuario != ", $id);
        $registros = $this->db->get('usuarios')->result();

        return (sizeof($registros) == 0);
    }

    public function ReValidarEmail($email, $id)
    {
        $this->db->select('*');
        $this->db->where("email", $email);
        $this->db->where("id_proveedor != ", $id);
        $registros = $this->db->get('proveedores')->result();

        return (sizeof($registros) == 0);
    }

    public function insertar($id_proveedor, $nombre, $telefono, $direccion, $email){
        $data = [
            'id_proveedor' => $id_proveedor,
            'nombre' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'email' => $email,
        ];
        return $this->db->insert('proveedores', $data);
    }

    function findAll(){
        $this->db->select();
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function findById($id_proveedor) {
        $this->db->where('id_proveedor', $id_proveedor);
        $query = $this->db->get('proveedores');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function actualizarProveedor($id_proveedor, $nombre, $telefono, $direccion, $email) {
        $data = array(
            'nombre' => $nombre,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'email' => $email,
        );

        $this->db->where('id_proveedor', $id_proveedor);
        $this->db->update('proveedores', $data);
    }

    public function actualizarPerfil($id, $cedula, $nombre, $apellido, $telefono, $direccion, $email, $tipo, $estado) {
        $data = array(
            'documento' => $cedula,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'rol' => $tipo,
            'estado' => $estado,
            'email' => $email,
        );

        $this->db->where('id_usuario', $id);
        $this->db->update('usuarios', $data);
    }

    public function UpdatePassword($id, $NewPassword) {
        $data = array(
            'passw' => md5($NewPassword),
        );

        if($NewPassword != ""){
            $this->db->where('id_usuario', $id);
            $this->db->update('usuarios', $data);
        }
    }

    function delete($id_proveedor){
        $this->db->where($this->table_id, $id_proveedor);
        $this->db->delete($this->table);
    }



}

