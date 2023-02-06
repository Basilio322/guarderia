<?php
class salasModel extends Mysql{
    public $s_Id, $s_nombre, $s_descripcion;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectsalas()
    {
        $sql = "SELECT * FROM salas WHERE s_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectsalasInactivos()
    {
        $sql = "SELECT * FROM salas WHERE s_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $s_nombre)
    {
        $this->s_nombre = $s_nombre;
        $sql = "SELECT * FROM salas WHERE s_nombre = $this->s_nombre AND s_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarsalas( string $s_nombre, string $s_descripcion)
    {
        $return = "";
        
        $this->s_nombre = $s_nombre;
        $this->s_descripcion = $s_descripcion;
     
        $sql = "SELECT * FROM salas WHERE s_nombre = '{$this->s_nombre}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO salas(s_nombre, s_descripcion) VALUES (?,?)";
            $data = array($this->s_nombre, $this->s_descripcion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarsalas(int $s_Id)
    {
        $this->s_Id = $s_Id;
        $sql = "SELECT * FROM salas WHERE s_Id = '{$this->s_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarsalas(string $s_nombre, string $s_descripcion,  int $s_Id)
    {
        $return = "";
        
        $this->s_nombre = $s_nombre;
        $this->s_descripcion = $s_descripcion;       
        $this->s_Id = $s_Id;
        $query = "UPDATE salas SET  s_nombre=?, s_descripcion=? WHERE s_Id=?";
        $data = array($this->s_nombre, $this->s_descripcion, $this->s_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarsalas(int $s_Id)
    {
        $return = "";
        $this->s_Id = $s_Id;
        $query = "UPDATE salas SET s_estado = 0 WHERE s_Id=?";
        $data = array($this->s_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarsalas(int $s_Id)
    {
        $return = "";
        $this->s_Id = $s_Id;
        $query = "UPDATE salas SET s_estado = 1 WHERE s_Id=?";
        $data = array($this->s_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>