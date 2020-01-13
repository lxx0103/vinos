jQuery(function() {
  jQuery('.error').hide();
  var messagetext = jQuery("textarea#msg");
  messagetext.focusout(function(){
		if (messagetext.val() == ''){messagetext.text('Message'); }
  });
  messagetext.focus(function(){
		if (messagetext.val() == 'Message') {messagetext.text(''); }					   
  });
  jQuery(".button").click(function() {
		// validate and process form
		// first hide any error messages
    jQuery('.error').hide();
	  var name = jQuery("input#name").val();
		if (name=="Name" || name == "") {
      jQuery("span#name_error").show();
      jQuery("input#name").focus();
      return false;
    }
	  var email = jQuery("input#email").val();
	  if (email == "Email" || email == "") {
      jQuery("span#email_error").show();
      jQuery("input#email").focus();
      return false;
    }
	
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	if(!emailReg.test(email)) {
	jQuery("span#email_error2").show();
    jQuery("input#email").focus();
      return false;
	}
	
	  var phone = jQuery("input#phone").val();
	  if (phone == "") {
      jQuery("input#phone").focus();
      return false;
    }
	  var message = jQuery("textarea#message").val();
	  if (message == "Message" || message == "") {
	  jQuery("span#message_error").show();
	  jQuery("textarea#message").focus();
	  return false;
    }
		
		var dataString = 'name='+ name + '&email=' + email + '&phone=' + phone + '&message=' + message;
		//alert (dataString);return false;
		
	  jQuery.ajax({
      type: "POST",
      url: "/contacto/save",
      data: dataString,
      success: function() {
        jQuery('#contactform').html("<div id='message'></div>");
        jQuery('#message').html("<b>Contact Form Submitted!</b>")
        .append("<p>We will be in touch soon.</p>")
        .hide()
        .fadeIn(1500, function() {
          jQuery('#message');
        });
      }
     });
    return false;
	});
});

