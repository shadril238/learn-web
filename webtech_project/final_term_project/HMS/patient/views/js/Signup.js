function isValid(pForm){
    const fname=pForm.fname.value;
    const lname=pForm.lname.value;
    const email = pForm.email.value;
    const phn=pForm.phn.value;
    const dob=pForm.dob.value;
    const gender=pForm.gender.value;
    const bg=pForm.blood_group.value;
    const addr=pForm.address.value;
    const dis=pForm.district.value;
    const div=pForm.division.value;
    const pcode=pForm.postal_code.value;
    const password = pForm.password.value;
    const cpassword=pForm.confirm_password.value;

    document.getElementById("fname_msg").innerHTML = "";
    document.getElementById("lname_msg").innerHTML = "";
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("phn_msg").innerHTML = "";
    document.getElementById("dob_msg").innerHTML = "";
    document.getElementById("gender_msg").innerHTML = "";
    document.getElementById("bg_msg").innerHTML = "";
    document.getElementById("addr_msg").innerHTML = "";
    document.getElementById("dis_msg").innerHTML = "";
    document.getElementById("div_msg").innerHTML = "";
    document.getElementById("pcode_msg").innerHTML = "";
    document.getElementById("photo_msg").innerHTML = "";
    document.getElementById("pass_msg").innerHTML = "";
    document.getElementById("cpass_msg").innerHTML = "";
    document.getElementById("global_msg").innerHTML = "";


    let isValid = true;
    //fname
    if(fname===""){
        document.getElementById("fname_msg").innerHTML = "First name can not be empty";
        isValid=false;
    }
    //lname
    if(lname===""){
        document.getElementById("lname_msg").innerHTML = "Last name can not be empty";
        isValid=false;
    }
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
    //confirm password
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

    //phone
    if(phn===""){
        document.getElementById("phn_msg").innerHTML = "Phone number can not be empty";
        isValid = false;
    }
    else if(phn.length>11 || phn.length<11){
        document.getElementById("phn_msg").innerHTML = "Phone number must be 11 digits";
        isValid = false;
    }
    //dob
    if(dob===""){
        document.getElementById("dob_msg").innerHTML = "Date of birth can not be empty";
        isValid = false;
    }
    //gender
    if(gender===""){
        document.getElementById("gender_msg").innerHTML = "Please select the gender properly";
        isValid = false;
    }
    //blood group
    if(bg===""){
        document.getElementById("bg_msg").innerHTML = "Please select the blood group properly";
        isValid = false;
    }
    //addr
    if(addr===""){
        document.getElementById("addr_msg").innerHTML = "Please fill up the address properly";
        isValid = false;
    }
    //dis
    if(dis===""){
        document.getElementById("dis_msg").innerHTML = "Please select the district properly";
        isValid = false;
    }
    //div
    if(div===""){
        document.getElementById("div_msg").innerHTML = "Please select the division properly";
        isValid = false;
    }
    //postal code
    if(pcode===""){
        document.getElementById("pcode_msg").innerHTML = "Please fill up the postal code properly";
        isValid = false;
    }
    else if(pcode.length!=4){
        document.getElementById("pcode_msg").innerHTML = "Valid postal code includes 4 digits numbers";
        isValid = false;
    }
    //photo
    if(photo===""){
        document.getElementById("photo_msg").innerHTML = "Please insert the photo properly";
        isValid = false;
    }
    return isValid;
}