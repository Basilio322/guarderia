<?php
class documentos extends Controllers
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
        $datadocumentos = $this->model->selectdocumentos();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['documentos' =>$datadocumentos, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar", $data, "");
    }
        
    public function eliminados()
    {
        $data = $this->model->selectdocumentosInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $ins_Id = $_POST['ins_Id'];
        $docu_ci =$_POST['docu_ci'];
        $docu_cinum =$_POST['docu_cinum'];
        $docu_certificado =$_POST['docu_certificado'];
        $docu_ss =$_POST['docu_ss'];
        $docu_ciVacu = $_POST['docu_ciVacu'];
        $docu_disc = $_POST['docu_disc'];

        $insert = $this->model->insertardocumentos($ins_Id, $docu_ci,$docu_cinum,$docu_certificado,$docu_ss,$docu_ciVacu,$docu_disc);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectdocumentos();
        header("location: " . base_url() . "documentos/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $docu_id = $_GET['docu_id'];        
        $dataNino = $this->model->selectregNinos();
        $datadocumentos = $this->model->editardocumentos($docu_id);
        $data = ['documentos' => $datadocumentos, 'regninos' => $dataNino];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $docu_id=$_POST['docu_id'];        
        $docu_ci =$_POST['docu_ci'];
        $docu_cinum =$_POST['docu_cinum'];
        $docu_certificado =$_POST['docu_certificado'];
        $docu_ss =$_POST['docu_ss'];
        $docu_ciVacu = $_POST['docu_ciVacu'];
        $docu_disc = $_POST['docu_disc'];
        
        $actualizar = $this->model->actualizardocumentos($docu_ci,$docu_cinum,$docu_certificado,$docu_ss,$docu_ciVacu,$docu_disc,$docu_id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "documentos/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $docu_id = $_GET['docu_id'];
        $this->model->eliminardocumentos($docu_id);
        header("location: " . base_url() . "documentos/Listar");
        die();
    }
    public function reingresar()
    {        
        $docu_id = $_GET['docu_id'];        
        
        $datacontacto = $this->model->reingresardocumentos($docu_id);
        $data = ['documentos' => $datacontacto];

        header("location: " . base_url() . "documentos/Listar");
        die();
    }
    public function buscar()
    {
        $docu_ci = $_POST['docu_ci'];
        $data = $this->model->BuscarCliente($docu_ci);
        echo json_encode($data);
    }
}
