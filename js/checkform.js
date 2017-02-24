$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() !== 14) {
		alert ("Please select all bouts");
	}
	else if ($('#emailInput').val().length === 0) {
		alert ("Please enter your email");
	}
	else {
		 $.ajax({
           type: "POST",
           url: 'next.php',
           data: $("#pickemform").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert("Your response has been submitted. Check your email for verification " + data); // show response from the php script.

           }
         });
	}

	
});