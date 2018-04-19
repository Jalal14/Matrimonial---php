<?php require_once SERVER_ROOT."\\data\\account_data_access.php" ?>
<?php
	function hasPoliceStationInDb($address)
	{
		$query = "SELECT * FROM tbl_police_station WHERE name=lower('".$address['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
	function hasPoliceStationIdInDb($address){
		$query = "SELECT * FROM tbl_police_station WHERE id=".$address['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function getAllPoliceStationFromDb()
    {
        $query = "SELECT * FROM tbl_police_station ORDER BY name";
        $result = executeQuery($query);
        while ($ps = mysqli_fetch_assoc($result)) {
        	$newPSList[]=$ps;
        }
        return $newPSList;
    }
	function insertPoliceStationToDb($address)
	{
		$query = "INSERT INTO tbl_police_station VALUES(null,'".$address['name']."',".$address['district'].")";
		return executeNonQuery($query);
	}
	function updatePoliceStationInDb($address)
	{
		$query = "UPDATE tbl_police_station SET name='".$address['name']."', district=".$address['district']." WHERE id=".$address['id'];
		return executeNonQuery($query);
	}
	/**function deletePoliceStationInDb($address){
		echo $query = "DELETE FROM tbl_police_station WHERE id=".$address['id'];
		return executeNonQuery($query);
	}**/
	function hasDistrictInDb($address){
		$query = "SELECT * FROM tbl_district WHERE name=lower('".$address['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
	function hasDistrictIdInDb($address){
		$query = "SELECT * FROM tbl_district WHERE id=".$address['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
	function insertDistrictToDb($address){
		$query = "INSERT INTO tbl_district VALUES(null,'".$address['name']."',".$address['division'].")";
		return executeNonQuery($query);
	}
	function updateDistrictInDb($address){
		$query = "UPDATE tbl_district SET name='".$address['name']."', division=".$address['division']." WHERE id=".$address['id'];
		return executeNonQuery($query);
	}
	function hasDivisionInDb($address){
		$query = "SELECT * FROM tbl_division WHERE name=lower('".$address['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
	function hasDivisionIdInDb($address){
		$query = "SELECT * FROM tbl_division WHERE id=".$address['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
	function insertDivisionToDb($address){
		$query = "INSERT INTO tbl_division VALUES(null,'".$address['name']."')";
		return executeNonQuery($query);
	}
	function updateDivisionInDb($address){
		$query = "UPDATE tbl_division SET name='".$address['name']."' WHERE id=".$address['id'];
		return executeNonQuery($query);
	}
    function getAllDistrictFromDb()
    {
        $query = "SELECT * FROM tbl_district ORDER BY name";
        $result = executeQuery($query);
        while ($district = mysqli_fetch_assoc($result)) {
        	$newDistrictList[]=$district;
        }
        return $newDistrictList;
    }
	function getAllDivisionFromDb()
    {
        $query = "SELECT * FROM tbl_division ORDER BY name";
        $result = executeQuery($query);
        while ($division = mysqli_fetch_assoc($result)) {
        	$newDivisionList[]=$division;
        }
        return $newDivisionList;
    }


?>
