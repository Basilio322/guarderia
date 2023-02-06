<?php
class gestion extends Controllers
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
        $datagestion = $this->model->selectgestion();
        
        $data = ['gestion' =>$datagestion];
        $this->views->getView($this, "Listar", $data, "");
    }


    public function eliminados()
    {
        $data = $this->model->selectgestionInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $ges_anio = $_POST['ges_anio'];
        $ges_mensualidad = $_POST['ges_mensualidad'];
        $ges_observaciones = $_POST['ges_observaciones'];            

        $insert = $this->model->insertargestion($ges_anio, $ges_mensualidad,$ges_observaciones);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectgestion();
        header("location: " . base_url() . "gestion/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $id_Gestion = $_GET['id_Gestion'];        
        
        $datagestion = $this->model->editargestion($id_Gestion);
        $data = ['gestion' => $datagestion];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $id_Gestion=$_POST['id_Gestion'];
        $ges_anio = $_POST['ges_anio'];
        $ges_mensualidad = $_POST['ges_mensualidad'];
        $ges_observaciones = $_POST['ges_observaciones'];            

        $actualizar = $this->model->actualizargestion($ges_anio,$ges_mensualidad,$ges_observaciones, $id_Gestion);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "gestion/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $id_Gestion = $_GET['id_Gestion'];
        $this->model->eliminargestion($id_Gestion);
        header("location: " . base_url() . "gestion/Listar");
        die();
    }
    public function reingresar()
    {        
        $id_Gestion = $_GET['id_Gestion'];        
        
        $datagestion = $this->model->reingresargestion($id_Gestion);
        $data = ['gestion' => $datagestion];

        header("location: " . base_url() . "gestion/Listar");
        die();
    }
    public function buscar()
    {
        $ges_anio = $_POST['ges_anio'];
        $data = $this->model->Buscargestion($ges_anio);
        echo json_encode($data);
    }
}
