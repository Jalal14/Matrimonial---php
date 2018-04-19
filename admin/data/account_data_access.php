<?php require_once SERVER_ROOT."\\lib\\data_access_helper.php" ?>

<?php
    function insertUserToDb($user){
        echo $query = "INSERT INTO tbl_users VALUES(null,'".$user['fname']."','".$user['mname']."','".$user['lname']."','".$user['uname']."','".$user['dob']."',".$user['blood'].",".$user['gender'].",'".$user['email']."','".$user['number1']."',null,'".$user['password']."','".$user['propic']."',null,null,null,'".$user['religion']."',null,null,null,null,'0000-00-00 00:00:00')";
        return executeNonQuery($query);
    }
    function removeRegistrationFromDb($user){
        echo $query = "DELETE FROM tbl_registration_req WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function isEmailExistInDb($user)
    {
        $query = "SELECT uname FROM tbl_admin WHERE email='".$user['email']."'";
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function isValidDOBInDb($user)
    {
        $query = "SELECT uname FROM tbl_admin WHERE email='".$user['email']."' AND dob='".$user['dob']."'";
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function recoverPasswordInDb($user)
    {
        $query = "UPDATE tbl_admin SET password='".$user['password']."' WHERE email='".$user['email']."'";
        return executeNonQuery($query);
    }
    function isValidAdminInDb($user){
        $query = "SELECT * FROM view_admin_details WHERE uname='".$user['uname']."' AND password='".$user['password']."'";
    	$result = executeQuery($query);
        return mysqli_num_rows($result);
  	}
    function updateAdminInfoToDb($user)
    {
        $query = "UPDATE tbl_admin SET fname='".$user['fname']."',mname='".$user['mname']."',lname='".$user['lname']."',gender=".$user['gender'].",blood=".$user['blood'].",email='".$user['email']."',number1='".$user['number1']."',number2='".$user['number2']."' WHERE aid=".$user['uid'];
        return executeNonQuery($query);
    }
    function updatePasswordToDb($user,$pass)
    {
        $query = "UPDATE tbl_admin SET password='".$pass."' WHERE uname='".$user['uname']."'";
        return executeNonQuery($query);
    }
    /**function updateUserPrAddressToDb($user)
    {
        $query = "UPDATE tbl_pr_address SET pr_house='".$user['pr_house']."',pr_road='".$user['pr_road']."',pr_area='".$user['pr_area']."',pr_police_station=".$user['pr_police_station']." WHERE pr_uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function updateUserPerAddressToDb($user)
    {
        $query = "UPDATE tbl_per_address SET per_house='".$user['per_house']."',per_road='".$user['per_road']."',per_area='".$user['per_area']."',per_police_station=".$user['per_police_station']." WHERE per_uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function hasUserPerAddressInDb($user)
    {
        $query = "SELECT * FROM view_per_address_details WHERE per_uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserPerAddressToDb($user)
    {
        $query = "INSERT INTO tbl_per_address VALUES(".$user['uid'].", '".$user['per_house']."','".$user['per_road']."','".$user['per_area']."',".$user['per_police_station'].")";
        return executeNonQuery($query);

    }
    function hasUserPrAddressInDb($user)
    {
        $query = "SELECT * FROM view_pr_address_details WHERE pr_uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserPrAddressToDb($user)
    {
        $query = "INSERT INTO tbl_pr_address VALUES(".$user['uid'].", '".$user['pr_house']."','".$user['pr_road']."','".$user['pr_area']."',".$user['pr_police_station'].")";
        return executeNonQuery($query);

    }
    function hasUserEducationInDb($user)
    {
        $query = "SELECT * FROM view_user_education WHERE uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserEducationToDb($user)
    {
        $query = "INSERT INTO tbl_education VALUES(".$user['uid'].", ".$user['degree'].",'".$user['institution']."','".$user['field']."','".$user['passing_year']."')";
        return executeNonQuery($query);
    }
    function updateUserEducationToDb($user)
    {
        $query = "UPDATE tbl_education SET degree=".$user['degree']." WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }
    function hasUserJobInDb($user)
    {
        $query = "SELECT * FROM tbl_job WHERE uid=".$user['uid'];
        $result = executeQuery($query);
        return mysqli_num_rows($result);
    }
    function insertUserJobToDb($user)
    {
        $query = "INSERT INTO tbl_job VALUES(".$user['uid'].", '".$user['designation']."','".$user['company']."','".$user['joinning_date']."')";
        return executeNonQuery($query);
    }
    function updateUserJobToDb($user)
    {
        $query = "UPDATE tbl_job SET designation='".$user['designation']."',company='".$user['company']."',joinning_date='".$user['joinning_date']."' WHERE uid=".$user['uid'];
        return executeNonQuery($query);
    }**/
    function updatePropicToDb($user, $propic)
    {
        $query = "UPDATE tbl_admin SET propic='".$propic."' WHERE uname='".$user['uname']."'";
        return executeNonQuery($query);
    }
?>