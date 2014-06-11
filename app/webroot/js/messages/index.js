$(function(){


setTimeout(poll, 1000);


});

function poll() {
	$.post('/investigations/poll', {
		since: since
	}, function(result){
		console.log(result);

		result.Investigation.each(function(){
			var $tr = $("<tr><td>X</td><td>X</td><td>X</td><td>X</td></tr>")
			$("table").prepend($tr);
			$tr.effect('highlight', {color:'yellow'});
		})
	});
}

function showFakeMessage() {
	// get first row
	var tr = $("table tr:last").clone();

	// fake id
	tr.find("td:first").text(Number(tr.find("td:first").text()) + 1);

	$("table tr:first").after(tr);

	
}