<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function getAllDegreeFromDb(){
        $query = "SELECT * FROM tbl_degree";
        return executeQuery($query);
    }
    function hasDegreeInDb($degree){
    	$query = "SELECT * FROM tbl_degree WHERE degree=lower('".$degree['degree']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasDegreeIdInDb($degree){
		$query = "SELECT * FROM tbl_degree WHERE id=".$degree['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateDegreeInDb($degree){
		$query = "UPDATE tbl_degree SET degree='".$degree['degree']."' WHERE id=".$degree['id'];
		return executeNonQuery($query);
	}
	function insertDegreeToDb($degree){
		$query = "INSERT INTO tbl_degree VALUES(null,'".$degree['degree']."')";
		return executeNonQuery($query);
	}
	function getAllHobbyFromDb(){
        $query = "SELECT * FROM tbl_hobby";
        return executeQuery($query);
    }
    function hasHobbyInDb($hobby){
    	$query = "SELECT * FROM tbl_hobby WHERE name=lower('".$hobby['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasHobbyIdInDb($hobby){
		$query = "SELECT * FROM tbl_hobby WHERE id=".$hobby['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateHobbyInDb($hobby){
		$query = "UPDATE tbl_hobby SET name='".$hobby['name']."' WHERE id=".$hobby['id'];
		return executeNonQuery($query);
	}
	function insertHobbyToDb($hobby){
		$query = "INSERT INTO tbl_hobby VALUES(null,'".$hobby['name']."')";
		return executeNonQuery($query);
	}
	function getAllInterestFromDb(){
        $query = "SELECT * FROM tbl_interest";
        return executeQuery($query);
    }
    function hasInterestInDb($interest){
    	echo $query = "SELECT * FROM tbl_interest WHERE name=lower('".$interest['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasInterestIdInDb($interest){
		echo $query = "SELECT * FROM tbl_interest WHERE id=".$interest['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateInterestInDb($interest){
		$query = "UPDATE tbl_interest SET name='".$interest['name']."' WHERE id=".$interest['id'];
		return executeNonQuery($query);
	}
	function insertInterestToDb($interest){
		$query = "INSERT INTO tbl_interest VALUES(null,'".$interest['name']."')";
		return executeNonQuery($query);
	}
    function getAllMusicFromDb(){
        $query = "SELECT * FROM tbl_music";
        return executeQuery($query);
    }
    function hasMusicInDb($music){
    	echo $query = "SELECT * FROM tbl_music WHERE name=lower('".$music['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasMusicIdInDb($music){
		$query = "SELECT * FROM tbl_music WHERE id=".$music['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateMusicInDb($music){
		$query = "UPDATE tbl_music SET name='".$music['name']."' WHERE id=".$music['id'];
		return executeNonQuery($query);
	}
	function insertMusicToDb($music){
		$query = "INSERT INTO tbl_music VALUES(null,'".$music['name']."')";
		return executeNonQuery($query);
	}
    function getAllSportFromDb(){
        $query = "SELECT * FROM tbl_sports";
        return executeQuery($query);
    }
    function hasSportInDb($sport){
    	$query = "SELECT * FROM tbl_sports WHERE name=lower('".$sport['name']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasSportIdInDb($sport){
		$query = "SELECT * FROM tbl_sports WHERE id=".$sport['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateSportInDb($sport)
	{
		$query = "UPDATE tbl_sports SET name='".$sport['name']."' WHERE id=".$sport['id'];
		return executeNonQuery($query);
	}
	function insertSportToDb($sport){
		$query = "INSERT INTO tbl_sports VALUES(null,'".$sport['name']."')";
		return executeNonQuery($query);
	}
	function getAllFamilyTypeFromDb(){
        $query = "SELECT * FROM tbl_family_type";
        return executeQuery($query);
    }
	function hasFamilyTypeInDb($familyType){
    	$query = "SELECT * FROM tbl_family_type WHERE type=lower('".$familyType['type']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasFamilyTypeIdInDb($familyType){
		$query = "SELECT * FROM tbl_family_type WHERE id=".$familyType['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateFamilyTypeInDb($familyType)
	{
		$query = "UPDATE tbl_family_type SET type='".$familyType['type']."' WHERE id=".$familyType['id'];
		return executeNonQuery($query);
	}
	function insertFamilyTypeToDb($familyType)
	{
		$query = "INSERT INTO tbl_family_type VALUES(null,'".$familyType['type']."')";
		return executeNonQuery($query);
	}
	function getAllComplexionFromDb(){
        $query = "SELECT * FROM tbl_complexion";
        return executeQuery($query);
    }
	function hasComplexionInDb($complexion){
    	$query = "SELECT * FROM tbl_complexion WHERE type=lower('".$complexion['type']."')";
		$result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function hasComplexionIdInDb($complexion){
		$query = "SELECT * FROM tbl_complexion WHERE id=".$complexion['id'];
		$result = executeQuery($query);
        return mysqli_num_rows($result);
	}
    function updateComplexionInDb($complexion)
	{
		$query = "UPDATE tbl_complexion SET type='".$complexion['type']."' WHERE id=".$complexion['id'];
		return executeNonQuery($query);
	}
	function insertComplexionToDb($complexion)
	{
		$query = "INSERT INTO tbl_complexion VALUES(null,'".$complexion['type']."')";
		return executeNonQuery($query);
	}
?>