function medShop(pForm){
	const pid=pForm.id.value;
	const name=pForm.name.value;
	const price=pForm.price.value;
	const qty=pForm.qty.value;

	let isValid=true;

	document.getElementById("global_msg").innerHTML="";

	if(pid===""){
		document.getElementById("global_msg").innerHTML="";
		isValid=false;
	}

	if(isValid){
		isValid=false;
		$(document).ready(function(){
			$('#frm').
		});
	}


	return isValid;
}