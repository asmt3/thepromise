$(function(){



	$('#btn-text-survivor').click(function(){



		var content = $('#text-content').val()
		var number = $('#text-number').val();

		$.post('/investigations/send_text/' + investigation_id, {
			
			number: number,
			content: content

		}, function(result){
			
			addHistory('outbound-sms', content);

		});
	})
})