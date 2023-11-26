<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AsignacionesModel extends CI_Model
{
    public $table = 'asignaciones';
    public $table_id = 'id_asignacion';

    public function __construct(){
        $this->load->database();
    }

    // public function ContarActividadesDelSistema(){
    //     $cantidad_registros = $this->db->count_all('actividades');
    //     return $cantidad_registros;
    // }

    //buscar las actividades
    function findAll(){
        $this->db->select();
        $this->db->from($this->table);

        $query = $this->db->get();
        return $query->result();
    }

    public function getIdNameActividades(){
        $this->db->select('id_actividad, nombre_actividad');
        $this->db->from('actividades');

        $query = $this->db->get();
		return $query->result();
    }

    public function getIdNameUsuarios(){
        $this->db->select('id_usuario, nombre');
        $this->db->from('usuarios');

        $query = $this->db->get();
		return $query->result();
    }

    public function getIdNameMaquinarias(){
        $this->db->select('id_maquinaria, nombre');
        $this->db->from('maquinaria');

        $query = $this->db->get();
		return $query->result();
    }

    
    public function insertAsignacion($id_asignacion, $id_actividad, $id_usuario, $id_maquinaria, $estado_asignacion, $fecha_inicio, $fecha_finalizacion){
        
        $data = [
            'id_asignacion' => $id_asignacion,
            'id_actividad' => $id_actividad,
            'id_usuario' => $id_usuario,
            'id_maquinaria' => $id_maquinaria,
            'estado_asignacion' => $estado_asignacion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_finalizacion' => $fecha_finalizacion,
        ];
        return $this->db->insert('asignaciones', $data);
    }

    //buscar la actividad por id
    public function findById($id_asignacion)
    {
        $this->db->where('id_asignacion', $id_asignacion);
        $query = $this->db->get('asignaciones');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function updateAsignaciones($id_asignacion, $id_actividad, $id_usuario, $id_maquinaria, $estado_asignacion, $fecha_inicio, $fecha_finalizacion) {
        $data = [
            'id_asignacion' => $id_asignacion,
            'id_actividad' => $id_actividad,
            'id_usuario' => $id_usuario,
            'id_maquinaria' => $id_maquinaria,
            'estado_asignacion' => $estado_asignacion,
            'fecha_inicio' => $fecha_inicio,
            'fecha_finalizacion' => $fecha_finalizacion,
        ];

        $this->db->where('id_asignacion', $id_asignacion);
        $this->db->update('asignaciones', $data);
    }

    //eliminar tarea
    function deleteAsignaciones($id_asignacion)
    {
        $this->db->where($this->table_id, $id_asignacion);
        $this->db->delete($this->table);
    }

}