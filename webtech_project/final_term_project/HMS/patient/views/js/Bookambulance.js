function isValid(pForm){
    const addr=pForm.address.value;
    const dis=pForm.district.value;
    const div=pForm.division.value;
    const pcode=pForm.postal_code.value;
    const date=pForm.date.value;
    const time=pForm.time.value;

    document.getElementById("addr_msg").innerHTML = "";
	document.getElementById("dis_msg").innerHTML = "";
    document.getElementById("div_msg").innerHTML = "";
	document.getElementById("pcode_msg").innerHTML = "";
	document.getElementById("date_msg").innerHTML = "";
    document.getElementById("time_msg").innerHTML = "";

    let isValid = true;
    //address
    if(addr===""){
        document.getElementById("addr_msg").innerHTML = "Please fill up the address properly";
        isValid=false;
    }
    //district
    if(dis===""){
        document.getElementById("dis_msg").innerHTML = "Please fill up the district properly";
        isValid=false;
    }
    //division
    if(div===""){
        document.getElementById("div_msg").innerHTML = "Please fill up the division properly";
        isValid=false;
    }
    ///postal code
    if(pcode===""){
        document.getElementById("pcode_msg").innerHTML = "Please fill up the postal code properly";
        isValid=false;
    }
    ///date
    if(date===""){
        document.getElementById("date_msg").innerHTML = "Please fill up the date properly";
        isValid=false;
    }
    //time
    if(time===""){
        document.getElementById("time_msg").innerHTML = "Please fill up the time properly";
        isValid=false;
    }
    return isValid;
}