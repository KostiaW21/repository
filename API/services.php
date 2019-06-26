<?php
include 'connect.php';

class ServicesTable{
	//Выводит все данные из таблицы
	public function selectAll()
   {
   		$sql = "SELECT * FROM services";
   		$db = Database::getConnection();
   		$result = $db->query($sql);
		$json_str = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
		print_r($json_str);
   }
   //Вставка в таблицу
    public function insert($serviceName)
    {
        $sql = "INSERT INTO services VALUES(NULL,:serviceName)";
       	$db = Database::getConnection();
        $result = $db->prepare($sql);
        $result->bindParam(':serviceName',$serviceName,PDO::PARAM_STR,100);
	    $result->execute();
    }
    //Удаляет запись по id
    public function delete($id)
    {
		$sql = "DELETE FROM services WHERE services_id=:id";
		$db = Database::getConnection();
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
	    $result->execute();
    }
    //Редактирует запись по id, заменяя старую запись на новую.
    public function update($id,$serviceName)
    {
    	$sql = "UPDATE services SET service_name = :serviceName WHERE services_id=:id";
    	$db = Database::getConnection();
        $result = $db->prepare($sql);
        $result->bindParam(':id',$id,PDO::PARAM_INT);
        $result->bindParam(':serviceName',$serviceName,PDO::PARAM_STR,100);
	    $result->execute();
    }

   
}
?>



   