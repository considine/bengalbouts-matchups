$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() !== 8) {
		alert ("Please select all bouts");
	}
	else if ($('#emailInput').val().length === 0) {
		alert ("Please enter your email");
	}
	else {
		$("#pickemform").ajaxForm({url: 'next.php', type: 'post'})
	}

	
});