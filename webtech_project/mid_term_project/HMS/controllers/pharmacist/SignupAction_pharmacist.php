<?php
    session_start();
    if(!isset($_SESSION['email']) or !isset($_SESSION['pharmacist_idx'])){
        $_SESSION['global_msg']="Please login first!";
        header("Location: ../../views/pharmacist/Login_pharmacist.php");
    }

    include "../Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        
        $f_name=sanitize($_POST['fname']);
        $l_name=sanitize($_POST['lname']);
        $email=sanitize($_POST['email']);
        $phone_no=sanitize($_POST['phn']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $blood_group=sanitize($_POST['blood_group']);
        ///$address=sanitize($_POST['address']);
        $eduqual=sanitize($_POST['eduqual']);
        $password=sanitize($_POST['password']);
        $c_password=sanitize($_POST['confirm_password']);
        $photo = $_FILES['photo'];

        ///var_dump($_FILES);
        $isValid=true;
        //photo (files)
        if($photo['size']<=0){
            $isValid=false;
            $_SESSION['msg_photo']="Please upload image properly!";
        }else{
            $formats=array("image/png","image/jpg");
            if(!in_array($photo['type'],$formats)){
                $isValid=false;
                $_SESSION['msg_photo']="Please upload your image in right format!";
            }
        }

        //first name
        if(empty($f_name)){
            $isValid=false;
            $_SESSION['msg_fname']="Please fill up the first name properly!";
        } else {
            if(!isValidName($f_name)) {
                $isValid=false;
                $_SESSION['msg_fname']="First name is invalid!";
            }
        }
        //last name
        if(empty($l_name)){
            $isValid=false;
            $_SESSION['msg_lname']="Please fill up the last name properly!";
        } else {
            if(!isValidName($l_name)) {
                $isValid=false;
                $_SESSION['msg_fname']="Last name is invalid!";
            }
        }
        //email
        if(empty($email)) {
			$isValid=false;
            $_SESSION['msg_email']="Please fill up the email properly!";
		} else{
            if(!isValidEmail($email)){
                $isValid=false;
                $_SESSION['msg_email']="Please provide valid email address!";
            }
        }
        //phone
        if(empty($phone_no)){
            $isValid=false;
            $_SESSION['msg_phn']="Please fill up the phone no properly!";
        }else{
            if(!isValidPhone($phone_no)){
                $isValid=false;
                $_SESSION['msg_phn']="Please provide valid phone no!";
            }
        }

        //dob
        if(empty($dob)){
            $isValid=false;
            $_SESSION['msg_dob']="Please fill up the date-of-birth properly!";
        } //else
        //gender
        if(!isset($gender)){
            $isValid=false;
            $_SESSION['msg_gender']="Please fill up the gender properly!";
        } //else

        //blood group
        if($blood_group==""){
            $isValid=false;
            $_SESSION['msg_bg']="Please select the blood group properly!";
        } //else

        //educational qualification
        if(empty($eduqual)){
            $isValid=false;
            $_SESSION['msg_eduqual']="Please fill up your educational qualification properly";
        } else{
            if(!isValidName($eduqual)){
                $isValid=false;
                $_SESSION['msg_eduqual']="Please enter your educational qualification properly";
            }
        }
        
        //password
        if(empty($password)){
            $isValid=false;
            $_SESSION['msg_pass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $_SESSION['msg_pass']="Please provide valid password!";
            }
        }	
        //confirm password
        if(empty($c_password)){
            $isValid=false;
            $_SESSION['msg_cpass']="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($c_password)){
                $isValid=false;
                $_SESSION['msg_cpass']="Please provide valid confirm password!";
            }
            else if($password!=$c_password){
                $isValid=false;
                $_SESSION['msg_cpass']="Password and confirm password not matched!";
            }
            
        }	
        //valid or not
        if($isValid){
            //need to code
            //echo $f_name."<br>".$l_name."<br>".$email."<br>".$phone_no."<br>".$dob."<br>".$gender."<br>".$blood_group."<br>".$address."<br>".$district."<br>".$division."<br>".$postal_code."<br>".$password."<br>".$c_password."<br>".$photo."<br>";
            
            //json file
            $filename="../../models/pharmacist_data.json";
            $array_data=array();
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                //checking if the email is unique
                if(!is_null($array_data)){
                    foreach($array_data as $rd){
                        if($rd["email"] === $email){
                            $_SESSION['msg_email']="Email must be unique!";
                            break;
                        }
                    }
                }
            }
            if(!isset($_SESSION['msg_email'])){
                //photos
                $ext = explode(".", $photo['name']);
                $ext = $ext[count($ext) - 1];
                $source = $photo['tmp_name'];
                $photo_name = md5(date('Y-m-d H:i:s:u')); //md5 generates Hash
                $photo_name=$photo_name.".".$ext;
                $destination="../../models/pharmacist_images/".$photo_name;
                $photo=$destination;
                move_uploaded_file($source,$destination);
                //json
                $data=array("email"=>$email, "password"=>$password, "fname"=>$f_name,"lname"=>$l_name,"phone"=>$phone_no, "dob"=>$dob,"gender"=>$gender,"blood_group"=>$blood_group,"eduqual"=>$eduqual,"photo"=>$photo, "security_ques"=>"", "security_ans"=>"");
                $array_data[]=$data;
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);
            }else{
                header("Location: ../../views/pharmacist/Signup_pharmacist.php");
            }
        }else{
            //error message
            header("Location: ../../views/pharmacist/Signup_pharmacist.php");
        }
    } else{
        $_SESSION['global_msg']="Something went wrong!";
        header("Location: ../../views/pharmacist/Signup_pharmacist.php");
    }
?>