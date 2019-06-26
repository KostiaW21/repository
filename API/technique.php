<?php
include 'connect.php';

class techniqueTable{
	//Выводит все данные из таблицы
	public function selectAll()
   {
   		$sql = "SELECT * FROM technique";
   		$db = Database::getConnection();
   		$result = $db->query($sql);
		  $json_str = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
		  return $json_str;
   }
   //Вставка в таблицу
    public function insert($techniqueName,$benefits)
    {
      $sql = "INSERT INTO technique VALUES(NULL,:techniqueName,:benefits)";
      $db = Database::getConnection();
      $result = $db->prepare($sql);
      $result->bindParam(':techniqueName',$techniqueName,PDO::PARAM_STR,100);
      $result->bindParam(':benefits',$benefits,PDO::PARAM_STR,100);
	   $result->execute();
    }
    //Удаляет запись по id
    public function delete($id)
    {
		  $sql = "DELETE FROM technique WHERE tech_id=:id";
		  $db = Database::getConnection();
      $result = $db->prepare($sql);
      $result->bindParam(':id',$id,PDO::PARAM_INT);
	    $result->execute();
    }
    //Редактирует запись по id, заменяя старую запись на новую.
    public function update($id,$techniqueName,$benefits)
    {
    	$sql = "UPDATE technique SET technique_name = :techniqueName, benefits = :benefits WHERE tech_id=:id";
    	$db = Database::getConnection();
      $result = $db->prepare($sql);
      $result->bindParam(':id',$id,PDO::PARAM_INT);
      $result->bindParam(':techniqueName',$techniqueName,PDO::PARAM_STR,100);
      $result->bindParam(':benefits',$benefits,PDO::PARAM_STR,100);
	    $result->execute();
    }  
}
?>