<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RepuestosModel extends CI_Model{

    public $table = 'repuestos';
    public $table_id = 'id_repuesto';

    public function __construct(){
        $this->load->database();
    }

    public function insertRepuesto($id_repuesto, $codigo, $nombre, $tipo_repuesto, $cantidad, $precio_compra, $descripcion, $id_proveedor, $estado){
        
        $data = [
            'id_repuesto' => $id_repuesto,
            'codigo' => $codigo,
            'nombre' => $nombre,
            'tipo_repuesto' => $tipo_repuesto,
            'cantidad' => $cantidad,
            'precio_compra' => $precio_compra,
            'descripcion' => $descripcion,
            'id_proveedor' => $id_proveedor,
            'estado' => $estado,
        ];
        return $this->db->insert('repuestos', $data);
    }

    function getAllRepuestos(){
        $this->db->select();
        $this->db->from($this->table);
       
        $query = $this->db->get();
        return $query->result();
    }

    public function findById($id){
		$this->db->where('id_repuesto', $id);
        $query = $this->db->get('repuestos');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
	}

    public function updateRepuesto($id_repuesto, $codigo, $nombre, $tipo_repuesto, $cantidad, $precio_compra, $descripcion, $id_proveedor, $estado) {
        $data = [
            'id_repuesto' => $id_repuesto,
            'codigo' => $codigo,
            'nombre' => $nombre,
            'tipo_repuesto' => $tipo_repuesto,
            'cantidad' => $cantidad,
            'precio_compra' => $precio_compra,
            'descripcion' => $descripcion,
            'id_proveedor' => $id_proveedor,
            'estado' => $estado,
        ];

        $this->db->where('id_repuesto', $id_repuesto);
        $this->db->update('repuestos', $data);
    }


    public function getIdNameProveedores(){
        $this->db->select('id_proveedor, nombre');
        $this->db->from('proveedores');

        $query = $this->db->get();
		return $query->result();
    }

    public function validateId($id_repuesto)
    {
        $this->db->select('*');
        $this->db->where("id_repuesto", $id_repuesto);
        $registros = $this->db->get('repuestos')->result();

        return (sizeof($registros) == 0);
    }

    public function validateCodigo($codigo)
    {
        $this->db->select('*');
        $this->db->where("codigo", $codigo);
        $registros = $this->db->get('repuestos')->result();

        return (sizeof($registros) == 0);
    }

    public function RevalidarCodigo($codigo, $id_repuesto){
		$this->db->select('*');
		$this->db->where("codigo", $codigo);
		$this->db->where("id_repuesto !=", $id_repuesto);
		$registros = $this->db->get('repuestos')->result();

		return (sizeof($registros)==0);
	}

    public function deleteRepuesto($id_repuesto){
		$this->db->where("id_repuesto", $id_repuesto);
		$this->db->delete('repuestos');
	}


    
    



    



}
