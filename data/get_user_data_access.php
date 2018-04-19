<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>
<?php
	function getUserDetailsByUsernameFromDb($user){
        $query = "SELECT * FROM view_registration WHERE uname='".$user['uname']."'";
    	$rows = executeQuery($query);
        while($row = mysqli_fetch_assoc($rows)) {
            $newUser=$row;
        }
        return $newUser;
    }
    function getAllRegistrationFromDb(){
        $query = "SELECT * FROM tbl_registration_req";
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
        $query = "SELECT * FROM view_registration WHERE uid=".$uid;
        $userList = executeQuery($query);
        if (mysqli_num_rows($userList)==0) {
            return null;
        }
        while($user = mysqli_fetch_assoc($userList)) {
            $newUser=$user;
        }
        return $newUser;
    }
    function getAllUserFromDb(){
		$query = "SELECT * FROM view_registration";
		$userList = executeQuery($query);
		while ($user = mysqli_fetch_assoc($userList)) {
			$newUserList[]=$user;
		}
		return $newUserList;
	}
    function getAllSearchdeDataByIdFromDb($uid, $tbl){
        $query = "SELECT * FROM view_".$tbl." WHERE uid=".$uid." GROUP BY ".$tbl." HAVING counter = (SELECT MAX(counter) FROM view_".$tbl.")";
        $result = executeQuery($query);
        if (mysqli_num_rows($result)==0) {
            return null;
        }
        while ($searched = mysqli_fetch_assoc($result)) {
            $searchData[] = $searched;
        }
        return $searchData;
    }
    function getAllRelGenDataByIdFromDb($uid, $tbl){
        $query = "SELECT * , COUNT(*) AS counter FROM tbl_search WHERE uid=".$uid." AND ".$tbl." IS NOT null GROUP BY ".$tbl." ORDER BY counter DESC";
        $result = executeQuery($query);
        if (mysqli_num_rows($result)==0) {
            return null;
        }
        while ($searched = mysqli_fetch_assoc($result)) {
            $searchData[] = $searched;
        }
        return $searchData;
    }
    function getSuggestedUsersFromDb($user, $favoriteList){
        $query = "SELECT * FROM view_registration WHERE uid NOT IN(".$user['uid'];
        if (isset($favoriteList)) {
            foreach ($favoriteList as $favorite) {
                 $query = $query.",".$favorite['favorite_user'];
             }
        }
        $query = $query.")";
        $userList = executeQuery($query);
        while ($user = mysqli_fetch_assoc($userList)) {
            $newUserList[]=$user;
        }
        return $newUserList;
    }
    function getSearchedUsersFromDb($entity){
        $condition = 0;
        $query = "SELECT * FROM view_registration WHERE ";
        if ($entity['minAge'] != null){
            $query = $query." age>=".$entity['minAge'];
            $condition++;
        }
        if ($entity['maxAge'] != null){
            $query = $query." AND age<=".$entity['maxAge'];
        }
        if ($entity['minHeight'] != null){
            if ($condition > 0) {
                $query = $query." AND ";
            }
            $condition++;
            $query = $query." height>=".$entity['minHeight'];
        }
        if ($entity['maxHeight'] != null){
            $query = $query." AND height<=".$entity['maxHeight'];
        }
        if ($entity['religion']!=null) {
            if ($condition > 0) {
                $query = $query." AND ";
            }
            $condition++;
            $query = $query." religion=".$entity['religion'];
            $condition = true;
        }
        if (isset($entity['gender'])) {
            if ($condition > 0) {
                $query = $query." AND ";
            }
            $condition++;
            $query=$query." gender=".$entity['gender'];
        }
        if ($condition==0) {
            $query = $query." 1";
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
    function getPreviousSearchedByHeightFromDb($section,$min, $max,$gender, $religion){
        $query = "SELECT * FROM view_registration WHERE ".$section.">=".$min." AND ".$section."<=".$max." AND gender=".$gender." AND religion=".$religion;
        $result = executeQuery($query);
        if (mysqli_num_rows($result)==0) {
            $query = "SELECT * FROM view_registration WHERE ".$section.">=".$min." OR ".$section."<=".$max." AND gender=".$gender." AND religion=".$religion;
            $result = executeQuery($query);
        }
        if (mysqli_num_rows($result)==0) {
            return null;
        }
        while ($searched = mysqli_fetch_assoc($result)) {
            $newSearched[] = $searched;
        }
        return $newSearched;
    }
    function getFavoriteListFromDb($uid){
        $query  = "SELECT * FROM tbl_favorite WHERE uid=".$uid;
        $favoriteList = executeQuery($query);
        if (mysqli_num_rows($favoriteList)==0) {
            return null;
        }
        while ($favorite = mysqli_fetch_assoc($favoriteList)) {
            $newFavoriteList[] = $favorite;
        }
        return $newFavoriteList;
    }
    function getInterestedUserListFromDb($uid){
        $query  = "SELECT * FROM tbl_favorite WHERE favorite_user=".$uid;
        $favoriteList = executeQuery($query);
        if (mysqli_num_rows($favoriteList)==0) {
            return null;
        }
        while ($favorite = mysqli_fetch_assoc($favoriteList)) {
            $newFavoriteList[] = $favorite;
        }
        return $newFavoriteList;
    }
    function getAllFavoriteUserDetails($favorite){
        $query = "SELECT * FROM view_registration WHERE uid IN(";
        $counter = 1;
        foreach ($favorite as $fav) {
            $query = $query.$fav['favorite_user'];
            if ($counter<sizeof($favorite)) {
                $query = $query.",";
            }
            $counter++;
        }
        $query=$query.")";
        $userList = executeQuery($query);
        if (mysqli_num_rows($userList)==0) {
            return null;
        }
        while ($user = mysqli_fetch_assoc($userList)) {
            $newUserList[]=$user;
        }
        return $newUserList;
    }
    function getFriendReqListFromDb(){
        $query  = "SELECT * FROM tbl_friend_req";
        $friendReqList = executeQuery($query);
        if (mysqli_num_rows($friendReqList)==0) {
            return null;
        }
        while ($friendReq = mysqli_fetch_assoc($friendReqList)) {
            $newFriendReqList[] = $friendReq;
        }
        return $newFriendReqList;
    }
    function getFriendListFromDb(){
        $query  = "SELECT * FROM tbl_friend";
        $friendList = executeQuery($query);
        if (mysqli_num_rows($friendList)==0) {
            return null;
        }
        while ($friend = mysqli_fetch_assoc($friendList)) {
            $newFriendList[] = $friend;
        }
        return $newFriendList;
    }
	function getUserGenderFromDb($user){
        $query = "SELECT tbl_gender.* FROM tbl_users, tbl_gender WHERE tbl_users.gender=tbl_gender.id AND uid=".$user['uid'];
        $genderList = executeQuery($query);
        while ($gender = mysqli_fetch_assoc($genderList)) {
            return $gender;
        }
    }
    function getUserReligionFromDb($user){
        $query = "SELECT tbl_religion.* FROM tbl_users, tbl_religion WHERE tbl_users.religion=tbl_religion.id AND uid=".$user['uid'];
        $religionList = executeQuery($query);
        while ($religion = mysqli_fetch_assoc($religionList)) {
            return $religion;
        }
    }
    function getUserBloodFromDb($user){
        $query = "SELECT tbl_blood.* FROM tbl_users, tbl_blood WHERE tbl_users.blood=tbl_blood.id AND uid=".$user['uid'];
        $bloodList = executeQuery($query);
        while ($blood = mysqli_fetch_assoc($bloodList)) {
            return $blood;
        }
    }
    function getUserComplexionFromDb($user){
        $query = "SELECT tbl_complexion.* FROM tbl_users, tbl_complexion WHERE tbl_users.complexion=tbl_complexion.id AND uid=".$user['uid'];
        $complexionList = executeQuery($query);
        while ($complexion = mysqli_fetch_assoc($complexionList)) {
            return $complexion;
        }
    }
    function getUserMaritalStatusFromDb($user){
        $query = "SELECT tbl_marital_status.* FROM tbl_users, tbl_marital_status WHERE tbl_users.marital_status=tbl_marital_status.id AND uid=".$user['uid'];
        $maritalList = executeQuery($query);
        while ($marital = mysqli_fetch_assoc($maritalList)) {
            return $marital;
        }
    }
    function getUserPerAddressFromDb($user){
        $query = "SELECT * FROM view_per_address_details WHERE per_uid=".$user['uid'];
        $per_addressList = executeQuery($query);
        while ($per_address = mysqli_fetch_assoc($per_addressList)) {
            return $per_address;
        }
    }
    function getUserPrAddressFromDb($user){
        $query = "SELECT * FROM view_pr_address_details WHERE pr_uid=".$user['uid'];
        $pr_addressList = executeQuery($query);
        while ($pr_address = mysqli_fetch_assoc($pr_addressList)) {
            return $pr_address;
        }
    }
    function getUserEducationFromDb($user){
        $query = "SELECT * FROM view_user_education WHERE uid=".$user['uid'];
        $educationList = executeQuery($query);
        while ($education = mysqli_fetch_assoc($educationList)) {
            return $education;
        }
    }
    function getUserJobByIdFromDb($user){
        $query = "SELECT tbl_job.*, tbl_users.annual_income FROM tbl_job,tbl_users WHERE tbl_users.uid=tbl_job.uid AND tbl_job.uid=".$user['uid'];
        $jobList = executeQuery($query);
        while ($job = mysqli_fetch_assoc($jobList)) {
            return $job;
        }
    }
    function getAllReligionFromDb(){
        $query = "SELECT * FROM tbl_religion";
        return executeQuery($query);
    }
    function getAllGenderFromDb(){
        $query = "SELECT * FROM tbl_gender";
        return executeQuery($query);
    }
    function getAllBloodGroupFromDb(){
        $query = "SELECT * FROM tbl_blood";
        return executeQuery($query);
    }
    function getAllComplexionFromDb(){
        $query = "SELECT * FROM tbl_complexion";
        return executeQuery($query);
    }
    function getAllMaritalStatusFromDb(){
        $query = "SELECT * FROM tbl_marital_status";
        return executeQuery($query);
    }
    function getAllFamilyTypeFromDb(){
        $query = "SELECT * FROM tbl_family_type";
        $typeList = executeQuery($query);
        while ($type = mysqli_fetch_assoc($typeList)) {
            $newTypeList[]=$type;
        }
        return $newTypeList;
    }
    function getUserFamilyInfoFromDb($user){
        $query = "SELECT * FROM view_family_details WHERE uid=".$user['uid'];
        $familyList = executeQuery($query);
        while ($family = mysqli_fetch_assoc($familyList)) {
            return $family;
        }
    }
    function getAllPoliceStationFromDb(){
        $query = "SELECT * FROM tbl_police_station";
        return executeQuery($query);
    }
    function getAllDistrictFromDb(){
        $query = "SELECT * FROM tbl_district";
        return executeQuery($query);
    }
    function getAllDivisionFromDb(){
        $query = "SELECT * FROM tbl_division";
        return executeQuery($query);
    }
    function getAllDegreeFromDb(){
        $query = "SELECT * FROM tbl_degree";
        return executeQuery($query);
    }
    function getAllHobbiesFromDb(){
        $query = "SELECT * FROM tbl_hobby";
        $hobbies = executeQuery($query);
        while ($hobby = mysqli_fetch_assoc($hobbies)) {
            $newHobbyList[]= $hobby;
        }
        return $newHobbyList;
    }
    function getAllInterestsFromDb(){
        $query = "SELECT * FROM tbl_interest";
        $interests = executeQuery($query);
        while ($interest = mysqli_fetch_assoc($interests)) {
            $newInterestList[]= $interest;
        }
        return $newInterestList;
    }
    function getAllMusicsFromDb(){
        $query = "SELECT * FROM tbl_music";
        $musics = executeQuery($query);
        while ($music = mysqli_fetch_assoc($musics)) {
            $newMusicList[]= $music;
        }
        return $newMusicList;
    }
    function getAllSportsFromDb(){
        $query = "SELECT * FROM tbl_sports";
        $sports = executeQuery($query);
        while ($sport = mysqli_fetch_assoc($sports)) {
            $newSportList[]= $sport;
        }
        return $newSportList;
    }
    function getHobbiesByUidFromDb($uid){
        $query = "SELECT * FROM view_user_hobby WHERE uid=".$uid;
        $hobbies = executeQuery($query);
        if (mysqli_num_rows($hobbies)==0){
            return null;
        }
        while ($hobby = mysqli_fetch_assoc($hobbies)){
            $newHobbyList[]= $hobby;
        }
        return $newHobbyList;
    }
    function getInterestsByUidFromDb($uid){
        $query = "SELECT * FROM view_user_interest WHERE uid=".$uid;
        $interests = executeQuery($query);
        if (mysqli_num_rows($interests)==0){
            return null;
        }
        while ($interest = mysqli_fetch_assoc($interests)){
            $userInterest[] = $interest;
        }
        return $userInterest;
    }
    function getMusicsByUidFromDb($uid){
        $query = "SELECT * FROM view_user_music WHERE uid=".$uid;
        $musics = executeQuery($query);
        if (mysqli_num_rows($musics)==0){
            return null;
        }
        while ($music = mysqli_fetch_assoc($musics)){
            $userMusic[]= $music;
        }
        return $userMusic;
    }
    function getSportsByUidFromDb($uid){
        $query = "SELECT * FROM view_user_sports WHERE uid=".$uid;
        $sports = executeQuery($query);
        if (mysqli_num_rows($sports)==0){
            return null;
        }
        while ($sport = mysqli_fetch_assoc($sports)){
            $userSport[]= $sport;
        }
        return $userSport;
    }
?>