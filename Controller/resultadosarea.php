<?php
class resultadosarea extends Controllers
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
        $dataresultadosarea = $this->model->selectresultadosarea();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $datasalas = $this->model->selectsalas();
        $data = ['resultadosarea'=>$dataresultadosarea,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion,'salas'=>$datasalas];
        $this->views->getView($this, "Listar", $data, "");
    }
    public function Listar1()
    {
        $dataresultadosarea1 = $this->model->selectresultadosarea1();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea1,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar1", $data, "");
    }
    public function Listar2()
    {
        $dataresultadosarea2 = $this->model->selectresultadosarea2();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea2,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar2", $data, "");
    }
    public function Listar3()
    {
        $dataresultadosarea3 = $this->model->selectresultadosarea3();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea3,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar3", $data, "");
    }
    public function Listar4()
    {
        $dataresultadosarea4 = $this->model->selectresultadosarea4();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea4,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar4", $data, "");
    }
    public function Listar5()
    {
        $dataresultadosarea5= $this->model->selectresultadosarea5();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea5 ,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar5", $data, "");
    }
    public function Listar6()
    {
        $dataresultadosarea1 = $this->model->selectresultadosarea6();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea1,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar6", $data, "");
    }
    public function Listar7()
    {
        $dataresultadosarea2 = $this->model->selectresultadosarea7();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea2,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar7", $data, "");
    }
    public function Listar8()
    {
        $dataresultadosarea3 = $this->model->selectresultadosarea8();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea3,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar8", $data, "");
    }
    public function Listar9()
    {
        $dataresultadosarea4 = $this->model->selectresultadosarea9();        
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea4,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar9", $data, "");
    }
    public function Listar10()
    {
        $dataresultadosarea5= $this->model->selectresultadosarea10();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['resultadosarea'=>$dataresultadosarea5 ,'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar10", $data, "");
    }
    public function eliminados()
    {
        $data = $this->model->selectresultadosareaInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $ins_Id = $_POST['ins_Id'];
        $res_FechaCon = $_POST['res_FechaCon'];
        $res_canMeses = $_POST['res_canMeses'];
        $res_mGruesa = $_POST['res_mGruesa'];
        $res_mFina = $_POST['res_mFina'];
        $res_AudyLeng = $_POST['res_AudyLeng'];
        $res_PerySocial = $_POST['res_PerySocial'];
        $res_Total = $_POST['res_Total'];
        $res_Observacion = $_POST['res_Observacion'];
        $res_controlN = $_POST['res_controlN'];
        $insert = $this->model->insertarresultadosarea($ins_Id,$res_FechaCon,$res_canMeses,$res_mGruesa,$res_mFina,$res_AudyLeng,$res_PerySocial,$res_Total,$res_Observacion,$res_controlN);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selectresultadosarea();
        header("location: " . base_url() . "resultadosarea/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $res_Id = $_GET['res_Id'];        
        $dataNino = $this->model->selectregNinos();
        $dataresultadosarea = $this->model->editarresultadosarea($res_Id);
        $data = ['resultadosarea' => $dataresultadosarea, 'regninos' => $dataNino];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $res_Id = $_POST['res_Id'];
        $res_FechaCon = $_POST['res_FechaCon'];
        $res_canMeses = $_POST['res_canMeses'];
        $res_mGruesa = $_POST['res_mGruesa'];
        $res_mFina = $_POST['res_mFina'];
        $res_AudyLeng = $_POST['res_AudyLeng'];
        $res_PerySocial = $_POST['res_PerySocial'];
        $res_Total = $_POST['res_Total'];
        $res_Observacion = $_POST['res_Observacion'];
        $res_controlN = $_POST['res_controlN'];
        $actualizar = $this->model->actualizarresultadosarea($res_FechaCon,$res_canMeses, $res_mGruesa, $res_mFina, $res_AudyLeng, $res_PerySocial,$res_Total, $res_Observacion, $res_controlN,$res_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "resultadosarea/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $res_Id = $_GET['res_Id'];
        $this->model->eliminarresultadosarea($res_Id);
        header("location: " . base_url() . "resultadosarea/Listar");
        die();
    }
    public function reingresar()
    {
        $res_Id = $_GET['res_Id'];
        $this->model->reingresarresultadosarea($res_Id);
        $data = $this->model->selectresultadosarea();
        header("location: " . base_url() . "resultadosarea/Listar");
        die();
    }
    public function buscar()
    {
        $ins_Id = $_POST['ins_Id'];
        $data = $this->model->BuscarCliente($ins_Id);
        echo json_encode($data);
    }
    public function buscarNacimiento()
    {
        $ins_Id = $_POST['ins_Id'];
        $data = $this->model->buscarNacimiento($ins_Id);
        echo json_encode($data);
    }
}
