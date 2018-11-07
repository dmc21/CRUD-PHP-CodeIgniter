<?php 

include("Seguridad.php");
    class ControllerUser extends Seguridad {
        public function __construct(){
            parent::__construct();
            $this->load->model("ModelUser"); 
            $this->load->model("ModelMovies");
            $this->load->model("ModelSites");
            $this->load->model("ModelLocations");
        }

        public function index(){ //todos los controladores tienen un index para comprobar si estas logueado o no?
            if($this->session->userdata("logueado")){
                $data['view'] = "ViewLocation/admin";
                $this->mainMenu("","");
            }else{
                $data['view'] = "ViewUser/login";
                $this->load->view("template_admin",$data);
            } 
        }

        public function confirmLogin(){
           $nick =  $this->input->post("nombre");
           $password = $this->input->post("pass");
           $respuesta =  $this->ModelUser->confirmLogin($nick,$password);

          if ($respuesta){
            $usuario_data = array(
                'id' => $respuesta->idusuario,
                'nick' => $respuesta->nick,
                'logueado' => TRUE
             );
             $this->session->set_userdata($usuario_data);
             $this->mainMenu("","");
          } else {
            $data['view'] = "ViewUser/login";
            $this->load->view("template_admin",$data);
          }
       }


     public function iniciar_sesion() {
        $data = array();
        $data['view'] = "ViewUser/login";
        $this->load->view('template_admin', $data);
     }

       public function cerrar_sesion() {
        $usuario_data = array(
           'logueado' => FALSE
        );
        $this->session->set_userdata($usuario_data);
        $data['view'] = "ViewUser/login";
        $this->load->view("template_admin",$data);
     }
        
           
        public function mainMenu($content, $cadena) {
            $data['nick'] = $this->ModelUser->getInfoUser($this->session->userdata("id"));
            $data[$content] = $cadena;
            $data['movies'] = $this->ModelMovies->getAllMovies();
            $data['sites'] = $this->ModelSites->getAllSites();
            $data['locations'] = $this->ModelLocations->getAllLocations();
            $data['view'] = "ViewLocation/admin";
            $this->load->view("template_admin",$data);
        }

        public function logout(){
            $data['view'] = "ViewUser/login";
            $this->load->view("template_admin",$data);
        }
    }

?>