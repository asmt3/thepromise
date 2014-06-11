$(function(){





});


function showFakeMessage() {
	// get first row
	var tr = $("table tr:last").clone();

	// fake id
	tr.find("td:first").text(Number(tr.find("td:first").text()) + 1);

	$("table tr:first").after(tr);

	tr.effect('highlight', {color:'red'});
}