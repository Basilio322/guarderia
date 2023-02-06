<?php
class gestionModel extends Mysql{
    public  $ges_anio, $ges_mensualidad,$ges_observaciones;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectgestion()
    {
        $sql = "SELECT * FROM gestion WHERE ges_estado= 1";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectgestionInactivos()
    {
        $sql = "SELECT * FROM gestion WHERE ges_estado= 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function Buscargestion(string $ges_anio)
    {
        $this->ges_anio = $ges_anio;
        $sql = "SELECT * FROM gestion WHERE ges_anio = $this->ges_anio AND ges_estado= 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertargestion( String $ges_anio, String $ges_mensualidad, String $ges_observaciones)
    {
        $return = "";
        
      
        $this->ges_anio = $ges_anio;
        $this->ges_mensualidad = $ges_mensualidad;
        $this->ges_observaciones = $ges_observaciones;        
        
        $sql = "SELECT * FROM gestion WHERE ges_anio = '{$this->ges_anio}' AND ges_observaciones = '{$this->ges_observaciones}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  gestion(ges_anio,ges_mensualidad,ges_observaciones) VALUES (?,?,?)";
            $data = array($this->ges_anio, $this->ges_mensualidad,$this->ges_observaciones);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editargestion(int $id_Gestion)
    {
        $this->id_Gestion = $id_Gestion;
        $sql = "SELECT * FROM gestion WHERE id_Gestion = '{$this->id_Gestion}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizargestion(String $ges_anio, String $ges_mensualidad, String $ges_observaciones, int $id_Gestion)
    {
        $return = "";
        
        
        $this->ges_anio = $ges_anio;
        $this->ges_mensualidad = $ges_mensualidad;
        $this->ges_observaciones = $ges_observaciones;        
        $this->id_Gestion = $id_Gestion;

        $query = "UPDATE gestion SET ges_anio = ?, ges_mensualidad = ?, ges_observaciones = ?WHERE id_Gestion = ?";
        $data = array($this->ges_anio, $this->ges_mensualidad,$this->ges_observaciones, $this->id_Gestion);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminargestion(int $id_Gestion)
    {
        $return = "";
        $this->id_Gestion = $id_Gestion;
        $query = "UPDATE gestion SET ges_estado= 0 WHERE id_Gestion=?";
        $data = array($this->id_Gestion);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresargestion(int $id_Gestion)
    {
        $return = "";
        $this->id_Gestion = $id_Gestion;
        $query = "UPDATE gestion SET ges_estado= 1 WHERE id_Gestion=?";
        $data = array($this->id_Gestion);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>