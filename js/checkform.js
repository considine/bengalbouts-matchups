$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() == 8) {
		
	}
	else {
		alert("Please select all bouts");
	}

	if ($('.emailInput').val().length === 0) {
		alert("Please put your email");
	}
});