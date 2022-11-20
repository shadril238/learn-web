<?php
    //Sanitize function
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    //Email Validation
    function isValidEmail($email){
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            return false;
        }
        return true;
    }
    //Password Validation
    function isValidPassword($password){
        $uppercase=preg_match('@[A-Z]@',$password);
        $lowercase=preg_match('@[a-z]@',$password);
        $number=preg_match('@[0-9]@',$password);
        $specialchar=preg_match('@[^\w]@',$password); // \w => [A-Z][a-z][0-9]_ ; ^ => not

        if(!$uppercase or !$lowercase or !$number or !$specialchar or strlen($password)<8) {
            return false;
        }
        return true;
    }
    //Name Validation
    function isValidName($name){
        $number=preg_match('@[0-9]@',$name);
        $specialchar=preg_match('@[^\w]@',$name); 

        if(!$number and !$specialchar and strlen($name)<=24){
            return true;
        }
        return false;
    }
    //Phone no validation
    function isValidPhone($phn){
        $uppercase=preg_match('@[A-Z]@',$phn);
        $lowercase=preg_match('@[a-z]@',$phn);
        $number=preg_match('@[0-9]@',$phn);
        $specialchar=preg_match('@[^\w]@',$phn);

        if($number and !$uppercase and !$lowercase and !$specialchar and strlen($phn)===11 and $phn[0]==='0' and $phn[1]==='1'){
            return true;
        }
        return false;
    }
    //Postal code validation
    function isValidPostalCode($postal_code){
        $uppercase=preg_match('@[A-Z]@',$postal_code);
        $lowercase=preg_match('@[a-z]@',$postal_code);
        $number=preg_match('@[0-9]@',$postal_code);
        $specialchar=preg_match('@[^\w]@',$postal_code);

        if($number and !$uppercase and !$lowercase and !$specialchar and strlen($postal_code)===4 and $postal_code[0]>='1'){
            return true;
        }
        return false;
    }

    // Date Validation (Date > Present Date)
    function isValidDate($date){
        $currentDate = strtotime(date('Y-m-d'));
        if($date < $currentDate){
            return false;
        }
        return true;
    }

    // Time Validation (Time must be greater than present time)
    
    

?>