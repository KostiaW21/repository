<?php
include 'connect.php';

class ServicesTable{
	
	public function getAll()
   {
   		$sql = "SELECT * FROM services";
   		$db = Database::getConnection();
   		$result = $db->query($sql);
		$json_str = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
		print_r($json_str);
   }
    public function add($serviceName)
    {
        $sql = "INSERT INTO services VALUES(:serviceName)";
       	$db = Database::getConnection();
        $result = $db->prepare($sql);
        $result->bindParam(':serviceName',$serviceName,PDO::PARAM_STR,100);
	    $result->execute();
    }

}

$con = new ServicesTable();
$con->add("Text");
$con->getAll();
?>



   