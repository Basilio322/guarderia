<?php
class regcontactoModel extends Mysql{
    public  $con_Id, $reg_Id, $con_Nombres , $con_Paterno, $con_Materno, $con_Ci,$con_Celular , $con_Parentesco ,$con_Direccion;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectregcontacto()
    {
        $sql = "SELECT * FROM regcontacto inner join regninos on regcontacto.reg_Id=regninos.reg_Id WHERE con_Estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }



    public function selectregcontactoInactivos()
    {
        $sql = "SELECT * FROM regcontacto WHERE con_Estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $con_Nombres)
    {
        $this->con_Nombres = $con_Nombres;
        $sql = "SELECT * FROM regcontacto WHERE con_Nombres = $this->con_Nombres AND con_Estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarregcontacto( int $reg_Id,String $con_Nombres, String $con_Paterno, String $con_Materno,String $con_Ci,String $con_Celular,
                                            String $con_Parentesco,  String $con_Direccion,)
    {
        $return = "";
        
        $this->reg_Id = $reg_Id;
        $this->con_Nombres = $con_Nombres;
        $this->con_Paterno = $con_Paterno;
        $this->con_Materno = $con_Materno;
        $this->con_Ci = $con_Ci;
        $this->con_Celular = $con_Celular;     
        $this->con_Parentesco = $con_Parentesco;        
        $this->con_Direccion = $con_Direccion;
        
        $sql = "SELECT * FROM regcontacto WHERE con_Nombres = '{$this->con_Nombres}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  regcontacto(reg_Id, con_Nombres,con_Paterno,con_Materno, con_Ci,
                                                con_Parentesco,con_Celular,con_Direccion) VALUES (?,?,?,?,?,?,?,?)";
            $data = array($this->reg_Id,$this->con_Nombres, $this->con_Paterno,$this->con_Materno,$this->con_Ci,$this->con_Celular,$this->con_Parentesco,$this->con_Direccion,);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarregcontacto(int $con_Id)
    {
        $this->con_Id = $con_Id;
        $sql = "SELECT * FROM regcontacto WHERE con_Id = '{$this->con_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarregcontacto(int $reg_Id,String $con_Nombres, String $con_Paterno, String $con_Materno,String $con_Ci, String $con_Celular, 
    String $con_Parentesco, String $con_Direccion,int $con_Id)
    {
        $return = "";
        
        $this->reg_Id = $reg_Id;
        $this->con_Nombres = $con_Nombres;
        $this->con_Paterno = $con_Paterno;
        $this->con_Materno = $con_Materno;
        $this->con_Ci = $con_Ci;
        
        $this->con_Celular = $con_Celular;
        $this->con_Parentesco = $con_Parentesco;
        $this->con_Direccion = $con_Direccion;    
        $this->con_Id = $con_Id;
        $query = "UPDATE regcontacto SET reg_Id=?,con_Nombres = ?, con_Paterno = ?,con_Materno = ?,con_Ci = ?,con_Celular = ?,
        con_Parentesco = ?,con_Direccion = ? WHERE con_Id = ?";
        $data = array($this->reg_Id,$this->con_Nombres, $this->con_Paterno,$this->con_Materno, $this->con_Ci, $this->con_Celular,
           $this->con_Parentesco,$this->con_Direccion,$this->con_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarregcontacto(int $con_Id)
    {
        $return = "";
        $this->con_Id = $con_Id;
        $query = "UPDATE regcontacto SET con_Estado = 0 WHERE con_Id=?";
        $data = array($this->con_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarregcontacto(int $con_Id)
    {
        $return = "";
        $this->con_Id = $con_Id;
        $query = "UPDATE regcontacto SET con_Estado = 1 WHERE con_Id=?";
        $data = array($this->con_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>