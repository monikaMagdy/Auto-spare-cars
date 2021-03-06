<?php
require_once(__ROOT__ . "model/Model.php");

class Car extends Model
{
	private $CarID;
	private $CarName;
	private $CarModel;
	private $CarYear;
	private $imgName;
	

	function __construct($CarID, $CarName="",$CarModel="",$CarYear="",$imgName="")
	{
		$this->CarID = $CarID;
		$this->db = $this->connect();

		if(""===$CarName)
		{
			$this->readCar($CarID);
		}
		else
		{
			$this->CarName = $CarName;
			$this->CarModel = $CarModel;
			$this->CarYear = $CarYear;
			$this->imgName = $imgName;
			
		}
	}

	function getCarName() 
	{
		return $this->CarName;
	}	
	function setCarName($CarName)
	{
		return $this->CarName = $CarName;
	}

	function getCarModel() 
	{
		return $this->CarModel;
	}
	function setCarModel($CarModel) 
	{
		return $this->CarModel = $CarModel;
	}

	function getCarYear() 
	{
		return $this->CarYear;
	}
	function setCarYear($CarYear) 
	{
		return $this->CarYear = $CarYear;
	}

	function getimgName() 
	{
		return $this->imgName;
	}	
	function setimgName($imgName)
	{
		return $this->imgName = $imgName;
	}
	function getCarID()
	{
		return $this->CarID;
	}

	function readCar($CarID)
	{
		$sql = "SELECT * FROM car where CarID=".$CarID;
		$db = $this->connect();
		$result = $db->query($sql);
		if ($result->num_rows == 1){
			$row = $db->fetchRow();

			$this->CarName = $row["CarName"];
			$this->CarModel = $row["CarModel"];
			$this->CarYear = $row["CarYear"];
			$this->imgName=$row["imgName"];
		}
		else 
		{
			$this->CarName = "";
			$this->CarModel = "";
			$this->CarYear= "";
			$this->imgName="";
		}	
	}

	function Model_editCar($CarName,$CarModel,$CarYear)
	{
		$edit = "UPDATE `car` SET CarName='$CarName',CarModel='$CarModel',CarYear='$CarYear' where CarID=$this->CarID" ;

		if($this->db->query($edit) === true)
		{
			echo "updated successfully.";
			$this->readCar($this->CarID);
		} 
		else
		{
			echo "ERROR: Could not able to execute $edit. " . $conn->error;
		}
	}

	function deleteCar()
	{
		$sqlCar="DELETE FROM car WHERE CarID=$this->CarID";
		
		if($this->db->query($sqlCar) === true)
		{
			$sqlSP="DELETE FROM sparepar INNER JOIN car on sparepart.carID=car.CarID";
			echo "deleted successfully.";
			echo"Deleted the spare parts of this car successfully.";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sqlCar. " . $conn->error;
		}
	}

	/*function imageCar($imgName)
	{
		$sql="INSERT INTO image (name)values ($imgName)";
		if($this->db->query($sql) === true)
		{
			echo "added successfully.";
		} 
		else
		{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
		
	}*/
}
?>