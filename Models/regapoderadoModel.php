<?php
class regApoderadoModel extends Mysql{
    public  $apod_Id, $reg_Id, $apod_Nombres , $apod_Paterno, $apod_Materno, $apod_Ci, $apod_FechaNac, $apod_Parentesco ,$apod_Celular ,$apod_Direccion,$apod_ingresos ,$apod_Carrera ,$apod_Semestre ,$apod_Turno ;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectregApoderado()
    {
        $sql = "SELECT * FROM regApoderado inner join regninos on regApoderado.reg_Id=regninos.reg_Id WHERE apod_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }



    public function selectregApoderadoInactivos()
    {
        $sql = "SELECT * FROM regApoderado WHERE apod_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $apod_Nombres)
    {
        $this->apod_Nombres = $apod_Nombres;
        $sql = "SELECT * FROM regApoderado WHERE apod_Nombres = $this->apod_Nombres AND apod_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarregApoderado( int $reg_Id,String $apod_Nombres, String $apod_Paterno, String $apod_Materno,String $apod_Ci, String $apod_FechaNac,
                                            String $apod_Parentesco, String $apod_Celular, String $apod_Direccion, String $apod_ingresos,
                                            String $apod_Carrera, String $apod_Semestre, String $apod_Turno)
    {
        $return = "";
        
        $this->reg_Id = $reg_Id;
        $this->apod_Nombres = $apod_Nombres;
        $this->apod_Paterno = $apod_Paterno;
        $this->apod_Materno = $apod_Materno;
        $this->apod_Ci = $apod_Ci;
        $this->apod_FechaNac = $apod_FechaNac;        
        $this->apod_Parentesco = $apod_Parentesco;
        $this->apod_Celular = $apod_Celular;
        $this->apod_Direccion = $apod_Direccion;
        $this->apod_ingresos = $apod_ingresos;
        $this->apod_Carrera = $apod_Carrera;
        $this->apod_Semestre = $apod_Semestre;
        $this->apod_Turno = $apod_Turno;
        
        $sql = "SELECT * FROM regApoderado WHERE apod_Nombres = '{$this->apod_Nombres}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  regapoderado(reg_Id, apod_Nombres,apod_Paterno,apod_Materno, apod_Ci,
                                                 apod_FechaNac, apod_Parentesco,apod_Celular,apod_Direccion,apod_ingresos,apod_Carrera,
                                                 apod_Semestre,apod_Turno) VALUES (?,?,?,?,?,?,?,?,?,?,?, ?,?)";
            $data = array($this->reg_Id,$this->apod_Nombres, $this->apod_Paterno,$this->apod_Materno,$this->apod_Ci,
                                                 $this->apod_FechaNac,$this->apod_Parentesco,$this->apod_Celular,$this->apod_Direccion,$this->apod_ingresos,$this->apod_Carrera,
                                                 $this->apod_Semestre,$this->apod_Turno);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarregApoderado(int $apod_Id)
    {
        $this->apod_Id = $apod_Id;
        $sql = "SELECT * FROM regApoderado WHERE apod_Id = '{$this->apod_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarregApoderado(int $reg_Id,String $apod_Nombres, String $apod_Paterno, String $apod_Materno,String $apod_Ci, String $apod_FechaNac,
    String $apod_Parentesco, String $apod_Celular, String $apod_Direccion, String $apod_ingresos,
    String $apod_Carrera, String $apod_Semestre, String $apod_Turno,int $apod_Id)
    {
        $return = "";
        
        $this->reg_Id = $reg_Id;
        $this->apod_Nombres = $apod_Nombres;
        $this->apod_Paterno = $apod_Paterno;                                                                                            
        $this->apod_Materno = $apod_Materno;
        $this->apod_Ci = $apod_Ci;
        $this->apod_FechaNac = $apod_FechaNac;        
        $this->apod_Parentesco = $apod_Parentesco;
        $this->apod_Celular = $apod_Celular;
        $this->apod_Direccion = $apod_Direccion;
        $this->apod_ingresos = $apod_ingresos;
        $this->apod_Carrera = $apod_Carrera;
        $this->apod_Semestre = $apod_Semestre;
        $this->apod_Turno = $apod_Turno;
        $this->apod_Id = $apod_Id;
        $query = "UPDATE regApoderado SET reg_Id=?,apod_Nombres = ?, apod_Paterno = ?,apod_Materno = ?,apod_Ci = ?,
        apod_FechaNac = ?,apod_Parentesco = ?,apod_Celular = ?,apod_Direccion = ?,apod_ingresos = ?,
        apod_Carrera = ?,apod_Semestre = ?,apod_turno = ?  WHERE apod_Id = ?";
        $data = array($this->reg_Id,$this->apod_Nombres, $this->apod_Paterno,$this->apod_Materno, $this->apod_Ci, $this->apod_FechaNac,
           $this->apod_Parentesco,$this->apod_Celular,$this->apod_Direccion, $this->apod_ingresos                                                            , $this->apod_Carrera,$this->apod_Semestre
            ,$this->apod_Turno, $this->apod_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarregApoderado(int $apod_Id)
    {
        $return = "";
        $this->apod_Id = $apod_Id;
        $query = "UPDATE regApoderado SET apod_estado = 0 WHERE apod_Id=?";
        $data = array($this->apod_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarregApoderado(int $apod_Id)
    {
        $return = "";
        $this->apod_Id = $apod_Id;
        $query = "UPDATE regApoderado SET apod_estado = 1 WHERE apod_Id=?";
        $data = array($this->apod_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>