<?php
    class ModelSites extends CI_Model {

        public function getAllSites(){

            $consulta = $this->db->query("SELECT * from lugares;");

            $datos = array();
            for ($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }
            return $datos;
        }

        public function insertSite($nombre,$descripcion,$longitud,$latitud){
            $consulta = $this->db->query("SELECT MAX(id) AS id from lugares");

            $fila = $consulta->result_array();
            $maxID = $fila[0]['id']+1;

            $this->db->query("INSERT INTO lugares VALUES ($maxID,'$nombre','$descripcion','$longitud','$latitud')");

            return $this->db->affected_rows();
        }

        public function deleteSite($id){
            $this->db->query("DELETE FROM lugares WHERE id = $id");

            return $this->db->affected_rows();
        }

        public function updateSite($id,$nombre,$descripcion,$longitud,$latitud){
            $this->db->query("UPDATE lugares SET nombre = '$nombre', descripcion = '$descripcion', longitud = '$longitud', latitud = '$latitud' WHERE id = $id");
            
            return $this->db->affected_rows();


        }
    }

?>