$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() !== 15) {
		alert ("Please select all bouts");
	}
	else if ($('#emailInput').val().length === 0) {
		alert ("Please enter your email");
	}
	else {
		// get data
		for (i =0 ; i< 15; i++) {
			console.log($("input[name=bout" + i + "]").val());
		}


		 // $.ajax({
   //         type: "POST",
   //         url: 'next.php',
   //         contentType: "application/json",
   //         data: $("#pickemform").serialize(), // serializes the form's elements.
   //         success: function(data)
   //         {
   //             alert("Your response has been submitted. Check your email for verification " + data); // show response from the php script.

   //         }
   //       });
	}

	
});