$(function(){



	setInterval(poll, 1000);
})


function poll() {


	$.post('/investigations/poll/' + max_id, {


	}, function(results){

		results = $.parseJSON(results);
		console.log(results);


		$(results.investigations).each(function(){
			var tr_html = '<tr class="open">';
			tr_html += '<td>' + this.Investigation.id + '&nbsp;</td>';
			tr_html += '<td>' + this.Investigation.phone + '&nbsp;</td>';
			tr_html += '<td>' + this.Investigation.name + '</td>';
			tr_html += '<td>' + this.Investigation.Message[0].content + '</td>';
			tr_html += '<td>' + this.Investigation.status + '</td>';
			tr_html += '<td>' + this.Investigation.created + '</td>';
			tr_html += '<td class="actions">';
			tr_html += '<a href="/investigations/view/' + + '">View</a>';
			tr_html += '</td>';
			tr_html += '</tr>';

		$tr = $(tr_html);

		$('table tr:first').after($tr);

		$tr.effect('highlight', {color:'yellow'});
		})
	

	max_id = results.max_id;


	});
}