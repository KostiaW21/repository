<?php
include 'connect.php';

class Services{
	
	public function return_all_record()
   {
   			$sql = "SELECT * FROM services";
   			$db = Database::getConnection();
   			$result = $db->query($sql);
			$json_str = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
			print_r($json_str);
   }
  
}
$con = new Services();
$con->return_all_record();
?>



   