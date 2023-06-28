/*
Abstract : Ajax Page Js File
File : tp.ajax.js
#CSS attributes: 
	.tpForm : Form class for ajax submission. 
	.tpFormMsg  : Div Class| Show Form validation error/success message on ajax form submission

#Javascript Variable
.tpRes : ajax request result variable
.tpFormAction : Form action variable
.tpFormData : Form serialize data variable

*/

function contactForm()
{
	window.verifyRecaptchaCallback = function (response) {
        $('input[data-recaptcha]').val(response).trigger('change');
    }

    window.expiredRecaptchaCallback = function () {
        $('input[data-recaptcha]').val("").trigger('change');
    }
	'use strict';
	var msgDiv;
	$(".tpForm").on('submit',function(e)
	{
		e.preventDefault();	//STOP default action
		$('.tpFormMsg').html('<div class="gen alert alert-success">Submitting..</div>');
		var tpFormAction = $(this).attr('action');
		var tpFormData = $(this).serialize();
		
		$.ajax({
			method: "POST",
			url: tpFormAction,
			data: tpFormData,
			dataType: 'json',
			success: function(tpRes){
				if(tpRes.status == 1){
					msgDiv = '<div class="gen alert alert-success">'+tpRes.msg+'</div>';
				}
				
				if(tpRes.status == 0){
					msgDiv = '<div class="err alert alert-danger">'+tpRes.msg+'</div>';
				}
				$('.tpFormMsg').html(msgDiv);
				
				
				setTimeout(function(){
					$('.tpFormMsg .alert').hide(1000);
				}, 10000);
				
				$('.tpForm')[0].reset();
                grecaptcha.reset();
			}
		})
	});
	
	
	/* Esta funcion es para suscripcion de correo*/
	$(".tpSubscribe").on('submit',function(e)
	{
		e.preventDefault();	//STOP default action
		var thisForm = $(this);
		var tpFormAction = thisForm.attr('action');
		var tpFormData = thisForm.serialize();
		thisForm.addClass('tp-ajax-overlay');
		
		$.ajax({
			method: "POST",
			url: tpFormAction,
			data: tpFormData,
			dataType: 'json',
		  success: function(tpRes) {
			thisForm.removeClass('tp-ajax-overlay');  
			if(tpRes.status == 1){
				msgDiv = '<div class="gen alert alert-success">'+tpRes.msg+'</div>';
			}
			if(tpRes.status == 0){
				msgDiv = '<div class="err alert alert-danger">'+tpRes.msg+'</div>';
			}
			$('.tpSubscribeMsg').html(msgDiv);
			
			setTimeout(function(){
				$('.tpSubscribeMsg .alert').hide(1000);
			}, 10000);
			
			$('.tpSubscribe')[0].reset();
		  }
		}) 
	});
	
	/* Esta funcion es para suscripcion de correo */
	
}


jQuery(document).ready(function() {
    'use strict';
	contactForm();
})	