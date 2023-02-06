<?php
class historialModel extends Mysql{
    public  $his_Id,$his_Peso, $his_Talla,$his_Fecha,$his_Otros,$his_ControlN;
    public function __construct()
    {
        parent::__construct();
    }
    public function selecthistorial()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 order by historial.his_Id DESC";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selecthistorial1()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Primer Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selecthistorial2()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Segundo Control'";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selecthistorial3()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Tercer Control'";
        $res = $this->select_all($sql);
        return $res;
    }    public function selecthistorial4()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Cuarto Control'";
        $res = $this->select_all($sql);
        return $res;
    }  
     public function selecthistorial5()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Quinto Control'";
        $res = $this->select_all($sql);
        return $res;
    }
        public function selecthistorial6()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Sexto Control'";
        $res = $this->select_all($sql);
        return $res;
    }
        public function selecthistorial7()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Septimo Control'";
        $res = $this->select_all($sql);
        return $res;
    }
        public function selecthistorial8()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Octavo Control'";
        $res = $this->select_all($sql);
        return $res;
    }   
     public function selecthistorial9()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Noveno Control'";
        $res = $this->select_all($sql);
        return $res;
    }
        public function selecthistorial10()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 1 AND historial.his_ControlN='Decimo Control'";
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


    public function selecthistorialInactivos()
    {
        $sql = "SELECT * FROM (historial inner join inscripcion on historial.ins_Id=inscripcion.ins_Id)inner join regninos on inscripcion.reg_Id=regninos.reg_Id WHERE his_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function BuscarCliente(string $his_Peso1)
    {
        $this->his_Peso1 = $his_Peso1;
        $sql = "SELECT * FROM historial WHERE his_Peso1 = $this->his_Peso1 AND his_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarhistorial(int $ins_Id,String $his_Peso,String $his_Talla,String $his_Fecha,String $his_Otros, String $his_ControlN)
    {
        $return = "";
        
        $this->ins_Id = $ins_Id;
        $this->his_Peso= $his_Peso;
        $this->his_Talla= $his_Talla;
        $this->his_Fecha= $his_Fecha;
        $this->his_Otros= $his_Otros;
        $this->his_ControlN=$his_ControlN;
        $sql = "SELECT * FROM historial WHERE his_ControlN ='{$this->his_ControlN}' and ins_Id ='{$this->ins_Id}'";
        // //$sql = "SELECT * FROM historial WHERE his_estado = 0";
         $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  historial(ins_Id,his_Peso,his_Talla,his_Fecha,his_Otros,his_ControlN) VALUES (?,?,?,?,?,?)";
            $data = array($this->ins_Id,$this->his_Peso,$this->his_Talla,$this->his_Fecha,$this->his_Otros,$this->his_ControlN);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }

    public function editarhistorial(int $his_Id)
    {
        $this->his_Id = $his_Id;
        $sql = "SELECT * FROM historial WHERE his_Id = '{$this->his_Id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarhistorial(String $his_Peso,String $his_Talla,String $his_Fecha,String $his_Otros, int $his_Id)
    {
        $return = "";
        
        
        
        $this->his_Peso= $his_Peso;
        $this->his_Talla= $his_Talla;
        $this->his_Fecha= $his_Fecha;
        $this->his_Otros= $his_Otros;
        
        $this->his_Id = $his_Id;
        $query = "UPDATE historial SET his_Peso=?, his_Talla=?, his_Fecha=?, his_Otros=? WHERE his_Id = ?";
        $data = array($this->his_Peso,$this->his_Talla,$this->his_Fecha,$this->his_Otros, $this->his_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarhistorial(int $his_Id)
    {
        $return = "";
        $this->his_Id = $his_Id;
        $query = "UPDATE historial SET his_estado = 0 WHERE his_Id=?";
        $data = array($this->his_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarhistorial(int $his_Id)
    {
        $return = "";
        $this->his_Id = $his_Id;
        $query = "UPDATE historial SET his_estado = 1 WHERE his_Id=?";
        $data = array($this->his_Id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>