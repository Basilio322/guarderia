<?php
class regNinos extends Controllers
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
        $data = $this->model->selectregNinos();
        $this->views->getView($this, "Listar", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectregNinosInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $reg_Nombres = $_POST['reg_Nombres'];
        $reg_Paterno = $_POST['reg_Paterno'];
        $reg_Materno = $_POST['reg_Materno'];
        $reg_Genero = $_POST['reg_Genero'];
        $reg_FechaNac = $_POST['reg_FechaNac'];
        $insert = $this->model->insertarregNinos($reg_Nombres, $reg_Paterno, $reg_Materno, $reg_Genero, $reg_FechaNac);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectregNinos();
        header("location: " . base_url() . "regninos/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $reg_Id = $_GET['reg_Id'];
        $data = $this->model->editarregNinos($reg_Id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $reg_Id = $_POST['reg_Id'];
        $reg_Nombres = $_POST['reg_Nombres'];
        $reg_Paterno = $_POST['reg_Paterno'];
        $reg_Materno = $_POST['reg_Materno'];
        $reg_Genero = $_POST['reg_Genero'];
        $reg_FechaNac = $_POST['reg_FechaNac'];
        $actualizar = $this->model->actualizarregNinos($reg_Nombres, $reg_Paterno, $reg_Materno, $reg_Genero, $reg_FechaNac, $reg_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "regninos/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $reg_Id = $_GET['reg_Id'];
        $this->model->eliminarregNinos($reg_Id);
        header("location: " . base_url() . "regninos/Listar");
        die();
    }
    public function reingresar()
    {
        $reg_Id = $_GET['reg_Id'];
        $this->model->reingresarregNinos($reg_Id);
        $data = $this->model->selectregNinos();
        header("location: " . base_url() . "regninos/Listar");
        die();
    }
    public function buscar()
    {
        $reg_Nombres = $_POST['reg_Nombres'];
        $data = $this->model->BuscarCliente($reg_Nombres);
        echo json_encode($data);
    }
}
