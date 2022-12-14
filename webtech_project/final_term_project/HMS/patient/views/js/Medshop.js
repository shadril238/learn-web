function medShop(pForm){
	const action = pForm.action;
	let pid=pForm.id.value;
	let name=pForm.name.value;
	let price=pForm.price.value;
	let qty=pForm.qty.value;
	// const stock=pForm.stock.value;

	let isValid=true;

	document.getElementById("global_msg").innerHTML="";

	if(qty===""){
		document.getElementById("global_msg").innerHTML="Product quantity can not be empty!";
		isValid=false;
	}
	// if(qty>stock){
	// 	document.getElementById("global_msg").innerHTML="Product quantity can not be empty!";
	// 	isValid=false;
	// }

	if(isValid){
		isValid=false;
		$(document).ready(function(){
			$('.frm').unbind("submit");
			$(".frm").submit(function(e){
				// let pid=$('.id').val();
				// let name=$('.name').val();
				// let price=$('.price').val();
				// let qty=$('.qty').val();
				e.preventDefault();

				$.ajax({
					url:action,
					type:'POST',
					//data:"id="+pid+"&name="+name+"&price="+price+"&qty="+qty, //this does not work properly
					data:$(this).serialize(), 
					success:function(result){
						if(result==="1"){
							alert("Product added to cart!");
						}
						else if(result==="0"){
							alert("Failed!");
						}
					}
				});
			});

		});
	}


	return isValid;
}