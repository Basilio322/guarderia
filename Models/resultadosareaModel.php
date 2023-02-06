<?php
class resultadosareaModel extends Mysql{
    public $res_Id, $ins_Id,$res_FechaCon,$res_canMeses, $res_mGruesa,$res_mFina, $res_AudyLeng,$res_PerySocial,$res_Total,$res_Observacion,$res_controlN,$reg_FechaNac;
    
    public function __construct()
    {
        parent::__construct();
    }
    public function selectresultadosarea()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectsalas()
    {
        $sql = "SELECT * FROM salas WHERE s_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
     public function selectresultadosarea1()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Primer Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea2()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Segundo Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea3()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Tercer Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea4()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Cuarto Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea5()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Quinto Control'";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectresultadosarea6()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Sexto Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea7()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Septimo Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea8()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Octavo Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea9()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Noveno Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea10()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_estado = 1 AND res_controlN='Decimo Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado  = 1";
        $res = $this->select_all($sql);
        return $res;
    }
   
    public function selectinscripcion()
    {
        $sql = "SELECT * FROM ((inscripcion inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join salas on inscripcion.s_Id=salas.s_Id)inner join usuarios on inscripcion.id=usuarios.id WHERE ins_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosareaInactivos()
    {
        $sql = "SELECT * FROM (resultadosarea inner join inscripcion  on resultadosarea.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE resultadosarea.res_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $res_FechaCon)
    {
        $this->res_FechaCon = $res_FechaCon;
        $sql = "SELECT * FROM resultadosarea WHERE res_FechaCon = $this->res_FechaCon AND res_Estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function buscarNacimiento(string $reg_FechaNac)
    {
        $this->reg_FechaNac = $reg_FechaNac;
        $sql = "SELECT regninos.reg_FechaNac FROM regninos left join inscripcion on inscripcion.reg_Id=regninos.reg_Id WHERE regninos.reg_FechaNac = $this->reg_FechaNac";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarresultadosarea(int $ins_Id, String $res_FechaCon,String $res_canMeses, String $res_mGruesa, String $res_mFina, 
    String $res_AudyLeng, String $res_PerySocial, String $res_Total, String $res_Observacion, String $res_controlN)
    {
        $return = "";
        
        $this->ins_Id=$ins_Id;        
        $this->res_FechaCon=$res_FechaCon;
        $this->res_canMeses=$res_canMeses;
        $this->res_mGruesa=$res_mGruesa;
        $this->res_mFina=$res_mFina;
        $this->res_AudyLeng=$res_AudyLeng;
        $this->res_PerySocial=$res_PerySocial;
        $this->res_Total=$res_Total;
        $this->res_Observacion=$res_Observacion;
        $this->res_controlN=$res_controlN;
        $sql = "SELECT * FROM resultadosarea WHERE ins_Id = '{$this->ins_Id}' AND res_controlN = '{$this->res_controlN}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO resultadosarea(ins_Id, res_FechaCon, res_canMeses, res_mGruesa, res_mFina,res_AudyLeng,res_PerySocial,res_Total,res_Observacion, res_controlN) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $data = array($this->ins_Id, $this->res_FechaCon, $this->res_canMeses, $this->res_mGruesa,$this->res_mFina, $this->res_AudyLeng,$this->res_PerySocial,$this->res_Total,$this->res_Observacion,$this->res_controlN);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarresultadosarea(int $res_Id)
    {
        $this->res_Id = $res_Id;
        $sql = "SELECT * FROM resultadosarea WHERE res_Id = '{$this->res_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarresultadosarea(string $res_FechaCon,String $res_canMeses, string $res_mGruesa, string $res_mFina, string $res_AudyLeng,string $res_PerySocial, string $res_Total,string $res_Observacion, String $res_controlN,int $res_Id)
    {
        $return = "";
        
        $this->res_FechaCon = $res_FechaCon;
        $this->res_canMeses = $res_canMeses;
        $this->res_mGruesa = $res_mGruesa;
        $this->res_mFina = $res_mFina;
        $this->res_AudyLeng = $res_AudyLeng;
        $this->res_PerySocial = $res_PerySocial;
        $this->res_Total = $res_Total;
        $this->res_Observacion = $res_Observacion;
        $this->res_controlN = $res_controlN;
        $this->res_Id = $res_Id;
        $query = "UPDATE resultadosarea SET  res_FechaCon=?,res_canMeses=?, res_mGruesa=?,res_mFina=?, res_AudyLeng=?,res_PerySocial=?, res_Total=?, res_Observacion=?, res_controlN=? WHERE res_Id=?";
        $data = array($this->res_FechaCon,$this->res_canMeses, $this->res_mGruesa,$this->res_mFina, $this->res_AudyLeng,$this->res_PerySocial,$this->res_Total,$this->res_Observacion,$this->res_controlN, $this->res_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarresultadosarea(int $res_Id)
    {
        $return = "";
        $this->res_Id = $res_Id;
        $query = "UPDATE resultadosarea SET res_estado = 0 WHERE res_Id=?";
        $data = array($this->res_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarresultadosarea(int $res_Id)
    {
        $return = "";
        $this->res_Id = $res_Id;
        $query = "UPDATE resultadosarea SET res_estado = 1 WHERE res_Id=?";
        $data = array($this->res_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>