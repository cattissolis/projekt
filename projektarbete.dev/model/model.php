<?php

class Model
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

   public function getAllDjur()
   {
       $get_stm = $this->db->prepare('SELECT * FROM `djur`');
       $get_stm->execute();
       $get_stm->setFetchMode(PDO:: FETCH_ASSOC);
       $djur = $get_stm->fetchAll();
       $djur = array_map(function($item) {
           $djur = new Djur($item['name'],$item['year'],$item['legs'],$item['type']);
           $djur->setId($item['id']);
        return $djur;
       }, $djur);
       return $djur; 
   }

    public function deleteById($id)
   {
       $get_stm = $this->db->prepare('DELETE FROM `djur` WHERE `id` = :id');
        $get_stm->bindParam(':id', $id);
        $result = $get_stm->execute();
        return $result;
   }

    public function createDjur($djur)
    {
        $get_stm = $this->db->prepare("INSERT INTO  `djur`(`name`, `year`,`legs`, `type`)  VALUES (:name, :year, :legs, :type)");     
        $success = $get_stm->execute([':name' => $djur->getName(), ':year' => $djur->getYear(), ':legs' => $djur->getLegs(), ':type' => $djur->getType()]);
        $id = $this->db->lastInsertID();
        $djur->setId($id);
        return $success;
    }
    
}


?>