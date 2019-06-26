<?php
include 'connect.php';

class AllergyTable
{
  private $db;

  #connects to database
  public function __construct() 
  {
    $this->db = Database::getConnection();
  }
	#returns all records
	public function selectAll()
  {
   	 $sql = "SELECT * FROM allergy";
   	 $result = $this->db->query($sql);
		 $json_str = json_encode($result->fetchAll(PDO::FETCH_ASSOC));
		 return $json_str;
  }

  #inserts a record in the table with params
  public function insert($allergyName)
  {
      $sql = "INSERT INTO allergy VALUES(NULL,:name)";
      $result = $this->db->prepare($sql);
      $result->bindParam(':name',$allergyName,PDO::PARAM_STR,100);
	    $result->execute();
  }

  #deletes the record by ID
  public function delete($id)
  {
		  $sql = "DELETE FROM allergy WHERE allergy_id=:id";
      $result = $this->db->prepare($sql);
      $result->bindParam(':id',$id,PDO::PARAM_INT);
	    $result->execute();
  }

  #updates the record by ID & params
  public function update($id, $allergyName)
  {
    	$sql = "UPDATE allergy SET name = :allergyName WHERE allergy_id=:id";
      $result = $this->db->prepare($sql);
      $result->bindParam(':id',$id,PDO::PARAM_INT);
      $result->bindParam(':allergyName',$allergyName,PDO::PARAM_STR,100);
	    $result->execute();
  }  
};
