/*
	Team: FIN
	Author: Dustin Abramson
	
	request.js makes a standard ajax request that passes information from a form
	to create.php.
*/

window.onload = function() {
	$("submitbutton").observe("click", sendRequest);
};


function sendRequest() {
	$('submit').request({
		onSuccess: printThatData,
		onFailure: ajaxSux,
		onException: ajaxSux
	});
}

function printThatData(ajax){
	$("results").innerHTML = ajax.responseText;
}

function ajaxSux(ajax, exception) {
	alert("Error making Ajax request:" + 
			"\n\nServer status:\n" + ajax.status + " " + ajax.statusText + 
			"\n\nServer response text:\n" + ajax.responseText);
	if (exception) {
		throw exception;
	}
}