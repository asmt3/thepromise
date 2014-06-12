$(function(){




});


function addHistory(type, content) {
	$tr = $('<tr class="' + type + '"><td class="logo"><span></span></td><td>' + content + '</td><td>Just now</td></tr>');

	$('.history').prepend($tr);

	$tr.effect('highlight', {color:'yellow'});
}