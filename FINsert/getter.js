/*
	Team: FIN
	Author: Dustin Abramson
	
	interactively controls forms disallowing the insertion of additional information
	while leaving all of the required fields in the form active.
	
	getter.js also makes ajax requests to getter.php when a building is selected to return
	the floor names for that building so the user can select which floor they would like to
	add an object too.
*/

window.onload = function() {
	$("buildings").observe("change", repopulate);
	$("submitbutton").observe("click", sendRequest);
	$("submit").inOrOut[0].observe("click", inFunc);
	$("submit").inOrOut[1].observe("click", outFunc);
	if($("submit").inOrOut[0].checked == true) {
		inFunc();
	} else {
		outFunc();
	}
};

function inFunc() {
    $("mapHolder").hide();
	$("submit").latitude.disable();
	$("submit").longitude.disable();
	$("submit").bid.enable();
	$("submit").fid.enable();
	repopulate();
}

function outFunc() {
	$("submit").latitude.enable();
	$("submit").longitude.enable();
	$("submit").bid.disable();
	$("submit").fid.disable();
	$("floors").innerHTML = "<option value = 0>No Floor ID</option>";
	// code amended to show the map helper - 4/18/11
	$("mapHolder").show();
}

function repopulate() {
	new Ajax.Request("getter.php", 
		{
			method: "get",
			parameters: { bid : $("buildings").value },
			onSuccess: popIt,
			onFailure: ajaxBlows,
			onException: ajaxBlows
		});
};

function popIt(ajax){
	$("floors").innerHTML = ajax.responseText;
};

function ajaxBlows(ajax, exception) {
	alert("Error making Ajax request:" + 
			"\n\nServer status:\n" + ajax.status + " " + ajax.statusText + 
			"\n\nServer response text:\n" + ajax.responseText);
	if (exception) {
		throw exception;
	}
};
