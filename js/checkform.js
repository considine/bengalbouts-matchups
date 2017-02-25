
$('.donate-button').click(function() {
	increment($(this).attr('id'));
});

$('#modalLaunch').click(function() {
	increment("openGame");
	
});

bars();

$('.submit-pickem').click(function () {
	if ($('input[type=radio]:checked').size() !== 18) {
		alert ("Please select all bouts");
	}
	else if ($('#emailInput').val().length === 0) {
		alert ("Please enter your email");
	}
	else {
		// get data
		json_string = "{"
		for (i =0 ; i< 18; i++) {
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
         bars();

	}

	
});

function bars () {
	$.ajax({
	   type: "GET",
	   url: 'http://159.203.163.157/scores',
	   success: function(data)
	   {
	   		my_json = JSON.parse(data)
	       for (var key in my_json) {
			  if (my_json.hasOwnProperty(key)) {
			    $('#' + key).replaceWith(my_json[key]);
			  }
			}
	   }
	 });
}
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