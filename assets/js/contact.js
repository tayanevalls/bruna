$(function() {
	// Validate the contact form
  $('#contact-form').validate({
  	// Specify what the errors should look like
  	// when they are dynamically added to the form


  	// Add requirements to each of the fields
  	rules: {
		name: {
            required: true,
		  },
		  city: {
            required: true,
		  },
		  email: {
            required: true,
            email: true
		  },
		  phone: {
            required: true,
		  },
		  message: {
            required: true,
		  },
        
  	},
  	
  	// Specify what error messages to display
  	// when the user does something horrid
  	messages: {

		name:{
  			required:" <i class='fas fa-exclamation-circle'></i> Campo obrigatório",
		  },
		  phone:{
			required:" <i class='fas fa-exclamation-circle'></i> Campo obrigatóri",
		},
		email:{
			required:" <i class='fas fa-exclamation-circle'></i> This field is required.",
		  	email: "<i class='fas fa-exclamation-circle'></i> Please enter a valid email address."
		},
		city:{
			required:" <i class='fas fa-exclamation-circle'></i> This field is required.",
		},
		message:{
			required:" <i class='fas fa-exclamation-circle'></i> This field is required.",
		},
  	},
  	
  	submitHandler: function(form) {
  		$("#send").attr("value", "sending...");
  		$(form).ajaxSubmit({
  			success: function(responseText, statusText, xhr, $form) {
  				$(form).slideUp("fast");
  				$("#response-contact").html(responseText).hide().slideDown("fast");
  			}
  		});
  		return false;
  	}
  });
});