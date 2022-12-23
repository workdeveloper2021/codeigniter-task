<?php 
class ProjectModel extends CI_Model {

//Insert Query
public function insert($table,$data){
   $sql = $this->db->insert($table,$data);
    if ($sql) {
        return true;
    }else{
        return false;
    }
}

//Select With Where Query
public function select_with_where($table,$data,$where){
   $sql = $this->db->select($data)
            ->where($where)
            ->get($table);

                if ($sql) {
                    return $sql->result_array();
                }else{
                    return $sql->result_array();
                }
}
}
?>