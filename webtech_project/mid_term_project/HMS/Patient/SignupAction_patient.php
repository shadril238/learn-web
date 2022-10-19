<?php
    include "../Operations/Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        
        $f_name=$_POST['fname'];
        $l_name=$_POST['lname'];
        $email=$_POST['email'];
        $phone_no=$_POST['phn'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $blood_group=$_POST['blood_group'];
        $address=$_POST['address'];
        $district=$_POST['district'];
        $division=$_POST['division'];
        $postal_code=$_POST['postal_code'];
        $password=$_POST['password'];
        $c_password=$_POST['confirm_password'];
        //error message
        $msg_fname="";
        $msg_lname="";
        $msg_email="";
        $msg_phn="";
        $msg_dob="";
        $msg_gender="";
        $msg_bg="";
        $msg_addr="";
        $msg_dis="";
        $msg_div="";
        $msg_postal="";
        $msg_pass="";
        $msg_cpass="";
        $isValid=true;

        //first name
        if(empty($f_name)){
            $isValid=false;
            $msg_fname="Please fill up the first name properly!";
        } else {
            if(!isValidName($f_name)) {
                $isValid=false;
                $msg_fname="First name is invalid!";
            }
        }
        //last name
        if(empty($l_name)){
            $isValid=false;
            $msg_lname="Please fill up the last name properly!";
        } else {
            if(!isValidName($l_name)) {
                $isValid=false;
                $msg_fname="Last name is invalid!";
            }
        }
        //email
        if(empty($email)) {
			$isValid=false;
            $msg_email="Please fill up the email properly!";
		} else{
            if(!isValidEmail($email)){
                $isValid=false;
                $msg_email="Please provide valid email address!";
            }
        }
        //phone
        if(empty($phone_no)){
            $isValid=false;
            $msg_phn="Please fill up the phone no properly!";
        }else{
            if(!isValidPhone($phone_no)){
                $isValid=false;
                $msg_phn="Please provide valid phone no!";
            }
        }

        //dob
        if(empty($dob)){
            $isValid=false;
            $msg_dob="Please fill up the date-of-birth properly!";
        } //else
        //gender
        if(!isset($gender)){
            $isValid=false;
            $msg_gender="Please fill up the gender properly!";
        } //else

        //blood group
        if($blood_group==""){
            $isValid=false;
            $msg_bg="Please select the blood group properly!";
        } //else

        //address line
        if(empty($address)){
            $isValid=false;
            $msg_addr="Please fill up the address line 1 properly!";
        }//else
        //district
        if($district===""){
            $isValid=false;
            $msg_dis="Please select the district properly!";
        } //else
        //division
        if($division===""){
            $isValid=false;
            $msg_div="Please select the division properly!";
        }//else

        //postal code
        if(empty($postal_code)){
            $isValid=false;
            $msg_postal="Please fill up the postal code properly!";
        }else{
            if(!isValidPostalCode($postal_code)){
                $isValid=false;
                $msg_postal="Please provide valid postal code!";
            }
        }
        //password
        if(empty($password)){
            $isValid=false;
            $msg_pass="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $msg_pass="Please provide valid password!";
            }
        }	
        //confirm password
        if(empty($c_password)){
            $isValid=false;
            $msg_cpass="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($c_password)){
                $isValid=false;
                $msg_cpass="Please provide valid confirm password!";
            }
            else if($password!=$c_password){
                $isValid=false;
                $msg_cpass="Password and confirm password not matched!";
            }
            
        }	
        //valid or not
        if($isValid){
            //need to code
            echo $f_name."<br>".$l_name."<br>".$email."<br>".$phone_no."<br>".$dob."<br>".$gender."<br>".$blood_group."<br>".$address."<br>".$district."<br>".$division."<br>".$postal_code."<br>".$password."<br>".$c_password."<br>";
        }else{
            //error message
            header("Location: Signup_patient.php?msg_email=" . $msg_email. "&msg_fname=" . $msg_fname ."&msg_lname=".$msg_lname."&msg_phn=".$msg_phn."&msg_dob=".$msg_dob."&msg_gender=".$msg_gender."&msg_bg=".$msg_bg."&msg_addr=".$msg_addr."&msg_dis=".$msg_dis."&msg_div=".$msg_div."&msg_postal=".$msg_postal."&msg_pass=".$msg_pass."&msg_cpass=".$msg_cpass);
        }
    } else{
        header("Location: Login_admin.php?msg=Something went wrong!");
    }
?>