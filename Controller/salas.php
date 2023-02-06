<?php
class salas extends Controllers
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
        $data = $this->model->selectsalas();
        $this->views->getView($this, "Listar", $data, "");
    }


    public function eliminados()
    {
        $data = $this->model->selectsalasInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $s_nombre = $_POST['s_nombre'];
        $s_descripcion = $_POST['s_descripcion'];
        $insert = $this->model->insertarsalas($s_nombre, $s_descripcion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectsalas();
        header("location: " . base_url() . "salas/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $s_Id = $_GET['s_Id'];
        $data = $this->model->editarsalas($s_Id);
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $s_Id = $_POST['s_Id'];        
        $s_nombre = $_POST['s_nombre'];
        $s_descripcion = $_POST['s_descripcion'];
        $actualizar = $this->model->actualizarsalas($s_nombre, $s_descripcion, $s_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "salas/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $s_Id = $_GET['s_Id'];
        $this->model->eliminarsalas($s_Id);
        header("location: " . base_url() . "salas/Listar");
        die();
    }
    public function reingresar()
    {
        $s_Id = $_GET['s_Id'];
        $this->model->reingresarsalas($s_Id);
        $data = $this->model->selectsalas();
        header("location: " . base_url() . "salas/Listar");
        die();
    }
    public function buscar()
    {
        $s_nombre = $_POST['s_nombre'];
        $data = $this->model->BuscarCliente($s_nombre);
        echo json_encode($data);
    }
}
