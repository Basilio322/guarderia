<?php
class regcontacto extends Controllers
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
        $dataconerado = $this->model->selectregcontacto();
        $dataregNinos = $this->model->selectregNinos();
        $data = ['regcontacto' =>$dataconerado, 'regninos'=>$dataregNinos];
        $this->views->getView($this, "Listar", $data, "");
    }

    public function eliminados()
    {
        $data = $this->model->selectregcontactoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $reg_Id = $_POST['reg_Id'];
        $con_Nombres = $_POST['con_Nombres'];
        $con_Paterno = $_POST['con_Paterno'];
        $con_Materno = $_POST['con_Materno'];
        $con_Ci = $_POST['con_Ci'];
        $con_Celular = $_POST['con_Celular'];
        $con_Parentesco = $_POST['con_Parentesco'];        
        $con_Direccion = $_POST['con_Direccion'];

        $insert = $this->model->insertarregcontacto($reg_Id, $con_Nombres,$con_Paterno,$con_Materno,$con_Ci ,$con_Celular,$con_Parentesco,  $con_Direccion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectregcontacto();
        header("location: " . base_url() . "regcontacto/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $con_Id = $_GET['con_Id'];        
        $dataNino = $this->model->selectregNinos();
        $datacontacto = $this->model->editarregcontacto($con_Id);
        $data = ['regcontacto' => $datacontacto, 'regninos' => $dataNino];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $con_Id=$_POST['con_Id'];
        $reg_Id = $_POST['reg_Id'];
        $con_Nombres = $_POST['con_Nombres'];
        $con_Paterno = $_POST['con_Paterno'];
        $con_Materno = $_POST['con_Materno'];
        $con_Ci = $_POST['con_Ci'];
        $con_Celular = $_POST['con_Celular'];
        $con_Parentesco = $_POST['con_Parentesco'];        
        $con_Direccion = $_POST['con_Direccion'];
       
        $actualizar = $this->model->actualizarregcontacto($reg_Id,$con_Nombres,$con_Paterno,$con_Materno,$con_Ci,$con_Celular,$con_Parentesco,  $con_Direccion, $con_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "regcontacto/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $con_Id = $_GET['con_Id'];
        $this->model->eliminarregcontacto($con_Id);
        header("location: " . base_url() . "regcontacto/Listar");
        die();
    }
    public function reingresar()
    {        
        $con_Id = $_GET['con_Id'];        
        
        $datacontacto = $this->model->reingresarregcontacto($con_Id);
        $data = ['regcontacto' => $datacontacto];

        header("location: " . base_url() . "regcontacto/Listar");
        die();
    }
    public function buscar()
    {
        $con_Nombres = $_POST['con_Nombres'];
        $data = $this->model->BuscarCliente($con_Nombres);
        echo json_encode($data);
    }
}
