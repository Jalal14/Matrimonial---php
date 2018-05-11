<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>

<?php
    function insertRegistrationToDb($user){
        $query = "INSERT INTO tbl_registration_req VALUES(null,'".$user['fname']."','".$user['mname']."','".$user['lname']."','".$user['uname']."','".$user['dob']."',".$user['gender'].",".$user['gender'].",'".$user['email']."',".$user['religion'].",'".$user['contact']."','".$user['password']."')";
        return executeNonQuery($query);
    }
    function isEmailExistInDb($user){
        $query = "SELECT uname FROM tbl_users WHERE email='".$user['email']."'";
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function isValidDOBInDb($user){
        $query = "SELECT uname FROM tbl_users WHERE email='".$user['email']."' AND dob='".$user['dob']."'";
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function permitLoginInDb($user){
        $query = "UPDATE tbl_users SET last_login='".date('Y-m-d h:m:s')."' WHERE uname='".$user['uname']."'";
        return executeNonQuery($query);
    }
    function isRegistrationReqInDb($user){
        $query = "SELECT * FROM tbl_registration_req WHERE uname='".$user['uname']."' AND password='".$user['password']."'";
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function recoverPasswordInDb($user){
        $query = "UPDATE tbl_users SET password='".$user['password']."' WHERE email='".$user['email']."'";
        return executeNonQuery($query);
    }
    function isValidUserInDb($user){
        $query = "SELECT * FROM tbl_users WHERE uname='".$user['uname']."' AND password='".$user['password']."'";
    	$result = executeQuery($query);
        return mysqli_num_rows($result);
  	}
    function updateUserInfoToDb($user){
        $query = "UPDATE tbl_users SET fname='".$user['fname']."',mname='".$user['mname']."',lname='".$user['lname']."',gender=".$user['gender'].",dob='".$user['dob']."',email='".$user['email']."',number1='".$user['number1']."',number2='".$user['number2']."',height='".$user['height']."', weight='".$user['weight']."',complexion=".$user['complexion'].",religion=".$user['religion'].",marital_status=".$user['marital_status'].",children='".$user['children']."',bio='".$user['bio']."' WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function updatePasswordToDb($user,$pass){
        $query = "UPDATE tbl_users SET password='".$pass."' WHERE uname='".$user['uname']."'";
        return executeNonQuery($query);
    }
    function hasUserPerAddressInDb($user){
        $query = "SELECT * FROM view_per_address_details WHERE per_uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function updateUserPerAddressToDb($user){
        $query = "UPDATE tbl_per_address SET per_house='".$user['per_house']."',per_road='".$user['per_road']."',per_area='".$user['per_area']."',per_police_station=".$user['per_police_station']." WHERE per_uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function insertUserPerAddressToDb($user){
        $query = "INSERT INTO tbl_per_address VALUES(".$user['uid'].", '".$user['per_house']."','".$user['per_road']."','".$user['per_area']."',".$user['per_police_station'].")";
        return executeNonQuery($query);
    }
    function hasUserPrAddressInDb($user){
        $query = "SELECT * FROM view_pr_address_details WHERE pr_uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function updateUserPrAddressToDb($user){
        $query = "UPDATE tbl_pr_address SET pr_house='".$user['pr_house']."',pr_road='".$user['pr_road']."',pr_area='".$user['pr_area']."',pr_police_station=".$user['pr_police_station']." WHERE pr_uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function insertUserPrAddressToDb($user){
        $query = "INSERT INTO tbl_pr_address VALUES(".$user['uid'].", '".$user['pr_house']."','".$user['pr_road']."','".$user['pr_area']."',".$user['pr_police_station'].")";
        return executeNonQuery($query);
    }
    function hasUserEducationInDb($user){
        $query = "SELECT * FROM view_user_education WHERE uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserEducationToDb($user){
        $query = "INSERT INTO tbl_education VALUES(".$user['uid'].", ".$user['degree'].",'".$user['institution']."','".$user['field']."','".$user['passing_year']."')";
        return executeNonQuery($query);
    }
    function updateUserEducationToDb($user){
        $query = "UPDATE tbl_education SET degree=".$user['degree'].",institution='".$user['institution']."',field='".$user['field']."',passing_year='".$user['passing_year']."' WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function hasUserJobInDb($user){
        $query = "SELECT * FROM tbl_job WHERE uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserJobToDb($user){
        $query = "INSERT INTO tbl_job VALUES(".$user['uid'].", '".$user['designation']."','".$user['company']."','".$user['joinning_date']."')";
        return executeNonQuery($query);
    }
    function updateUserJobToDb($user){
        $query = "UPDATE tbl_job SET designation='".$user['designation']."',company='".$user['company']."',joinning_date='".$user['joinning_date']."' WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function updateUserIncomeToDb($user){
        $query = "UPDATE tbl_users SET annual_income='".$user['annual_income']."' WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function hasUserFamilyInDb($user){
        $query = "SELECT * FROM tbl_family WHERE uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserFamilyToDb($user){
        $query ="INSERT INTO tbl_family VALUES(".$user['uid'].",".$user['family_type'].",'".$user['father_name']."','".$user['father_occupation']."',".$user['father_income'].",'".$user['mother_name']."','".$user['mother_occupation']."',".$user['mother_income'].",'".$user['contact']."',".$user['siblings'].")";
        return executeNonQuery($query);
    }
    function updateUserFamilyToDb($user){
        $query = "UPDATE tbl_family SET type=".$user['family_type'].",father_name='".$user['father_name']."',father_occupation='".$user['father_occupation']."',father_income='".$user['father_income']."',mother_name='".$user['mother_name']."',mother_occupation='".$user['mother_occupation']."',mother_income='".$user['mother_income']."',contact='".$user['contact']."',siblings='".$user['siblings']."' WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function updatePropicToDb($user, $propic){
        $query = "UPDATE tbl_users SET propic='".$propic."' WHERE uname='".$user['uname']."'";
        return executeNonQuery($query);
    }
?>