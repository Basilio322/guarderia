<?php
class regNinosModel extends Mysql{
    public $reg_Id, $reg_Nombres, $reg_Paterno,$reg_Materno, $reg_Genero,$reg_FechaNac;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectregNinos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectregNinosInactivos()
    {
        $sql = "SELECT * FROM regninos WHERE reg_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $reg_Nombres)
    {
        $this->reg_Nombres = $reg_Nombres;
        $sql = "SELECT * FROM regninos WHERE reg_reg_Nombress = $this->reg_Nombres AND reg_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarregNinos( string $reg_Nombres, string $reg_Paterno,string $reg_Materno, string $reg_Genero, string $reg_FechaNac)
    {
        $return = "";
        
        $this->reg_Nombres = $reg_Nombres;
        $this->reg_Paterno = $reg_Paterno;
        $this->reg_Materno = $reg_Materno;
        $this->reg_Genero = $reg_Genero;
        $this->reg_FechaNac = $reg_FechaNac;
        $sql = "SELECT * FROM regninos WHERE reg_Nombres = '{$this->reg_Nombres}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO regNinos(reg_Nombres, reg_Paterno, reg_Materno, reg_Genero, reg_FechaNac) VALUES (?,?,?,?,?)";
            $data = array($this->reg_Nombres, $this->reg_Paterno,$this->reg_Materno, $this->reg_Genero, $this->reg_FechaNac,);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarregNinos(int $reg_Id)
    {
        $this->reg_Id = $reg_Id;
        $sql = "SELECT * FROM regninos WHERE reg_Id = '{$this->reg_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarregNinos(string $reg_Nombres, string $reg_Paterno, string $reg_Materno, string $reg_Genero, string $reg_FechaNac, int $reg_Id)
    {
        $return = "";
        
        $this->reg_Nombres = $reg_Nombres;
        $this->reg_Paterno = $reg_Paterno;
        $this->reg_Materno = $reg_Materno;
        $this->reg_Genero = $reg_Genero;
        $this->reg_FechaNac = $reg_FechaNac;
        $this->reg_Id = $reg_Id;
        $query = "UPDATE regninos SET  reg_Nombres=?, reg_Paterno=?,reg_Materno=?, reg_Genero=?, reg_FechaNac=? WHERE reg_Id=?";
        $data = array($this->reg_Nombres, $this->reg_Paterno,$this->reg_Materno, $this->reg_Genero,$this->reg_FechaNac, $this->reg_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarregNinos(int $reg_Id)
    {
        $return = "";
        $this->reg_Id = $reg_Id;
        $query = "UPDATE regninos SET reg_estado = 0 WHERE reg_Id=?";
        $data = array($this->reg_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarregNinos(int $reg_Id)
    {
        $return = "";
        $this->reg_Id = $reg_Id;
        $query = "UPDATE regninos SET reg_estado = 1 WHERE reg_Id=?";
        $data = array($this->reg_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    
}
?>