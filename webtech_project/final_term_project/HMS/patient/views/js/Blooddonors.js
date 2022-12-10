function search(pForm) {

	const method = pForm.method;
	const key = pForm.name.value;
	const url = pForm.action + "?name=" + key;
	console.log(url);

	let xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		document.getElementById("tabledata").innerHTML = this.responseText;
	}
	xhttp.open(method, url);
	xhttp.send();

	return false;

}