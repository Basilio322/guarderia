<?php
class pensionesModel extends Mysql{
    public  $pen_Id, $ins_Id, $pen_Fecha, $pen_Monto ,$pen_Observacion, $pen_PagoN;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectpensiones()
    {
        $sql = "SELECT * FROM (((pensiones inner join inscripcion on pensiones.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join gestion on pensiones.id_Gestion=gestion.id_Gestion)inner join catpago on inscripcion.cat_id=catpago.cat_id WHERE pen_Estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    //SELECT * FROM (pensiones inner join gestion on pensiones.pen_id=gestion.id_Gestion)inner JOIN catpago on pensiones.cat_id=catpago.cat_id;
    public function selectinscripcion()
    {
        $sql = "SELECT * FROM ((inscripcion inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join salas on inscripcion.s_Id=salas.s_Id)inner join usuarios on inscripcion.id=usuarios.id WHERE ins_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectgestion()
    {
        $sql = "SELECT * FROM gestion WHERE ges_estado= 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectcatpago()
    {
        $sql = "SELECT * FROM catpago inner join gestion on catpago.id_Gestion=gestion.id_Gestion WHERE cat_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }



    public function selectpensionesInactivos()
    {
        $sql = "SELECT * FROM ((pensiones inner join inscripcion on pensiones.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join gestion on pensiones.id_Gestion=gestion.id_Gestion WHERE pen_Estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function Buscarpension(string $reg_Nombres)
    {
        $this->reg_Nombres = $reg_Nombres;
        $sql = "SELECT * FROM ((pensiones inner join inscripcion on pensiones.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join gestion on pensiones.id_Gestion=gestion.id_Gestion WHERE reg_Nombres = $this->reg_Nombres AND pen_Estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarpensiones(int $ins_Id, String $pen_Fecha,String $pen_PagoN, int $id_Gestion,String $pen_cuenta,String $pen_totalF,String $pen_Observacion)
    {
        $return = "";
        
        $this->ins_Id = $ins_Id;
        $this->pen_Fecha = $pen_Fecha;
        $this->pen_PagoN = $pen_PagoN;
        $this->id_Gestion = $id_Gestion;
        
        $this->pen_cuenta = $pen_cuenta;
        $this->pen_totalF = $pen_totalF;        
        $this->pen_Observacion = $pen_Observacion;
        
        
        $sql = "SELECT * FROM pensiones WHERE ins_Id = '{$this->ins_Id}' AND pen_PagoN = '{$this->pen_PagoN}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  pensiones(ins_Id,pen_Fecha,pen_PagoN, id_Gestion,pen_cuenta,pent_totalF,pen_Observacion) VALUES (?,?,?,?,?,?,?)";
            $data = array($this->ins_Id,$this->pen_Fecha,$this->pen_PagoN,$this->id_Gestion,$this->pen_cuenta,$this->pen_totalF,$this->pen_Observacion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarpensiones(int $pen_Id)
    {
        $this->pen_Id = $pen_Id;
        $sql = "SELECT * FROM pensiones WHERE pen_id = '{$this->pen_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarpensiones( String $pen_Fecha,String $pen_PagoN, int $id_Gestion,String $pen_cuenta,String $pen_totalF,String $pen_Observacion,int $pen_Id)
    {
        $return = "";        
        $this->pen_Fecha = $pen_Fecha;
        $this->pen_PagoN = $pen_PagoN;
        $this->id_Gestion = $id_Gestion;
    
        $this->pen_cuenta = $pen_cuenta;
        $this->pen_totalF = $pen_totalF;        
        $this->pen_Observacion = $pen_Observacion;     
        $this->pen_Id = $pen_Id;
        $query = "UPDATE pensiones SET pen_Fecha = ?,pen_PagoN = ?, id_Gestion=?, pen_cuenta=?,pen_totalF=?,pen_Observacion = ? WHERE pen_id = ?";
        $data = array($this->pen_Fecha,$this->pen_PagoN,$this->id_Gestion,$this->pen_cuenta,$this->pen_totalF,$this->pen_Observacion,$this->pen_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarpensiones(int $pen_Id)
    {
        $return = "";
        $this->pen_Id = $pen_Id;
        $query = "UPDATE pensiones SET pen_Estado = 0 WHERE pen_id=?";
        $data = array($this->pen_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarpensiones(int $pen_Id)
    {
        $return = "";
        $this->pen_Id = $pen_Id;
        $query = "UPDATE pensiones SET pen_Estado = 1 WHERE pen_id=?";
        $data = array($this->pen_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>