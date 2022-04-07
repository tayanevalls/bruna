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
			required:" <i class='fas fa-exclamation-circle'></i> Campo obrigatório",
		},
		email:{
			required:" <i class='fas fa-exclamation-circle'></i> Campo obrigatório",
		  	email: "<i class='fas fa-exclamation-circle'></i>Por favor, insira um e-mail válido."
		},
		city:{
			required:" <i class='fas fa-exclamation-circle'></i> Campo obrigatório",
		},
		message:{
			required:" <i class='fas fa-exclamation-circle'></i> Campo obrigatório",
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