<?php
class inscripcion extends Controllers
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
        $dataconerado = $this->model->selectinscripcion();
        $dataregNinos = $this->model->selectregNinos();
        $datasalas = $this->model->selectsalas();
        $datacatpago = $this->model->selectcatpago();
        $datagestion = $this->model->selectgestion();
        
        $data = ['inscripcion' => $dataconerado, 'regninos' => $dataregNinos, 'salas' => $datasalas, 'catpago' => $datacatpago, 'gestion' => $datagestion];
        $this->views->getView($this, "Listar", $data, "");
    }

    public function eliminados()
    {
        $data = $this->model->selectinscripcionInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $reg_Id = $_POST['reg_Id'];
        $id = $_POST['id'];
        $ins_fecha = $_POST['ins_fecha'];
        $s_Id = $_POST['s_Id'];
        $cat_id = $_POST['cat_id'];
        $id_Gestion = $_POST['id_Gestion'];
        $ins_Infantil = $_POST['ins_Infantil'];
        

        $insert = $this->model->insertarinscripcion($reg_Id, $id, $ins_fecha, $s_Id, $cat_id, $id_Gestion, $ins_Infantil);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectinscripcion();
        header("location: " . base_url() . "inscripcion/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $ins_Id = $_GET['ins_Id'];
        $dataNino = $this->model->selectregNinos();
        $datainscripcion = $this->model->editarinscripcion($ins_Id);
        $datasalas = $this->model->selectsalas();
        $datacatpago = $this->model->selectcatpago();
        $datagestion = $this->model->selectgestion();
        $data = ['inscripcion' => $datainscripcion, 'regninos' => $dataNino, 'salas' => $datasalas ,'catpago' => $datacatpago, 'gestion' => $datagestion];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $ins_Id = $_POST['ins_Id'];
        $reg_Id = $_POST['reg_Id'];
        $ins_fecha = $_POST['ins_fecha'];
        $s_Id = $_POST['s_Id'];
        $cat_id = $_POST['cat_id'];
        $id_Gestion = $_POST['id_Gestion'];
        $ins_Infantil = $_POST['ins_Infantil'];
        

        $actualizar = $this->model->actualizarinscripcion($reg_Id, $ins_fecha, $s_Id, $cat_id, $id_Gestion, $ins_Infantil, $ins_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "inscripcion/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $ins_Id = $_GET['ins_Id'];
        $this->model->eliminarinscripcion($ins_Id);
        header("location: " . base_url() . "inscripcion/Listar");
        die();
    }
    public function reingresar()
    {
        $ins_Id = $_GET['ins_Id'];

        $datacontacto = $this->model->reingresarinscripcion($ins_Id);
        $data = ['inscripcion' => $datacontacto];

        header("location: " . base_url() . "inscripcion/Listar");
        die();
    }
    public function buscar()
    {
        $ins_fecha = $_POST['ins_fecha'];
        $data = $this->model->BuscarCliente($ins_fecha);
        echo json_encode($data);
    }

    public function pdf()
    {

        $ins_Id = $_GET["ins_Id"];
        $id_Gestion = $_GET["id_Gestion"];
        $reporteinscripcion = $this->model->reporteInscripcion1($ins_Id, $id_Gestion);
        $repapoderado = $this->model->selectpadres();
        $regcontacto = $this->model->selectcontacto();
        $datacatpago = $this->model->selectcatpago();
        $datagestion = $this->model->selectgestion();
        $dataNino = $this->model->selectregNinos();
        $datadocumento = $this->model->selectdocumento();
        $data = ['inscripcion' => $reporteinscripcion, 'regapoderado' => $repapoderado, 'regcontacto' => $regcontacto,'catpago' => $datacatpago,'gestion' => $datagestion, 'regnino' => $dataNino, 'documentos' => $datadocumento];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "VerInscripcion", $data);
        }
    }

    public function pdfGeneral()
    {
        $reporteinscripcion = $this->model->reporteInscripcionGeneral();
        $repapoderado = $this->model->selectpadres();
        $regcontacto = $this->model->selectcontacto();
        $datacatpago = $this->model->selectcatpago();
        $datadocumento = $this->model->selectdocumento();
        $dataNino = $this->model->selectregNinos();
        $datadocumento = $this->model->selectdocumento();
        $datagestion = $this->model->selectgestion();
        $data = ['inscripcion' => $reporteinscripcion, 'regapoderado' => $repapoderado, 'regcontacto' => $regcontacto,'catpago' => $datacatpago,'gestion' => $datagestion, 'regnino' => $dataNino, 'documentos' => $datadocumento];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "VerInscripcion", $data);
        }
    }
    public function pdfGestion()
    {

        $id_Gestion = $_GET["id_Gestion"];        
        $reporteinscripcion = $this->model->reporteInscripcionGestion($id_Gestion);
        $repapoderado = $this->model->selectpadres();
        $regcontacto = $this->model->selectcontacto();
        $datacatpago = $this->model->selectcatpago();
        $datadocumento = $this->model->selectdocumento();
        $dataNino = $this->model->selectregNinos();
        $datadocumento = $this->model->selectdocumento();
        $datagestion = $this->model->selectgestion();
        $data = ['inscripcion' => $reporteinscripcion, 'regapoderado' => $repapoderado, 'regcontacto' => $regcontacto,'catpago' => $datacatpago,'gestion' => $datagestion, 'regnino' => $dataNino, 'documentos' => $datadocumento];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "reporteporGestion", $data);
        }
    }
}
