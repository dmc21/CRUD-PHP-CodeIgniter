<?php 
    class ModelLocations extends CI_Model{
        
        public function getAllLocations(){

            $consulta = $this->db->query("SELECT * FROM localizaciones");


            $datos = array();
            for ($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }
            return $datos;
        }

        public function insertLocation($descripcion,$fotografiaSrc,$check,$idLugar,$idPelicula){
            $consulta = $this->db->query("SELECT MAX(id) AS id from localizaciones");
            $fila = $consulta->result_array();
            $maxID = $fila[0]['id']+1;
            $valor = "";
            if($check == "s"){
                $valor = "s";
            }else{
                $valor = "n";
            }
            $ruta = "uploads/locations/$fotografiaSrc";
            if(empty($maxID)){
                $this->db->query("INSERT INTO localizaciones VALUES (1,'$descripcion','$ruta', '$valor','$idLugar','$idPelicula')");
            }else{
                $this->db->query("INSERT INTO localizaciones VALUES ($maxID+1,'$descripcion','$ruta','$valor','$idLugar','$idPelicula')");
            }
            return $this->db->affected_rows();
        }

        public function deleteLocation($id){
            $this->db->query("DELETE FROM localizaciones WHERE id = $id");
            return $this->db->affected_rows();
        }

        public function upFile($nombre_foto, $nameFile){

            $config['upload_path'] = "uploads/locations";
            $config['file_name'] = $nombre_foto;
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "1000000";
            $config['max_width'] = "2000";
            $config['max_height'] = "2000";

            $this->load->library('upload', $config);
            
            return $this->upload->do_upload($nameFile);
        }

        public function deleteFile($id){
            $consulta = $this->db->query("SELECT fotografia_src FROM localizaciones WHERE id = $id");
            $resultado = $consulta->result_array();
            return unlink($resultado[0]["fotografia_src"]);
        }

        public function getSRC($id){
            $consulta = $this->db->query("SELECT fotografia_src FROM localizaciones WHERE id = $id");
            $resultado = $consulta->result_array();
            return $resultado[0]["fotografia_src"];
        }

        


    }
?>