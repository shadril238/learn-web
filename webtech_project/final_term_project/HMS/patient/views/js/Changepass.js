function isValid(pForm){
	const password = pForm.password.value;
    const npassword=pForm.npassword.value;
    const cpassword=pForm.cpassword.value;

    document.getElementById("pass_msg").innerHTML = "";
	document.getElementById("cpass_msg").innerHTML = "";
    document.getElementById("npass_msg").innerHTML = "";

    let isValid = true;
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
    //new password
    if (npassword === "") {
		document.getElementById("npass_msg").innerHTML = "New Password cannot be empty";
		isValid = false;
	}
    else if(npassword.length<8){
        document.getElementById("npass_msg").innerHTML = "New Password length must be at least 8 characters";
		isValid = false;
    }
    else if(npassword.length>24){
        document.getElementById("npass_msg").innerHTML = "New Password length must not exceed 24 characters";
		isValid = false;
    }
    //confirm new pass
    if (cpassword === "") {
		document.getElementById("cpass_msg").innerHTML = "New confirm Password cannot be empty";
		isValid = false;
	}
    else if(cpassword.length<8){
        document.getElementById("cpass_msg").innerHTML = "New confirm Password length must be at least 8 characters";
		isValid = false;
    }
    else if(cpassword.length>24){
        document.getElementById("cpass_msg").innerHTML = "New confirm Password length must not exceed 24 characters";
		isValid = false;
    }
    // check if npass and conform pass match
    if(cpassword!=npassword){
        document.getElementById("global_msg").innerHTML = "New password and conform new password not matched";
		isValid = false;
    }
    return isValid;
}