<?php
include 'connect.php';

class usersTable{
	//Выводит все данные из таблицы
	public function selectAll()
   {
   		$sql = "SELECT * FROM users";
   		$db = Database::getConnection();
   		$result = $db->query($sql);
		  $json_str = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
		  return $json_str;
   }
   //Вставка в таблицу
    public function insert($email,$password,$status,$role_id)
    {
      //1-Admin,2-User
      if($role_id == 1 or $role_id == 2)
       {
      $sql = "INSERT INTO users VALUES(NULL,:email,:password,:status,:role_id)";
      $db = Database::getConnection();
      $result = $db->prepare($sql);
      $result->bindParam(':email',$email,PDO::PARAM_STR,100);
      $result->bindParam(':password',$password,PDO::PARAM_STR,100);
      $result->bindParam(':status',$status,PDO::PARAM_INT);
      $result->bindParam(':role_id',$role_id,PDO::PARAM_INT);
	    $result->execute();
       }else{ exit(); };
    }
    //Удаляет запись по id
    public function delete($id)
    {
		  $sql = "DELETE FROM users WHERE user_id=:id";
		  $db = Database::getConnection();
      $result = $db->prepare($sql);
      $result->bindParam(':id',$id,PDO::PARAM_INT);
	    $result->execute();
    }
    //Редактирует запись по id, заменяя старую запись на новую.
    public function update($id,$email,$password,$status,$role_id)
    {
    	$sql = "UPDATE users SET email = :email, password = :password, 
      status = :status, role_id = :role_id WHERE user_id=:id";
    	$db = Database::getConnection();
      $result = $db->prepare($sql);
      $result->bindParam(':id',$id,PDO::PARAM_INT);
      $result->bindParam(':email',$email,PDO::PARAM_STR,100);
      $result->bindParam(':password',$password,PDO::PARAM_STR,100);
      $result->bindParam(':status',$status,PDO::PARAM_INT);
      $result->bindParam(':role_id',$role_id,PDO::PARAM_INT);
	    $result->execute();
    }  
}
?>