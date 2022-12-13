function isValid(pForm){
	const action = pForm.action;
	const sleep=pForm.sleep.value;
	const bph=pForm.bph.value;
	const bpl=pForm.bpl.value;
	const heartrate=pForm.heartrate.value;
	const water=pForm.water.value;
	const exer=pForm.exercise.value;
	const wei=pForm.weight.value;
	console.log(sleep);

	let isValid=true;
	document.getElementById("sleep_msg").innerHTML="";
	document.getElementById("bp_msg").innerHTML="";
	document.getElementById("heartrate_msg").innerHTML="";
	document.getElementById("water_msg").innerHTML="";
	document.getElementById("exercise_msg").innerHTML="";
	document.getElementById("weight_msg").innerHTML="";

	if(sleep===""){
		document.getElementById("sleep_msg").innerHTML="Sleep data can't be empty.";
		isValid=false;
	}
	// else{
	// 	if(sleep<0 || sleep>24){
	// 		document.getElementById("sleep_msg").innerHTML="Please enter valid sleep data.";
	// 		isValid=false;
	// 	}
	// }

	if(bph==="" || bpl===""){
		document.getElementById("bp_msg").innerHTML="This field is required.";
		isValid=false;
	}

	if(heartrate===""){
		document.getElementById("heartrate_msg").innerHTML="This field is required.";
		isValid=false;
	}
	if(water===""){
		document.getElementById("water_msg").innerHTML="This field is required.";
		isValid=false;
	}
	if(exer===""){
		document.getElementById("exercise_msg").innerHTML="This field is required.";
		isValid=false;
	}
	if(wei===""){
		document.getElementById("weight_msg").innerHTML="This field is required.";
		isValid=false;
	}
	if(isValid){
		isValid=false;
		$(document).ready(function(){
			$("#submit").click(function(e){
				e.preventDefault();
				$.ajax({
					url:action,
					type:"POST",
					data:"asleep="+sleep+"&abph="+bph+"&abpl="+bpl+"&aheartrate="+heartrate+"&awater="+water+"&aexercise="+exer+"&aweight="+wei,
					success:function(result){
						if(result==="1"){
							alert("Success");
						}
						else if(result==="0"){
							alert("Failed");
						}
					}
				});
			});
		});
		
	}
	return isValid;

}