<?php

    class ModelUser extends CI_Model{

        
        public function confirmLogin($nombre, $pass){
           $consulta = $this->db->query("SELECT nick, passwd FROM usuarios WHERE nick = '$nombre' AND passwd = '$pass'");

           return $consulta->num_rows();

        }

    }



?>