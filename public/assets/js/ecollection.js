// Electroic Procurement Javascript, Ajax and Jquery functions


	Moneyformat();

 	var docHeight = $(window).height();
 	var footerHeight = $('#footer').height();
 	var footerTop = $('#footer').position().top + footerHeight;

  	if (footerTop < docHeight) {
  		$('#footer').css('margin-top', 10+ (docHeight - footerTop) + 'px');
  	}

  	$(".disabled").on('click', function () {
        alert("This Feature has Been Disabled For Technical Purposes");
    });

    /* Populating the Request Form */


/* fucntion for Money Format */

	function Moneyformat() {
        $('.rate , .quantity').keyup(function (event) {
          // skip for arrow keys
               if (event.which >= 37 && event.which <= 40) return;
          // format number
                 $(this).val(function (index, value) {
                 return value.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",");
              });
          });
    }


/****** Function for Adding Unit of Measusure *******/

$(document).ready(function() {
        window.setTimeout("fadeMyDiv();", 3000); //call fade in 3 seconds
      });
   function fadeMyDiv() {
       $(".alert-success").fadeOut('slow');
       $(".alert-error").fadeOut('slow');
       $(".alert-info").fadeOut('slow');
  }
