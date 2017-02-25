
$('.donate-button').click(function() {
	increment($(this).attr('id'));
});

$('#modalLaunch').click(function() {
	increment("openGame");
	$.ajax({
		   type: "GET",
		   url: 'http://159.203.163.157/scores',
		   success: function(data)
		   {
		       console.log(data);
		   }
		 });
}



$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() !== NUMBOUTS) {
		alert ("Please select all bouts");
	}
	else if ($('#emailInput').val().length === 0) {
		alert ("Please enter your email");
	}
	else {
		// get data
		json_string = "{"
		for (i =0 ; i< NUMBOUTS; i++) {
			if (i>0) {
				json_string+=",";
			}
			json_string += '"bout' + (i+1) + '" : "' + $("input[name=bout" + (i+1) + "]:checked").val() + '"';
			console.log($("input[name=bout" + (i+1) + "]:checked").val());
		}
		json_string +="}";
		// alert(JSON.parse(json_string)["bout1"]);

		 $.ajax({
           type: "POST",
           url: 'next.php',
           data: $("#pickemform").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert("Your response has been submitted. Check your email for verification " + data); // show response from the php script.
               $('#modalLaunch').remove();
               // $.ajax({

               // })
           }
         });
	}

	
});
function increment(my_dat) {
$.ajax({
   type: "POST",
   url: 'increment.php',
   data: 'which=' + my_dat, // serializes the form's elements.
   success: function(data)
   {
       
   }
 });
}

increment("visit");