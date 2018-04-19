<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function getAdminDetailsByUsernameFromDb($user)
    {
        $query = "SELECT * FROM view_admin_details WHERE uname='".$user['uname']."'";
    	$rows = executeQuery($query);
        while($row = mysqli_fetch_assoc($rows)) {
            $newUser=$row;
        }
        return $newUser;
    }
    function getAllRegistrationFromDb(){
        $query = "SELECT * FROM view_registration_req";
        $result = executeQuery($query);
        if (mysqli_num_rows($result)==0) {
            return null;
        }
        while($rows=mysqli_fetch_assoc($result)){
            $newRegistration[] = $rows;
        }
        return $newRegistration;
    }
    function getUserDetailsByIdFromDb($uid){
        $query = "SELECT * FROM view_registration_req WHERE uid=".$uid;
        $userList = executeQuery($query);
        if (mysqli_num_rows($userList)==0) {
            return null;
        }
        while($user = mysqli_fetch_assoc($userList)) {
            $newUser=$user;
        }
        return $newUser;
    }
    /**function getAllUserFromDb()
	{
		$query = "SELECT * FROM view_user_details";
		$userList = executeQuery($query);
		while ($user = mysqli_fetch_assoc($userList)) {
			$newUserList[]=$user;
		}
		return $newUserList;
	}
    function getSearchedUsersFromDb($entity)
    {
        $query = "SELECT * FROM view_user_details WHERE age>=".$entity['minAge']." AND age<=".$entity['maxAge']." AND height>=".$entity['minHeight']." AND height<=".$entity['maxHeight'];
        if ($entity['religion']!=null) {
            $query = $query." AND religion=".$entity['religion'];
        }
        if (isset($entity['gender'])) {
            $query=$query." AND gender=".$entity['gender'];
        }
        $userList = executeQuery($query);
        if (mysqli_num_rows($userList)==0) {
            return null;
        }
        while ($user = mysqli_fetch_assoc($userList)) {
            $newUserList[]=$user;
        }
        return $newUserList;
        
    }
	function getUserGenderFromDb($user)
    {
        $query = "SELECT tbl_gender.* FROM tbl_users, tbl_gender WHERE tbl_users.gender=tbl_gender.id AND uid=".$user['uid'];
        $genderList = executeQuery($query);
        while ($gender = mysqli_fetch_assoc($genderList)) {
            return $gender;
        }
    }
    function getUserBloodFromDb($user)
    {
        $query = "SELECT tbl_blood.* FROM tbl_users, tbl_blood WHERE tbl_users.blood=tbl_blood.id AND uid=".$user['uid'];
        $bloodList = executeQuery($query);
        while ($blood = mysqli_fetch_assoc($bloodList)) {
            return $blood;
        }
    }
    function getUserReligionFromDb($user)
    {
        $query = "SELECT tbl_religion.* FROM tbl_users, tbl_religion WHERE tbl_users.religion=tbl_religion.id AND uid=".$user['uid'];
        $religionList = executeQuery($query);
        while ($religion = mysqli_fetch_assoc($religionList)) {
            return $religion;
        }
    }
    function getUserComplexionFromDb($user)
    {
        $query = "SELECT tbl_complexion.* FROM tbl_users, tbl_complexion WHERE tbl_users.complexion=tbl_complexion.id AND uid=".$user['uid'];
        $complexionList = executeQuery($query);
        while ($complexion = mysqli_fetch_assoc($complexionList)) {
            return $complexion;
        }
    }
    function getUserMaritalStatusFromDb($user)
    {
        $query = "SELECT tbl_marital_status.* FROM tbl_users, tbl_marital_status WHERE tbl_users.marital_status=tbl_marital_status.id AND uid=".$user['uid'];
        $maritalList = executeQuery($query);
        while ($marital = mysqli_fetch_assoc($maritalList)) {
            return $marital;
        }
    }
    function getUserPerAddressFromDb($user)
    {
        $query = "SELECT * FROM view_per_address_details WHERE per_uid=".$user['uid'];
        $per_addressList = executeQuery($query);
        while ($per_address = mysqli_fetch_assoc($per_addressList)) {
            return $per_address;
        }
    }
    function getUserPrAddressFromDb($user)
    {
        $query = "SELECT * FROM view_pr_address_details WHERE pr_uid=".$user['uid'];
        $pr_addressList = executeQuery($query);
        while ($pr_address = mysqli_fetch_assoc($pr_addressList)) {
            return $pr_address;
        }
    }
    function getUserEducationFromDb($user)
    {
        $query = "SELECT * FROM view_user_education WHERE uid=".$user['uid'];
        $educationList = executeQuery($query);
        while ($education = mysqli_fetch_assoc($educationList)) {
            return $education;
        }
    }
    function getUserJobFromDb($user)
    {
        $query = "SELECT * FROM tbl_job WHERE uid=".$user['uid'];
        $jobList = executeQuery($query);
        while ($job = mysqli_fetch_assoc($jobList)) {
            return $job;
        }
    }
    function getAllReligionFromDb(){
        $query = "SELECT * FROM tbl_religion";
        return executeQuery($query);
    }**/
    function getAllGenderFromDb()
    {
        $query = "SELECT * FROM tbl_gender";
        return executeQuery($query);
    }
    function getAllBloodGroupFromDb()
    {
        $query = "SELECT * FROM tbl_blood";
        return executeQuery($query);
    }
    /**function getAllComplexionFromDb()
    {
        $query = "SELECT * FROM tbl_complexion";
        return executeQuery($query);
    }
    function getAllMaritalStatusFromDb()
    {
        $query = "SELECT * FROM tbl_marital_status";
        return executeQuery($query);
    }
    function getAllFamilyType()
    {
        return getAllFamilyTypeFromDb();
    }
    function getAllDegreeFromDb()
    {
        $query = "SELECT * FROM tbl_degree";
        return executeQuery($query);
    }
    function getAllHobbyFromDb()
    {
        $query = "SELECT * FROM tbl_hobby";
        $hobbies = executeQuery($query);
        while ($hobby = mysqli_fetch_assoc($hobbies)) {
            $newHobbyList[]= $hobby;
        }
        return $newHobbyList;
    }
    function getAllInterestFromDb()
    {
        $query = "SELECT * FROM tbl_interest";
        $interests = executeQuery($query);
        while ($interest = mysqli_fetch_assoc($interests)) {
            $newInterestList[]= $interest;
        }
        return $newInterestList;
    }
    function getAllMusicFromDb()
    {
        $query = "SELECT * FROM tbl_music";
        $musics = executeQuery($query);
        while ($music = mysqli_fetch_assoc($musics)) {
            $newMusicList[]= $music;
        }
        return $newMusicList;
    }
    function getAllSportFromDb()
    {
        $query = "SELECT * FROM tbl_sports";
        $sports = executeQuery($query);
        while ($sport = mysqli_fetch_assoc($sports)) {
            $newSportList[]= $sport;
        }
        return $newSportList;
    }
    function getHobbiesByUsernameFromDb($uname){
        $query = "SELECT hobby_id,hobby_name FROM view_user_hobbies WHERE uname='".$uname."'";
        $hobbies = executeQuery($query);
        while ($hobby = mysqli_fetch_assoc($hobbies)) {
            $newHobbyList[]= $hobby;
        }
        return $newHobbyList;
    }
    function getInterestsByUsernameFromDb($uname){
        $query = "SELECT interest_id,interest_name FROM view_user_interests WHERE uname='".$uname."'";
        $interests = executeQuery($query);
        $userInterest;
        while ($interest = mysqli_fetch_assoc($interests)) {
            $userInterest[] = $interest;
        }
        return $userInterest;
    }
    function getMusicsByUsernameFromDb($uname){
        $query = "SELECT music_id,music_name FROM view_user_musics WHERE uname='".$uname."'";
        $musics = executeQuery($query);
        while ($music = mysqli_fetch_assoc($musics)) {
            $userMusic[]= $music;
        }
        return $userMusic;
    }
    function getSportsByUsernameFromDb($uname){
        $query = "SELECT sport_id,sport_name FROM view_user_sports WHERE uname='".$uname."'";
        $sports = executeQuery($query);
        $userSport;
        while ($sport = mysqli_fetch_assoc($sports)) {
            $userSport[]= $sport;
        }
        return $userSport;
    }**/
?>