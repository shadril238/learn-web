<?php
    session_start();
    include "../Validation.php";
    if($_SERVER['REQUEST_METHOD']==="POST"){
        $email=sanitize($_POST['email']);
        $security_ans=sanitize($_POST['security_ans']);
        $password=sanitize($_POST['npassword']);
        $security_ques=sanitize($_POST['security_ques']);
        $cpassword=sanitize($_POST['cpassword']);
        $isValid=true;
        $validUser=false;
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
        //password
        if(empty($password)){
            $isValid=false;
            $_SESSION['msg_npass']="Please fill up the password properly!";
        } else {
            if(!isValidPassword($password)){
                $isValid=false;
                $_SESSION['msg_npass']="Please provide valid password!";
            }
        }   
        //confirm password
        if(empty($cpassword)){
            $isValid=false;
            $_SESSION['msg_cpass']="Please fill up the confirm password properly!";
        } else {
            if(!isValidPassword($cpassword)){
                $isValid=false;
                $_SESSION['msg_cpass']="Please provide valid confirm password!";
            }
            else if($password!=$cpassword){
                $isValid=false;
                $_SESSION['msg_cpass']="Password and confirm password not matched!";
            } 
        }
        //security ans
        if(empty($security_ans)){
            $isValid=false;
            $_SESSION['msg_securityA']="Security answer can't be empty!";
        }
        //security ques
        if($security_ques===""){
            $isValid=false;
            $_SESSION['msg_securityQ']="Please select the security question properly!";
        }
        if($isValid){
            $filename="../../models/pharmacist_data.json";
            $pharmacist_idx=-1; //pharmacist index
            $array_data=array();
            if(file_exists($filename)){
                $current_data=file_get_contents($filename);
                $current_data=json_decode($current_data);
                var_dump(count($current_data));
                if(!is_null($current_data)){

                    for($pharmacist_idx=0;$pharmacist_idx<count($current_data);$pharmacist_idx++){
                        if($current_data[$pharmacist_idx]->email === $email and $current_data[$pharmacist_idx]->security_ans===$security_ans and $current_data[$pharmacist_idx]->security_ques===$security_ques){
                            $validUser=true;
                            //$current_data=file_get_contents($filename);
                            
                            $data=array("email"=>$current_data[$pharmacist_idx]->email, "password"=>$password, "fname"=>$current_data[$pharmacist_idx]->fname,"lname"=>$current_data[$pharmacist_idx]->lname,"phone"=>$current_data[$pharmacist_idx]->phone, "dob"=>$current_data[$pharmacist_idx]->dob,"gender"=>$current_data[$pharmacist_idx]->gender,"blood_group"=>$current_data[$pharmacist_idx]->blood_group,"eduqual"=>$current_data[$pharmacist_idx]->eduqual,"photo"=>$current_data[$pharmacist_idx]->photo,"security_ques"=>$current_data[$pharmacist_idx]->security_ques, "security_ans"=>$current_data[$pharmacist_idx]->security_ans);
                            $current_data[$pharmacist_idx]=$data;
                            $current_data=json_encode($current_data);
                            file_put_contents($filename,$current_data);
                            break;
                        }
                    }
                }else{
                    //array is null
                    $_SESSION['global_msg']="Pharmacist data not available. Please contact with admin.";
                    header("Location: ../../views/pharmacist/Forgotpass_pharmacist.php");
                }
                if(!$validUser){
                    $_SESSION['global_msg']="Details not matched! Please try again.";
                    header("Location: ../../views/pharmacist/Forgotpass_pharmacist.php");
                }

            }else{
                $_SESSION['global_msg']="Pharmacist data not available. Please contact with admin.";
                header("Location: ../../views/pharmacist/Forgotpass_pharmacist.php");
            }
        }else{
            header("Location: ../../views/pharmacist/Forgotpass_pharmacist.php");
        }
    }else{
        //something went wrong
        $_SESSION['msg_global']="Something went wrong!";
        header("Location: ../../views/pharmacist/Forgotpass_pharmacist.php");
    }
?>