<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>

<?php
	function getAllUserFromDb()
	{
		$query = "SELECT * FROM tbl_users";
		$userList = executeQuery($query);
		while ($user = mysqli_fetch_assoc($userList)) {
			$newUserList[]=$user;
		}
		return $newUserList;
	}
	function getActiveUserFromDb(){
		$query = "SELECT * FROM tbl_users WHERE TIMESTAMPDIFF(DAY, tbl_users.last_login, curdate()) < 5";
		$result = executeQuery($query);
		return mysqli_num_rows($result);
	}
	/**function insertPersonToDb($person){
		$query = "INSERT INTO Person(id, name, phone) VALUES($person[id], '$person[name]', '$person[phone]')";
		return executeNonQuery($query);
	}

	function updatePersonToDb($person){
		$query = "UPDATE Person SET name='$person[name]', phone='$person[phone]' WHERE id=$person[id]";
		return executeNonQuery($query);
	}

	function deletePersonFromDb($id){
		$query = "DELETE FROM Person WHERE id=$id";
		return executeNonQuery($query);
	}

	function getAllPersonFromDb(){
		$query = "SELECT id, name, phone FROM Person";
		$result = executeQuery($query);
		$personList = array();
		if($result){
			for($i=0; $row = mysqli_fetch_assoc($result); ++$i) {
				$personList[$i] = $row;
			}
		}
		return $personList;
	}

	function getPersonFromDb($id){
		$query = "SELECT id, name, phone FROM Person WHERE id=$id";
		$result = executeQuery($query);
		$person = null;
		if($result){
			$person = mysqli_fetch_assoc($result);
		}
		return $person;
	}**/
	/**function updatePoliceStationInDb($policeStation){
		echo $query = "UPDATE tbl_police_station SET name='".$policeStation['name']."',district=".$policeStation['district']." WHERE id=".$policeStation['id'];
	}**/
?>
