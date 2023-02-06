<?php
class catpagoModel extends Mysql{
    public  $cat_id, $cat_nombre , $cat_descripcion, $cat_monto, $id_gestion;
    public function __construct()
    {
        parent::__construct();
    }
    public function selectcatpago()
    {
        $sql = "SELECT * FROM catpago inner join gestion on catpago.id_Gestion=gestion.id_Gestion WHERE cat_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }
    public function selectgestion()
    {
        $sql = "SELECT * FROM gestion WHERE ges_estado = 1";
        $res = $this->select_all($sql);
        return $res;
    }



    public function selectcatpagoInactivos()
    {
        $sql = "SELECT * FROM catpago inner join gestion on catpago.id_Gestion=gestion.id_Gestion WHERE cat_estado = 0";
        $res = $this->select_all($sql);
        return $res;
    }
    public function Buscarcatpago(string $cat_nombre)
    {
        $this->cat_nombre = $cat_nombre;
        $sql = "SELECT * FROM catpago WHERE cat_nombre = $this->cat_nombre AND cat_estado = 1";
        $res = $this->select($sql);
        return $res;
    }
    public function insertarcatpago( String $cat_nombre, String $cat_descripcion, String $cat_monto,String $id_Gestion)
    {
        $return = "";
        
      
        $this->cat_nombre = $cat_nombre;
        $this->cat_descripcion = $cat_descripcion;
        $this->cat_monto = $cat_monto;                       
        $this->id_Gestion = $id_Gestion;
        
        $sql = "SELECT * FROM catpago WHERE cat_nombre = '{$this->cat_nombre}'and cat_descripcion = '{$this->cat_descripcion}' and cat_monto = '{$this->cat_monto}'";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  catpago(cat_nombre,cat_descripcion,cat_monto, id_Gestion) VALUES (?,?,?,?)";
            $data = array($this->cat_nombre, $this->cat_descripcion,$this->cat_monto,$this->id_Gestion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        return $return;
    }
    public function editarcatpago(int $cat_id)
    {
        $this->cat_id = $cat_id;
        $sql = "SELECT * FROM catpago WHERE cat_id = '{$this->cat_id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarcatpago(String $cat_nombre, String $cat_descripcion, String $cat_monto,String $id_Gestion,int $cat_id)
    {
        $return = "";
        
        
        $this->cat_nombre = $cat_nombre;
        $this->cat_descripcion = $cat_descripcion;
        $this->cat_monto = $cat_monto;       
        $this->id_Gestion = $id_Gestion;    

        $this->cat_id = $cat_id;
        $query = "UPDATE catpago SET cat_nombre = ?, cat_descripcion = ?,cat_monto = ?,id_Gestion = ? WHERE cat_id = ?";
        $data = array($this->cat_nombre, $this->cat_descripcion,$this->cat_monto, $this->id_Gestion,$this->cat_id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function eliminarcatpago(int $cat_id)
    {
        $return = "";
        $this->cat_id = $cat_id;
        $query = "UPDATE catpago SET cat_estado = 0 WHERE cat_id=?";
        $data = array($this->cat_id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
    public function reingresarcatpago(int $cat_id)
    {
        $return = "";
        $this->cat_id = $cat_id;
        $query = "UPDATE catpago SET cat_estado = 1 WHERE cat_id=?";
        $data = array($this->cat_id);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }
}
?>