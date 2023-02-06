<?php
class docenteModel extends Mysql{
    public  $doc_Id, $reg_Id, $doc_Nombres , $doc_Paterno, $doc_Materno, $doc_Telefono,$doc_Email , $doc_Direccion ,$doc_Profesion, $doc_instProv,$doc_Contrato,$s_Id;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectdocente()
    {
        $sql = "SELECT * FROM docente inner join salas on docente.s_Id=salas.s_Id WHERE doc_Estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectsala()
    {
        $sql = "SELECT * FROM salas WHERE s_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }



    public function selectdocenteInactivos()
    {
        $sql = "SELECT * FROM docente inner join salas on docente.s_Id=salas.s_Id WHERE doc_Estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function Buscardocente(string $doc_Nombres)
    {
        $this->doc_Nombres = $doc_Nombres;
        $sql = "SELECT * FROM docente WHERE doc_Nombres = $this->doc_Nombres AND doc_Estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertardocente( String $doc_Nombres, String $doc_Paterno, String $doc_Materno,String $doc_Telefono,String $doc_Email,
                                            String $doc_Direccion, String $doc_Profesion,String $doc_instProv,String $doc_Contrato, String $s_Id,)
    {
        $return = "";
        
      
        $this->doc_Nombres = $doc_Nombres;
        $this->doc_Paterno = $doc_Paterno;
        $this->doc_Materno = $doc_Materno;
        $this->doc_Telefono = $doc_Telefono;
        $this->doc_Email = $doc_Email;     
        $this->doc_Direccion = $doc_Direccion;    
        $this->doc_Profesion = $doc_Profesion;    
        $this->doc_instProv = $doc_instProv; 
        $this->doc_Contrato = $doc_Contrato;    
            
        $this->s_Id = $s_Id;
        
        $sql = "SELECT * FROM docente WHERE doc_Nombres = '{$this->doc_Nombres}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  docente(doc_Nombres,doc_Paterno,doc_Materno, doc_Telefono, doc_Email,doc_Direccion,doc_Profesion,doc_instProv,doc_Contrato,s_Id) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $data = array($this->doc_Nombres, $this->doc_Paterno,$this->doc_Materno,$this->doc_Telefono,$this->doc_Email,$this->doc_Direccion,$this->doc_Profesion,$this->doc_instProv,$this->doc_Contrato,$this->s_Id,);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editardocente(int $doc_Id)
    {
        $this->doc_Id = $doc_Id;
        $sql = "SELECT * FROM docente WHERE doc_Id = '{$this->doc_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizardocente(String $doc_Nombres, String $doc_Paterno, String $doc_Materno,String $doc_Telefono, String $doc_Email, 
    String $doc_Direccion, String $doc_Profesion,String $doc_instProv,String $doc_Contrato,String $s_Id,int $doc_Id)
    {
        $return = "";
        
        
        $this->doc_Nombres = $doc_Nombres;
        $this->doc_Paterno = $doc_Paterno;
        $this->doc_Materno = $doc_Materno;
        $this->doc_Telefono = $doc_Telefono;
        $this->doc_Email = $doc_Email;
        $this->doc_Direccion = $doc_Direccion;           
        $this->doc_Profesion = $doc_Profesion;  
        $this->doc_instProv = $doc_instProv;
        $this->doc_Contrato = $doc_Contrato;
        $this->s_Id = $s_Id;    
        $this->doc_Id = $doc_Id;
        $query = "UPDATE docente SET doc_Nombres = ?, doc_Paterno = ?,doc_Materno = ?,doc_Telefono = ?,doc_Email = ?,
        doc_Direccion = ?, doc_Profesion=?, doc_instProv=?,doc_Contrato=?,s_Id = ? WHERE doc_Id = ?";
        $data = array($this->doc_Nombres, $this->doc_Paterno,$this->doc_Materno, $this->doc_Telefono, $this->doc_Email,
           $this->doc_Direccion,$this->doc_Profesion,$this->doc_instProv,$this->doc_Contrato,$this->s_Id,$this->doc_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminardocente(int $doc_Id)
    {
        $return = "";
        $this->doc_Id = $doc_Id;
        $query = "UPDATE docente SET doc_Estado = 0 WHERE doc_Id=?";
        $data = array($this->doc_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresardocente(int $doc_Id)
    {
        $return = "";
        $this->doc_Id = $doc_Id;
        $query = "UPDATE docente SET doc_Estado = 1 WHERE doc_Id=?";
        $data = array($this->doc_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>