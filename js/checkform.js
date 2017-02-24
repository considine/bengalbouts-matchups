$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() !== 8) {
		alert ("Please select all bouts");
	}
	else if ($('#emailInput').val().length === 0) {
		alert ("Please enter your email");
	}
	else {
		 $.ajax({
           type: "POST",
           url: url,
           data: $("#pickemform").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           }
         });
	}

	
});