function isValid(pForm){
    const sques=pForm.security_ques.value;
    const sans=pForm.security_ans.value;

    document.getElementById("ques_msg").innerHTML = "";
    document.getElementById("ans_msg").innerHTML = "";
    let isValid = true;
    
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