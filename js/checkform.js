$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() == 8) {
		alert("GOOD");
	}
	else {
		alert("BAD");
	}
});