<?php
    session_start();
    include "../Validation.php";

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $name=sanitize($_POST['name']);
        $email=sanitize($_POST['email']);
        $phone_no=sanitize($_POST['phn']);
        $dob=sanitize($_POST['dob']);
        $gender=sanitize($_POST['gender']);
        $degree=sanitize($_POST['degree']);
        $dept=sanitize($_POST['dept']);
        $password=sanitize($_POST['password']);
        $c_password=sanitize($_POST['confirm_password']);
        $photo = $_FILES['photo'];
        $security_ques="";
        $security_ans="";

        $isValid=true;

        //Photo (files)
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

        //Name
        if(empty($name)){
            $isValid=false;
            $_SESSION['msg_name']="Please fill up the name properly!";
        } else {
            if(!isValidName($name)) {
                $isValid=false;
                $_SESSION['msg_name']="Name is invalid!";
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
        } 
        //gender
        if(!isset($gender)){
            $isValid=false;
            $_SESSION['msg_gender']="Please fill up the gender properly!";
        } 
        //Password
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
        //degree
        if(empty($degree)){
            $isValid=false;
            $_SESSION['msg_degree']="Please fill up the degree properly!";
        } ///else - need further validation [Degree holds only Character]
        //department
        if(empty($dept)){
            $isValid=false;
            $_SESSION['msg_dept']="Please fill up the department properly!";
        }//else - need further validation [Dept holds only Character]

        //All valid
        if($isValid){
            //json file
            $filename="../../models/doctor_data.json";
            $array_data=array();
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
			    $array_data=json_decode($current_data, true);
                //checking if the email is unique
                if(!is_null($array_data)){
                    foreach($array_data as $rd){
                        if($rd['email'] === $email){
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
                $destination="../../models/doctor_images/".$photo_name;
                $photo=$destination;
                move_uploaded_file($source,$destination);
                //json insert
                $data=array("email"=>$email, "password"=>$password, "name"=>$name, "degree"=>$degree, "department"=>$dept,"phone"=>$phone_no, "dob"=>$dob,"gender"=>$gender,"photo"=>$photo, "security_ques"=>$security_ques, "security_ans"=>$security_ans);
                $array_data[]=$data;
                $final_data=json_encode($array_data);
			    file_put_contents($filename,$final_data);
            }else{
                header("Location:../../views/doctor/Signup_doctor.php");
            }

        }else{
            header("Location:../../views/doctor/Signup_doctor.php");
        }
    }else{
        $_SESSION['msg_global']="Something went wrong!";
        header("Location:../../views/doctor/Signup_doctor.php");
    }

?>