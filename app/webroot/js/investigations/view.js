$(function(){




});


function addHistory(type, content) {
	$tr = $('<tr><td>' + type + '</td><td>' + content + '</td><td>Just now</td></tr>');

	$('.history tr:first').after($tr);

	$tr.effect('highlight', {color:'yellow'});
}