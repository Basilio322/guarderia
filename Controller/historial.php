<?php
class historial extends Controllers
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
        $dataconerado = $this->model->selecthistorial();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar", $data, "");
    }
    
    public function Listar1()
    {
        $dataconerado = $this->model->selecthistorial1();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar1", $data, "");
    }
    public function Listar2()
    {
        $dataconerado = $this->model->selecthistorial2();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar2", $data, "");
    }
    public function Listar3()
    {
        $dataconerado = $this->model->selecthistorial3();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar3", $data, "");
    }
    public function Listar4()
    {
        $dataconerado = $this->model->selecthistorial4();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar4", $data, "");
    }
    public function Listar5()
    {
        $dataconerado = $this->model->selecthistorial5();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar5", $data, "");
    }
    public function Listar6()
    {
        $dataconerado = $this->model->selecthistorial6();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar6", $data, "");
    }
    public function Listar7()
    {
        $dataconerado = $this->model->selecthistorial7();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar7", $data, "");
    }
    public function Listar8()
    {
        $dataconerado = $this->model->selecthistorial8();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar8", $data, "");
    }
    public function Listar9()
    {
        $dataconerado = $this->model->selecthistorial9();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar9", $data, "");
    }
    public function Listar10()
    {
        $dataconerado = $this->model->selecthistorial10();
        $dataregNinos = $this->model->selectregNinos();
        $dataregInscripcion = $this->model->selectinscripcion();
        $data = ['historial' =>$dataconerado, 'regninos'=>$dataregNinos, 'inscripcion'=>$dataregInscripcion];
        $this->views->getView($this, "Listar10", $data, "");
    }

    public function eliminados()
    {
        $data = $this->model->selecthistorialInactivos();
        $this->views->getView($this, "Eliminados", $data, "");
    }
    public function insertar()
    {

        $ins_Id = $_POST['ins_Id'];
        $his_Peso =$_POST['his_Peso'];
        $his_Talla =$_POST['his_Talla'];
        $his_Fecha =$_POST['his_Fecha'];
        $his_Otros =$_POST['his_Otros'];
        $his_ControlN = $_POST['his_ControlN'];

        $insert = $this->model->insertarhistorial($ins_Id, $his_Peso,$his_Talla,$his_Fecha,$his_Otros,$his_ControlN);
        if ($insert > 0) {
            $alert = 'registrado';
        } else if ($insert == 'existe') {
            $alert = 'existe';
        } else {
            $alert =  'error';
        }
        $this->model->selecthistorial();
        header("location: " . base_url() . "historial/Listar?msg=$alert");
        die();
    }
    public function editar()
    {
        $his_Id = $_GET['his_Id'];        
        $dataNino = $this->model->selectregNinos();
        $datahistorial = $this->model->editarhistorial($his_Id);
        $data = ['historial' => $datahistorial, 'regninos' => $dataNino];
        if ($data == 0) {
            $this->Listar();
        } else {
            $this->views->getView($this, "Editar", $data);
        }
    }
    public function actualizar()
    {
        $his_Id=$_POST['his_Id'];
        
        $his_Peso =$_POST['his_Peso'];
        $his_Talla =$_POST['his_Talla'];
        $his_Fecha =$_POST['his_Fecha'];
        $his_Otros =$_POST['his_Otros'];
        
        $actualizar = $this->model->actualizarhistorial($his_Peso,$his_Talla,$his_Fecha,$his_Otros,$his_Id);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert = 'error';
        }
        header("location: " . base_url() . "historial/Listar?msg=$alert");
        die();
    }
    public function eliminar()
    {
        $his_Id = $_GET['his_Id'];
        $this->model->eliminarhistorial($his_Id);
        header("location: " . base_url() . "historial/Listar");
        die();
    }
    public function reingresar()
    {        
        $his_Id = $_GET['his_Id'];        
        
        $datacontacto = $this->model->reingresarhistorial($his_Id);
        $data = ['historial' => $datacontacto];

        header("location: " . base_url() . "historial/Listar");
        die();
    }
    public function buscar()
    {
        $his_Talla1 = $_POST['his_Talla1'];
        $data = $this->model->BuscarCliente($his_Talla1);
        echo json_encode($data);
    }
}
