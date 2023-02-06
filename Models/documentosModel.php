<?php
class documentosModel extends Mysql{
    public  $docu_id, $ins_Id, $docu_ci, $docu_cinum,$docu_certificado,$docu_ss,$docu_ciVacu,$docu_disc;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectdocumentos()
    {
        $sql = "SELECT * FROM (documentos inner join inscripcion on documentos.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE docu_estado = 1";
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
        $sql = "SELECT * FROM (inscripcion inner join regninos on inscripcion.reg_Id=regninos.reg_Id)inner join salas on inscripcion.s_Id=salas.s_Id WHERE ins_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }


    public function selectdocumentosInactivos()
    {
        $sql = "SELECT * FROM (documentos inner join inscripcion on documentos.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE docu_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarDocumentos(string $docu_ci)
    {
        $this->docu_ci = $docu_ci;
        $sql = "SELECT * FROM documentos WHERE docu_ci = $this->docu_ci AND docu_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertardocumentos(int $ins_Id,String $docu_ci,String $docu_cinum,String $docu_certificado,String $docu_ss, String $docu_ciVacu, String $docu_disc)
    {
        $return = "";
        
        $this->ins_Id = $ins_Id;
        $this->docu_ci= $docu_ci;
        $this->docu_cinum= $docu_cinum;
        $this->docu_certificado= $docu_certificado;
        $this->docu_ss= $docu_ss;
        $this->docu_ciVacu=$docu_ciVacu;
        $this->docu_disc=$docu_disc;
        $sql = "SELECT * FROM documentos WHERE docu_ciVacu ='{$this->docu_ciVacu}' and ins_Id ='{$this->ins_Id}'";
        // //$sql = "SELECT * FROM documentos WHERE docu_estado = 0";
         $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  documentos(ins_Id, docu_ci, docu_cinum, docu_certificado, docu_ss, docu_ciVacu, docu_disc) VALUES (?,?,?,?,?,?,?)";
            $data = array($this->ins_Id,$this->docu_ci,$this->docu_cinum,$this->docu_certificado,$this->docu_ss,$this->docu_ciVacu,$this->docu_disc);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    public function editardocumentos(int $docu_id)
    {
        $this->docu_id = $docu_id;
        $sql = "SELECT * FROM documentos WHERE docu_id = '{$this->docu_id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizardocumentos(String $docu_ci,String $docu_cinum,String $docu_certificado,String $docu_ss, String $docu_ciVacu, String $docu_disc,int $docu_id)
    {
        $return = "";
        
        
        
        
        $this->docu_ci= $docu_ci;
        $this->docu_cinum= $docu_cinum;
        $this->docu_certificado= $docu_certificado;
        $this->docu_ss= $docu_ss;
        $this->docu_ciVacu=$docu_ciVacu;
        $this->docu_disc=$docu_disc;
        
        $this->docu_id = $docu_id;
        $query = "UPDATE documentos SET docu_ci=?, docu_cinum=?, docu_certificado=?, docu_ss=?,docu_ciVacu=?, docu_disc=? WHERE docu_id = ?";
        $data = array($this->docu_ci,$this->docu_cinum,$this->docu_certificado,$this->docu_ss, $this->docu_ciVacu,$this->docu_disc,$this->docu_id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminardocumentos(int $docu_id)
    {
        $return = "";
        $this->docu_id = $docu_id;
        $query = "UPDATE documentos SET docu_estado = 0 WHERE docu_id=?";
        $data = array($this->docu_id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresardocumentos(int $docu_id)
    {
        $return = "";
        $this->docu_id = $docu_id;
        $query = "UPDATE documentos SET docu_estado = 1 WHERE docu_id=?";
        $data = array($this->docu_id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>