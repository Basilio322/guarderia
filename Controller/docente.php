<?php
class docente extends Controllers
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . base_url());
        }
        parent::__construct();
    }
    
    public function Listar()
    {
        $datadocente = $this->model->selectdocente();
        $datasalas = $this->model->selectsala();
        $data = ['docente' =>$datadocente, 'salas'=>$datasalas];
        $this->views->getView($this, "Listar", $data, "");
    }


    public function eliminados()
    {
        $data = $this->model->selectdocenteInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $doc_Nombres = $_POST['doc_Nombres'];
        $doc_Paterno = $_POST['doc_Paterno'];
        $doc_Materno = $_POST['doc_Materno'];
        $doc_Telefono = $_POST['doc_Telefono'];
        $doc_Email = $_POST['doc_Email'];
        $doc_Direccion = $_POST['doc_Direccion'];
        $doc_Profesion = $_POST['doc_Profesion'];
        $doc_instProv = $_POST['doc_instProv'];
        $doc_Contrato = $_POST['doc_Contrato'];
        $s_Id = $_POST['s_Id'];        
        

        $insert = $this->model->insertardocente($doc_Nombres, $doc_Paterno,$doc_Materno,$doc_Telefono,$doc_Email ,$doc_Direccion,$doc_Profesion,$doc_instProv,$doc_Contrato,$s_Id);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectdocente();
        header("location: " . base_url() . "docente/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $doc_Id = $_GET['doc_Id'];        
        $datasalas = $this->model->selectsala();
        $datadocente = $this->model->editardocente($doc_Id);
        $data = ['docente' => $datadocente, 'salas' => $datasalas];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $doc_Id=$_POST['doc_Id'];
        $doc_Nombres = $_POST['doc_Nombres'];
        $doc_Paterno = $_POST['doc_Paterno'];
        $doc_Materno = $_POST['doc_Materno'];
        $doc_Telefono = $_POST['doc_Telefono'];
        $doc_Email = $_POST['doc_Email'];
        $doc_Direccion = $_POST['doc_Direccion'];        
        $doc_Profesion = $_POST['doc_Profesion'];
        $doc_instProv = $_POST['doc_instProv'];
        $doc_Contrato = $_POST['doc_Contrato'];
        $s_Id = $_POST['s_Id'];        

        $actualizar = $this->model->actualizardocente($doc_Nombres,$doc_Paterno,$doc_Materno,$doc_Telefono,$doc_Email,$doc_Direccion,$doc_Profesion,$doc_instProv,$doc_Contrato,$s_Id, $doc_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "docente/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $doc_Id = $_GET['doc_Id'];
        $this->model->eliminardocente($doc_Id);
        header("location: " . base_url() . "docente/Listar");
        die();
    }
    public function reingresar()
    {        
        $doc_Id = $_GET['doc_Id'];        
        
        $datadocente = $this->model->reingresardocente($doc_Id);
        $data = ['docente' => $datadocente];

        header("location: " . base_url() . "docente/Listar");
        die();
    }
    public function buscar()
    {
        $doc_Nombres = $_POST['doc$doc_Nombres'];
        $data = $this->model->Buscardocente($doc_Nombres);
        echo json_encode($data);
    }
}
