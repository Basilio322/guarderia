<?php
class catpago extends Controllers
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
        $datacatpago = $this->model->selectcatpago();
        $datagestion = $this->model->selectgestion();
        $data = ['catpago' =>$datacatpago, 'gestion'=>$datagestion];
        $this->views->getView($this, "Listar", $data, "");
    }


    public function eliminados()
    {
        $data = $this->model->selectcatpagoInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $cat_nombre = $_POST['cat_nombre'];
        $cat_descripcion = $_POST['cat_descripcion'];
        $cat_monto = $_POST['cat_monto'];
        $id_Gestion = $_POST['id_Gestion'];
          
        

        $insert = $this->model->insertarcatpago($cat_nombre, $cat_descripcion,$cat_monto,$id_Gestion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectcatpago();
        header("location: " . base_url() . "catpago/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $cat_id = $_GET['cat_id'];        
        $datagestion = $this->model->selectgestion();
        $datacatpago = $this->model->editarcatpago($cat_id);
        $data = ['catpago' => $datacatpago, 'gestion' => $datagestion];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $cat_id=$_POST['cat_id'];
        $cat_nombre = $_POST['cat_nombre'];
        $cat_descripcion = $_POST['cat_descripcion'];
        $cat_monto = $_POST['cat_monto'];
        $id_Gestion = $_POST['id_Gestion'];
        

        $actualizar = $this->model->actualizarcatpago($cat_nombre,$cat_descripcion,$cat_monto,$id_Gestion, $cat_id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "catpago/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $cat_id = $_GET['cat_id'];
        $this->model->eliminarcatpago($cat_id);
        header("location: " . base_url() . "catpago/Listar");
        die();
    }
    public function reingresar()
    {        
        $cat_id = $_GET['cat_id'];        
        
        $datacatpago = $this->model->reingresarcatpago($cat_id);
        $data = ['catpago' => $datacatpago];

        header("location: " . base_url() . "catpago/Listar");
        die();
    }
    public function buscar()
    {
        $cat_nombre = $_POST['cat_nombre'];
        $data = $this->model->Buscarcatpago($cat_nombre);
        echo json_encode($data);
    }
}
