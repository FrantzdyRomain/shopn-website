

$(document).ready(function() {

	// process the form
	$('form').submit(function(event) {

		$('.form-group').removeClass('has-error'); // remove the error class
		$('.help-block').remove(); // remove the error text

		// get the form data
		// there are many ways to get this data using jQuery (you can use the class or id also)
		var formData = {
			'name' 				: document.getElementById("name").value,
			'email' 			: document.getElementById("email").value,
			'useroption'		: document.getElementById("useroption").value,
			'message' 			: document.getElementById("message").value
		};

		// process the form
		$.ajax({
			type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
			url 		: 'processform.php', // the url where we want to POST
			data 		: formData, // our data object
			dataType 	: 'json', // what type of data do we expect back from the server
			encode 		: true
			
			})
			// using the done promise callback
			.done(function(data) {

				// log data to the console so we can see
				console.log('done '+data); 

				// here we will handle errors and validation messages
				if ( ! data.success) {
					
					// handle errors for name ---------------
					if (data.errors.name) {
						$('#contactform').addClass('has-error'); // add the error class to show red input
						$('#contactform').append('<div class="help-block">' + data.errors.name + '</div>'); // add the actual error message under our input
					}

					// handle errors for email ---------------
					if (data.errors.email) {
						$('#contactform').addClass('has-error'); // add the error class to show red input
						$('#contactform').append('<div class="help-block">' + data.errors.email + '</div>'); // add the actual error message under our input
					}

					// handle errors for superhero alias ---------------
					if (data.errors.message) {
						$('#contactform').addClass('has-error'); // add the error class to show red input
						$('#contactform').append('<div class="help-block">' + data.errors.message + '</div>'); // add the actual error message under our input
					}

				} else {
						console.log('success');
					
					$('#contactform').addClass('success-submit');
					$('#contactform').append('<div class="alert alert-success"> Success! </div>');


					

				}
			})

			// using the fail promise callback
			.fail(function(data) {

				// show any errors
				// best to remove for production

				console.log('fail');

				console.log(data);
			});

		// stop the form from submitting the normal way and refreshing the page
		event.preventDefault();
	});

});