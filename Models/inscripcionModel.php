<?php
class inscripcionModel extends Mysql{
    public  $ins_Id, $reg_Id, $id, $ins_fecha , $s_Id, $ins_Infantil, $cat_id,$id_Gestion;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectinscripcion()
    {
        $sql = "SELECT * FROM ((((inscripcion inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join salas on inscripcion.s_Id=salas.s_Id)inner join usuarios on inscripcion.id=usuarios.id)inner join catpago on inscripcion.cat_id=catpago.cat_id)inner join gestion on inscripcion.id_Gestion=gestion.id_Gestion WHERE ins_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectsalas()
    {
        $sql = "SELECT * FROM salas WHERE s_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectpadres()
    {
        $sql = "SELECT * FROM regapoderado WHERE apod_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectcontacto()
    {
        $sql = "SELECT * FROM regcontacto WHERE con_Estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectdocumento()
    {
        $sql = "SELECT * FROM documentos WHERE docu_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectcatpago()
    {
        $sql = "SELECT * FROM catpago inner join gestion on catpago.id_Gestion=gestion.id_Gestion WHERE cat_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
     public function selectgestion()
    {
        $sql = "SELECT * FROM gestion WHERE ges_estado= 1";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectinscripcionInactivos()
    {
        $sql = "SELECT * FROM ((((inscripcion inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join salas on inscripcion.s_Id=salas.s_Id)inner join usuarios on inscripcion.id=usuarios.id)inner join catpago on inscripcion.cat_id=catpago.cat_id)inner join gestion on inscripcion.id_Gestion=gestion.id_Gestion  WHERE ins_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $ins_fecha)
    {
        $this->ins_fecha = $ins_fecha;
        $sql = "SELECT * FROM inscripcion WHERE ins_fecha = $this->ins_fecha AND ins_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarinscripcion( int $reg_Id,int $id,String $ins_fecha, int $s_Id,int $cat_id,int $id_Gestion,String $ins_Infantil)
    {
        $return = "";
        
        $this->reg_Id = $reg_Id;
        $this->id = $id;
        $this->ins_fecha = $ins_fecha;
        $this->s_Id = $s_Id;
        $this->cat_id = $cat_id;
        $this->id_Gestion = $id_Gestion;
        $this->ins_Infantil = $ins_Infantil;     
        
        
        $sql = "SELECT * FROM inscripcion WHERE ins_fecha = '{$this->ins_fecha}' AND s_Id = '{$this->s_Id}' AND id_Gestion ='{$this->id_Gestion}'AND cat_id ='{$this->cat_id}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  inscripcion(reg_Id,id, ins_fecha,s_Id,cat_id, id_Gestion, ins_Infantil) VALUES (?,?,?,?,?,?,?)";
            $data = array($this->reg_Id,$this->id,$this->ins_fecha, $this->s_Id,$this->cat_id,$this->id_Gestion,$this->ins_Infantil);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    // exponer proyecto
    public function editarinscripcion(int $ins_Id)
    {
        $this->ins_Id = $ins_Id;
        $sql = "SELECT * FROM inscripcion WHERE ins_Id = '{$this->ins_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    
    public function actualizarinscripcion(int $reg_Id,String $ins_fecha, int $s_Id,int $cat_id,int $id_Gestion,String $ins_Infantil,int $ins_Id)
    {
        $return = "";
        
        $this->reg_Id = $reg_Id;
        $this->ins_fecha = $ins_fecha;
        $this->s_Id = $s_Id;
        $this->cat_id = $cat_id;
        $this->id_Gestion = $id_Gestion;
        $this->ins_Infantil = $ins_Infantil;                 
        $this->ins_Id = $ins_Id;
        $query = "UPDATE inscripcion SET reg_Id=?,ins_fecha = ?, s_Id = ?,cat_id=?,id_Gestion = ?,ins_Infantil = ? WHERE ins_Id = ?";
        $data = array($this->reg_Id,$this->ins_fecha, $this->s_Id,$this->cat_id,$this->id_Gestion, $this->ins_Infantil,$this->ins_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarinscripcion(int $ins_Id)
    {
        $return = "";
        $this->ins_Id = $ins_Id;
        $query = "UPDATE inscripcion SET ins_estado = 0 WHERE ins_Id=?";
        $data = array($this->ins_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarinscripcion(int $ins_Id)
    {
        $return = "";
        $this->ins_Id = $ins_Id;
        $query = "UPDATE inscripcion SET ins_estado = 1 WHERE ins_Id=?";
        $data = array($this->ins_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }


    public function reporteInscripcion1(int $ins_Id, int $id_Gestion)
    {
        $sql = "SELECT * FROM ((((((((inscripcion left join regninos on inscripcion.reg_Id=regninos.reg_Id)left join salas on inscripcion.s_Id=salas.s_Id)left join usuarios on inscripcion.id=usuarios.id)left join historial on inscripcion.ins_Id=historial.ins_Id)left join regapoderado on regninos.reg_Id=regapoderado.reg_Id)left join regcontacto on regninos.reg_Id=regcontacto.reg_Id)left join catpago on inscripcion.cat_id=catpago.cat_id)left join gestion on inscripcion.id_Gestion=gestion.id_Gestion)left join documentos on inscripcion.ins_Id=documentos.ins_Id WHERE inscripcion.ins_Id = '$ins_Id' AND inscripcion.id_Gestion = '$id_Gestion'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function reporteInscripcionGeneral()
    {
        $sql = "SELECT * FROM ((((((((inscripcion left join regninos on inscripcion.reg_Id=regninos.reg_Id)left join salas on inscripcion.s_Id=salas.s_Id)left join usuarios on inscripcion.id=usuarios.id)left join historial on inscripcion.ins_Id=historial.ins_Id)left join regapoderado on regninos.reg_Id=regapoderado.reg_Id)left join regcontacto on regninos.reg_Id=regcontacto.reg_Id)left join catpago on inscripcion.cat_id=catpago.cat_id)left join gestion on inscripcion.id_Gestion=gestion.id_Gestion)left join documentos on inscripcion.ins_Id=documentos.ins_Id  WHERE inscripcion.ins_estado = 1 ";
        $res = $this->select_all($sql);
        return $res;
    }
    public function reporteInscripcionGestion(int $id_Gestion)
    {
        $sql = "SELECT * FROM ((((((((inscripcion left join regninos on inscripcion.reg_Id=regninos.reg_Id)left join salas on inscripcion.s_Id=salas.s_Id)left join usuarios on inscripcion.id=usuarios.id)left join historial on inscripcion.ins_Id=historial.ins_Id)left join regapoderado on regninos.reg_Id=regapoderado.reg_Id)left join regcontacto on regninos.reg_Id=regcontacto.reg_Id)left join catpago on inscripcion.cat_id=catpago.cat_id)left join gestion on inscripcion.id_Gestion=gestion.id_Gestion)left join documentos on inscripcion.ins_Id=documentos.ins_Id  WHERE inscripcion.id_Gestion = '$id_Gestion'";
        $res = $this->select_all($sql);
        return $res;            
    }
}
?>