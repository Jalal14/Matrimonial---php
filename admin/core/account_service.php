<?php require_once SERVER_ROOT."\\data\\account_data_access.php" ?>
<?php require_once SERVER_ROOT."\\data\\get_admin_data_access.php" ?>

<?php
	/**function insertUser($user)
	{
		if (isUsernameExistInDb($user)==1) {
			return "Username already exist.";
		}
		if (isEmailExistInDb($user)==1) {
			return "Email already registered.";
		}
		$userList = getAllUserFromDb();
		foreach ($userList as $users) {
			if ($users['uname'] == $user['uname']) {
				return "Username already exist.";
			}
			if ($users['email'] == $user['email']) {
				return "Email already registered.";
			}
		}
		$result = insertUserToDb($user);
		if ($result == 1) {
			return "Registration successful.";
		}else{
			return "Registration failed.try again";
		}
	}**/
	function isValidAdmin($user){
		$isValid = isValidAdminInDb($user);
	    if ($isValid==1) {
			$_SESSION['loggedAdmin'] = getAdminDetailsByUsernameFromDb($user);
	    }
	    return $isValid;
	}
	function updateAdminInfo($user)
	{
		$result = updateAdminInfoToDb($user);
		$_SESSION['loggedAdmin'] = getAdminDetailsByUsernameFromDb($user);
		if ($result==1) {
			return "Information successfully updated.";
		}
		return "Error occured during changing info,try again.";
	}
	/**
	function getAllReligion(){
		$religionList = getAllReligionFromDb();
		foreach ($religionList as $religion) {
			$newReligionList[]=$religion;
		}
		return $newReligionList;
	}**/
	function getAllGender()
	{
		$genderList = getAllGenderFromDb();
		foreach ($genderList as $gender) {
			$newGenderList[] = $gender;
		}
		return $newGenderList;
	}
	function getAllBloodGroup()
	{
		$bloodList = getAllBloodGroupFromDb();
		foreach ($bloodList as $blood) {
			$newBloodList[] = $blood;
		}
		return $newBloodList;
	}
	/**function getAllComplexion()
	{
		$complexionList = getAllComplexionFromDb();
		foreach ($complexionList as $complexion) {
			$newComplexionList[] = $complexion;
		}
		return $newComplexionList;
	}
    function getAllMaritalStatus()
    {
        $maritalList = getAllMaritalStatusFromDb();
		foreach ($maritalList as $marital) {
			$newMaritalList[] = $marital;
		}
		return $newMaritalList;
    }
    function getAllPoliceStation()
    {
        $psList = getAllPoliceStationFromDb();
		foreach ($psList as $ps) {
			$newpsList[] = $ps;
		}
		return $newpsList;
    }
    function getAllDistrict()
    {
        $districtList = getAllDistrictFromDb();
		foreach ($districtList as $district) {
			$newDistrictList[] = $district;
		}
		return $newDistrictList;
    }
    function getAllDivision()
    {
        $divisionList = getAllDivisionFromDb();
		foreach ($divisionList as $division) {
			$newDivisionList[] = $division;
		}
		return $newDivisionList;
    }
    function getAllDegree()
    {
        $degreeList = getAllDegreeFromDb();
		foreach ($degreeList as $degree) {
			$newDegreeList[] = $degree;
		}
		return $newDegreeList;
    }**/
	function updatePropic($user, $propic)
	{
		$propic = "propic/".$propic;
		if (updatePropicToDb($user, $propic) == 1) {
			$_SESSION['loggedAdmin']['propic']=$propic;
			return "Profle picture changed.";
		}
		return "Error occured.";
	}
	function updatePassword($user,$oldPass,$newPass)
	{
		$dbUser = getAdminDetailsByUsernameFromDb($user);
		if ($dbUser['password'] == $oldPass) {
			$result = updatePasswordToDb($user,$newPass);
			if ($result==1) {
				$_SESSION['loggedAdmin']['password'] = $newPass;
				return "Password changed.";
			}
			return "Error occured during changing password,try again.";
		}
		return "Wrong password.";
	}
	function recoverPassword($user)
	{
		if (isEmailExistInDb($user)==1 && isValidDOBInDb($user) ==1) {
			$result = recoverPasswordInDb($user);
			if ($result==1) {
				return "Password changed";
			}
			return "Error occured in database";
		}
		return "Incorrect information.";
	}
?>
