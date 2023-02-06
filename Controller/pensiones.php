<?php
class pensiones extends Controllers
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
        $dataPensiones = $this->model->selectpensiones();
        $dataregNinos = $this->model->selectregNinos();
        $datagestion = $this->model->selectgestion();
        $datacatpago = $this->model->selectcatpago();
        $datainscripcion = $this->model->selectinscripcion();
        $data = ['pensiones' =>$dataPensiones, 'regninos'=>$dataregNinos,'gestion'=>$datagestion,'catpago'=>$datacatpago, 'inscripcion'=>$datainscripcion];
        $this->views->getView($this, "Listar", $data, "");
    }

    public function eliminados()
    {
        $data = $this->model->selectpensionesInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $ins_Id = $_POST['ins_Id'];
        $pen_Fecha = $_POST['pen_Fecha'];
        $pen_PagoN = $_POST['pen_PagoN'];
        $id_Gestion = $_POST['id_Gestion'];
        
        $pen_cuenta = $_POST['pen_cuenta'];
        $pen_totalF = $_POST['pen_totalF'];        
        $pen_Observacion = $_POST['pen_Observacion'];
        
        
        
        $insert = $this->model->insertarpensiones($ins_Id,$pen_Fecha,$pen_PagoN,$id_Gestion,$pen_cuenta,$pen_totalF,$pen_Observacion);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectpensiones();
        header("location: " . base_url() . "pensiones/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $pen_Id = $_GET['pen_id'];        
        $dataNino = $this->model->selectregNinos();
        $datagestion = $this->model->selectgestion();
        $datacatpago = $this->model->selectcatpago();
        $datainscripcion = $this->model->selectinscripcion();
        $datapensiones = $this->model->editarpensiones($pen_Id);
        $data = ['pensiones' => $datapensiones, 'regninos' => $dataNino,'gestion'=>$datagestion,'catpago'=>$datacatpago, 'inscripcion'=>$datainscripcion];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $pen_Id=$_POST['pen_id'];
        
        $pen_Fecha = $_POST['pen_Fecha'];
        $pen_PagoN = $_POST['pen_PagoN'];
        $id_Gestion = $_POST['id_Gestion'];
        
        $pen_cuenta = $_POST['pen_cuenta'];
        $pen_totalF = $_POST['pen_totalF'];        
        $pen_Observacion = $_POST['pen_Observacion'];
        

        $actualizar = $this->model->actualizarpensiones($pen_Fecha,$pen_PagoN,$id_Gestion,$pen_cuenta,$pen_totalF,$pen_Observacion, $pen_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "pensiones/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $pen_Id = $_GET['pen_id'];
        $this->model->eliminarpensiones($pen_Id);
        header("location: " . base_url() . "pensiones/Listar");
        die();
    }
    public function reingresar()
    {        
        $pen_Id = $_GET['pen_id'];        
        
        $datapensiones = $this->model->reingresarpensiones($pen_Id);
        $data = ['pensiones' => $datapensiones];

        header("location: " . base_url() . "pensiones/Listar");
        die();
    }
    public function buscar()
    {

        $reg_Nombres = $_POST['reg_Nombres'];
        $dataPensiones = $this->model->selectpensiones();
        $dataregNinos = $this->model->selectregNinos();
        $datagestion = $this->model->selectgestion();
        $datacatpago = $this->model->selectcatpago();
        $datainscripcion = $this->model->selectinscripcion();
        $data = ['pensiones' =>$dataPensiones, 'regninos'=>$dataregNinos, 'inscripcion'=>$datainscripcion,'gestion'=>$datagestion,'catpago'=>$datacatpago];
        $data = $this->model->Buscarpension($reg_Nombres);
        echo json_encode($data);
    }
}
