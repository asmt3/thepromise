$(function(){

	$('#btn-add-note').click(function(){


		var content = $('#note-content').val();

		$.post('/histories/addNote', {
			investigation_id: investigation_id,
			content: content
		}, function(result){
			result = $.parseJSON(result);
			addHistory(result.History.type, result.History.content)
		})

		return false;
	})


})