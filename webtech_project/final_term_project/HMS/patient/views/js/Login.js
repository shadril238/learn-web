function isValid(pForm){
    const email = pForm.email.value;
	const password = pForm.password.value;
    document.getElementById("email_msg").innerHTML = "";
	document.getElementById("password_msg").innerHTML = "";
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
		document.getElementById("password_msg").innerHTML = "Password cannot be empty";
		isValid = false;
	}
    else if(password.length<8){
        document.getElementById("password_msg").innerHTML = "Password length must be at least 8 characters";
		isValid = false;
    }
    else if(password.length>24){
        document.getElementById("password_msg").innerHTML = "Password length must not exceed 24 characters";
		isValid = false;
    }
    return isValid;
}