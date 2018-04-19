<?php
    function isEmpty($values){
        foreach ($values as $value) {
            if ($value==null) {
                return "Field cannot be empty.";
            }
        }
        return null;
    }
    function matchPassword($pass1, $pass2){
        if ($pass1 != $pass2) {
            return "Password does not match.";
        }
    }
    function isValidEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo 'Invalid email address';
        }
    }
    function calculateAge($date)
    {
        $date1=date_create(date("Y-m-d"));
        $date2=date_create($date);
        return date_diff($date1,$date2);
    }
     /**   $isValid = true;
        if(empty($person['email'])){
            $isValid = false;
            $personErr['email'] = "*";
        }
        else if(isValidEmail($person['email'])==false){
            $isValid = false;
            $personErr['email'] = "Invalid email format";
        }
        else if(isUniquePersonEmail($person['email'])==false){
            $isValid = false;
            $personErr['email'] = "Email is not unique";
        }

        if(empty($person['uname'])){
            $isValid = false;
            $personErr['uname'] = "*";
        }
        else if(isValidPersonName($person['uname'])==false){
            $isValid = false;
            $personErr['uname'] = "At least two words required, Only letters and white space allowed";
        }

        
        if(empty($person['fname'])){
            $isValid = false;
            $personErr['fname'] = "*";
        }
        else if(isValidPersonName($person['fname'])==false){
            $isValid = false;
            $personErr['fname'] = "At least two words required, Only letters and white space allowed";
        }

        if(empty($person['password'])){
            $isValid = false;
            $personErr['password'] = "*";
        }
        else if(isValidPassword($person['password'])==false){
            $isValid = false;
            $personErr['password'] = "At least two words required, Only letters and white space allowed";
        }**/

    
    /*if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $password)) {
    echo 'the password does not meet the requirements!'; }
    */





        /**return $isValid;
    }
    
    function validatePersonForUpdate(&$person, &$personErr){
        $isValid = true;
        if(empty($person['email'])){
            $isValid = false;
            $personErr['email'] = "*";
        }
        else if(isValidEmail($person['email'])==false){
            $isValid = false;
            $personErr['email'] = "Invalid email format";
        }
        else if(isUniquePersonEmailForUpdate($person['id'], $person['email'])==false){
            $isValid = false;
            $personErr['email'] = "Email is not unique";
        }

        if(empty($person['fname'])){
            $isValid = false;
            $personErr['fname'] = "*";
        }
        else if(isValidPersonName($person['fname'])==false){
            $isValid = false;
            $personErr['fname'] = "At least two words required, Only letters and white space allowed";
        }
        return $isValid;**/
    //}
?>