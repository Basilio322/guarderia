<?php
class resultadosareaModel extends Mysql{
    public $res_Id1, $res_FechaCon1, $res_mGruesa1,$res_mFina1, $res_AudyLeng1,$res_Total1;
    public $res_Id2, $res_FechaCon2, $res_mGruesa2,$res_mFina2, $res_AudyLeng2,$res_Total2;
    public $res_Id3, $res_FechaCon3, $res_mGruesa3,$res_mFina3, $res_AudyLeng3,$res_Total3;
    public $res_Id4, $res_FechaCon4, $res_mGruesa4,$res_mFina4, $res_AudyLeng4,$res_Total4;
    public $res_Id5, $res_FechaCon5, $res_mGruesa5,$res_mFina5, $res_AudyLeng5,$res_Total5;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectresultadosarea()
    {
        $sql = "SELECT * FROM (resultadosarea1 inner join inscripcion  on resultadosarea1.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_Estado1 = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea2()
    {
        $sql = "SELECT * FROM (resultadosarea2 inner join inscripcion  on resultadosarea2.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_Estado2 = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea3()
    {
        $sql = "SELECT * FROM (resultadosarea3 inner join inscripcion  on resultadosarea3.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_Estado3 = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea4()
    {
        $sql = "SELECT * FROM (resultadosarea4 inner join inscripcion  on resultadosarea4.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_Estado4 = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectresultadosarea5()
    {
        $sql = "SELECT * FROM (resultadosarea5 inner join inscripcion  on resultadosarea5.ins_Id = inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id= regninos.reg_Id WHERE res_Estado5 = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 1";
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
        $sql = "SELECT * FROM (resultadosarea1 inner join inscripcion on resultadosarea1.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE resultadosarea1.res_Estado1 = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $res_FechaCon1)
    {
        $this->res_FechaCon1 = $res_FechaCon1;
        $sql = "SELECT * FROM resultadosarea1 WHERE res_FechaCon1 = $this->res_FechaCon1 AND res_Estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarresultadosarea( int $ins_Id)
    {
        $return = "";
        
        $this->ins_Id=$ins_Id;
        $sql = "SELECT * FROM resultadosarea1 WHERE ins_Id = '{$this->ins_Id}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO resultadosarea1(ins_Id) VALUES (?)";
            $data = array($this->ins_Id);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarresultadosarea(int $res_Id1)
    {
        $this->res_Id1 = $res_Id1;
        $sql = "SELECT * FROM resultadosarea1 WHERE res_Id1 = '{$this->res_Id1}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarresultadosarea(string $res_FechaCon1, string $res_mGruesa1, string $res_mFina1, string $res_AudyLeng1,string $res_PerySocial1, string $res_Total1,string $res_Observacion1, int $res_Id1)
    {
        $return = "";
        
        $this->res_FechaCon1 = $res_FechaCon1;
        $this->res_mGruesa1 = $res_mGruesa1;
        $this->res_mFina1 = $res_mFina1;
        $this->res_AudyLeng1 = $res_AudyLeng1;
        $this->res_PerySocial1 = $res_PerySocial1;
        $this->res_Total1 = $res_Total1;
        $this->res_Observacion1 = $res_Observacion1;
        $this->res_Id1 = $res_Id1;
        $query = "UPDATE resultadosarea1 SET  res_FechaCon1=?, res_mGruesa1=?,res_mFina1=?, res_AudyLeng1=?,res_PerySocial1=?, res_Total1=?, res_Observacion1=? WHERE res_Id1=?";
        $data = array($this->res_FechaCon1, $this->res_mGruesa1,$this->res_mFina1, $this->res_AudyLeng1,$this->res_PerySocial1,$this->res_Total1,$this->res_Observacion1, $this->res_Id1);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarresultadosarea(int $res_Id1)
    {
        $return = "";
        $this->res_Id1 = $res_Id1;
        $query = "UPDATE resultadosarea1 SET res_Estado1 = 0 WHERE res_Id1=?";
        $data = array($this->res_Id1);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarresultadosarea(int $res_Id1)
    {
        $return = "";
        $this->res_Id1 = $res_Id1;
        $query = "UPDATE resultadosarea1 SET res_Estado1 = 1 WHERE res_Id1=?";
        $data = array($this->res_Id1);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>