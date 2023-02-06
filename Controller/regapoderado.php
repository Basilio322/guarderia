<?php
class regApoderado extends Controllers
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
        $dataApoderado = $this->model->selectregApoderado();
        $dataregNinos = $this->model->selectregNinos();
        $data = ['regapoderado' =>$dataApoderado, 'regninos'=>$dataregNinos];
        $this->views->getView($this, "Listar", $data, "");
    }

    public function eliminados()
    {
        $data = $this->model->selectregApoderadoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $reg_Id = $_POST['reg_Id'];
        $apod_Nombres = $_POST['apod_Nombres'];
        $apod_Paterno = $_POST['apod_Paterno'];
        $apod_Materno = $_POST['apod_Materno'];
        $apod_Ci = $_POST['apod_Ci'];
        $apod_FechaNac = $_POST['apod_FechaNac'];        
        $apod_Parentesco = $_POST['apod_Parentesco'];
        $apod_Celular = $_POST['apod_Celular'];
        $apod_Direccion = $_POST['apod_Direccion'];
        $apod_ingresos = $_POST['apod_ingresos'];
        $apod_Carrera = $_POST['apod_Carrera'];
        $apod_Semestre = $_POST['apod_Semestre'];
        $apod_Turno = $_POST['apod_Turno'];
        $insert = $this->model->insertarregApoderado($reg_Id, $apod_Nombres,$apod_Paterno,$apod_Materno,$apod_Ci ,$apod_FechaNac,$apod_Parentesco, $apod_Celular, $apod_Direccion, $apod_ingresos ,$apod_Carrera, $apod_Semestre, $apod_Turno);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectregApoderado();
        header("location: " . base_url() . "regApoderado/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $apod_Id = $_GET['apod_Id'];        
        $dataNino = $this->model->selectregNinos();
        $dataApoderado = $this->model->editarregApoderado($apod_Id);
        $data = ['regapoderado' => $dataApoderado, 'regninos' => $dataNino];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $apod_Id=$_POST['apod_Id'];
        $reg_Id = $_POST['reg_Id'];
        $apod_Nombres = $_POST['apod_Nombres'];
        $apod_Paterno = $_POST['apod_Paterno'];
        $apod_Materno = $_POST['apod_Materno'];
        $apod_Ci = $_POST['apod_Ci'];
        $apod_FechaNac = $_POST['apod_FechaNac'];        
        $apod_Parentesco = $_POST['apod_Parentesco'];
        $apod_Celular = $_POST['apod_Celular'];
        $apod_Direccion = $_POST['apod_Direccion'];
        $apod_ingresos = $_POST['apod_ingresos'];
        $apod_Carrera = $_POST['apod_Carrera'];
        $apod_Semestre = $_POST['apod_Semestre'];
        $apod_Turno = $_POST['apod_Turno'];
        $actualizar = $this->model->actualizarregApoderado($reg_Id,$apod_Nombres,$apod_Paterno,$apod_Materno,$apod_Ci,
                $apod_FechaNac,$apod_Parentesco, $apod_Celular, $apod_Direccion,$apod_ingresos, $apod_Carrera, $apod_Semestre, $apod_Turno, $apod_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "regApoderado/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $apod_Id = $_GET['apod_Id'];
        $this->model->eliminarregApoderado($apod_Id);
        header("location: " . base_url() . "regApoderado/Listar");
        die();
    }
    public function reingresar()
    {        
        $apod_Id = $_GET['apod_Id'];        
        $dataNino = $this->model->selectregNinos();
        $dataApoderado = $this->model->reingresarregApoderado($apod_Id);
        $data = ['regapoderado' => $dataApoderado, 'regninos' => $dataNino];

        header("location: " . base_url() . "regApoderado/Listar");
        die();
    }
    public function buscar()
    {
        $apod_Nombres = $_POST['apod_Nombres'];
        $data = $this->model->BuscarCliente($apod_Nombres);
        echo json_encode($data);
    }
}
