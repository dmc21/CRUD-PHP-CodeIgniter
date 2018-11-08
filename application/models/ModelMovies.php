<?php 
    class ModelMovies extends CI_Model {
        
        public function getAllMovies(){

            $consulta = $this->db->query("SELECT * from peliculas");

            $datos = array();
            for ($i=0;$i<$consulta->num_rows();$i++){
                $fila[$i] = $consulta->result_array();
                $datos = $fila[$i];
            }
            return $datos;
        }

        public function insertMovie($titulo,$anio,$pais,$imagen){
            $consulta = $this->db->query("SELECT MAX(id) AS id from peliculas");
            $fila = $consulta->result_array();
            $maxID = $fila[0]['id']+1;
            $ruta = "uploads/movies/$imagen";

            if(empty($maxID)){
            $this->db->query("INSERT INTO peliculas VALUES (1,'$titulo','$anio','$pais','$ruta')");
            }else{
                $this->db->query("INSERT INTO peliculas VALUES ($maxID,'$titulo','$anio','$pais','$ruta')");
            }

            return $this->db->affected_rows();
        }

        public function deleteMovie($id){
            $consulta = $this->db->query("SELECT * FROM peliculas INNER JOIN localizaciones ON peliculas.id = localizaciones.id_pelicula WHERE peliculas.id = $id;");
            $fila = $consulta->result_array();
            if(!empty($fila[0]['id'])){
                return 10;
            }else{
                $this->db->query("DELETE FROM peliculas WHERE id = $id");
                return $this->db->affected_rows();
            }
        }

        public function upFile($nombre_foto, $nameFile){

            $config['upload_path'] = "uploads/movies";
            $config['file_name'] = $nombre_foto;
            $config['allowed_types'] = "gif|jpg|jpeg|png";
            $config['max_size'] = "10000000";
            $config['max_width'] = "3000";
            $config['max_height'] = "3000";

            $this->load->library('upload', $config);
            
            return $this->upload->do_upload($nameFile);
        }

        public function deleteFile($id){
            $consulta = $this->db->query("SELECT cartel_src FROM peliculas WHERE id = $id");
            $resultado = $consulta->result_array();
            return unlink($resultado[0]["cartel_src"]);
        }

        public function getSRC($id){
            $consulta = $this->db->query("SELECT cartel_src FROM peliculas WHERE id = $id");
            $resultado = $consulta->result_array();
            return $resultado[0]["cartel_src"];
        }
    }
?>