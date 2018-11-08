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
            $consulta = $this->db->query("SELECT nombre FROM lugares WHERE nombre = '$nombre'");
            $fila = $consulta->result_array();

                if(empty($fila[0]['nombre'])){
                    $consulta = $this->db->query("SELECT MAX(id) AS id from lugares");
                    $fila = $consulta->result_array();
                    $maxID = $fila[0]['id']+1;
                        if(empty($maxID)){
                            $this->db->query("INSERT INTO lugares VALUES (1,'$nombre','$descripcion','$longitud','$latitud')");
                        }else{
                            $this->db->query("INSERT INTO lugares VALUES ($maxID,'$nombre','$descripcion','$longitud','$latitud')");
                        }
                }else{
                    return 10;
                    }
                    return $this->db->affected_rows();
                }

        public function deleteSite($id){
            $consulta = $this->db->query("SELECT lugares.id FROM lugares INNER JOIN localizaciones ON lugares.id = id_lugar WHERE lugares.id = $id;");
            $fila = $consulta->result_array();

            if(isset($fila[0]['id'])){
                $idAEliminar = $fila[0]['id'];
                if($idAEliminar == $id){
                    return 10;

                }else{
                    $this->db->query("DELETE FROM lugares WHERE id = $id");
                    return $this->db->affected_rows();
                }
            }
        }

        public function updateSite($id,$nombre,$descripcion,$longitud,$latitud){
            $this->db->query("UPDATE lugares SET nombre = '$nombre', descripcion = '$descripcion', longitud = '$longitud', latitud = '$latitud' WHERE id = $id");
            
            return $this->db->affected_rows();
        }
    }

?>