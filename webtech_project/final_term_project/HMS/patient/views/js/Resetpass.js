function isValid(pForm){
    const email = pForm.email.value;
	const password = pForm.npassword.value;
    const sques=pForm.security_ques.value;
    const sans=pForm.security_ans.value;
    const cpassword=pForm.cpassword.value;

    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("ques_msg").innerHTML = "";
    document.getElementById("ans_msg").innerHTML = "";
    document.getElementById("pass_msg").innerHTML = "";
	document.getElementById("cpass_msg").innerHTML = "";
    let isValid = true;
    //email
    if (email === "") {
		document.getElementById("email_msg").innerHTML = "Email cannot be empty";
		isValid = false;
	}
	else {
		const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if (!pattern.test(email)) {
			document.getElementById("email_msg").innerHTML = "Email is not valid";
			isValid = false;
		}
	}
    //password
    if (password === "") {
		document.getElementById("pass_msg").innerHTML = "Password cannot be empty";
		isValid = false;
	}
    else if(password.length<8){
        document.getElementById("pass_msg").innerHTML = "Password length must be at least 8 characters";
		isValid = false;
    }
    else if(password.length>24){
        document.getElementById("pass_msg").innerHTML = "Password length must not exceed 24 characters";
		isValid = false;
    }
    //confirm pass
    if (cpassword === "") {
		document.getElementById("cpass_msg").innerHTML = "Confirm Password cannot be empty";
		isValid = false;
	}
    else if(cpassword.length<8){
        document.getElementById("cpass_msg").innerHTML = "Confirm Password length must be at least 8 characters";
		isValid = false;
    }
    else if(cpassword.length>24){
        document.getElementById("cpass_msg").innerHTML = "Confirm Password length must not exceed 24 characters";
		isValid = false;
    }
    //pass confirm pass match
    if(password!=cpassword){
        document.getElementById("global_msg").innerHTML = "Password and confirm password not matched";
		isValid = false;
    }
    //security ques
    if(sques===""){
        document.getElementById("ques_msg").innerHTML = "Please select the security question properly";
		isValid = false;
    }
    //security ans
    if(sans===""){
        document.getElementById("ans_msg").innerHTML = "Please fill up the security ans properly";
		isValid = false;
    }
    return isValid;
}