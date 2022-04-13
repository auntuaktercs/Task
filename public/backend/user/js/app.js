var APP = function() {

    // PATHS
    // ======================
    //this.ASSETS_PATH = '../../assets/';
    this.ASSETS_PATH = './assets/';
    this.SERVER_PATH = this.ASSETS_PATH + 'demo/server/';

    // GLOBAL HELPERS
    // ======================
	this.is_touch_device = function() {
        return !!('ontouchstart' in window) || !!('onmsgesturechange' in window);
	};
};

var APP = new APP();

// APP UI SETTINGS
// ======================

APP.UI = {
	scrollTop: 0, // Minimal scrolling to show scrollTop button
};


// PAGE PRELOADING ANIMATION
$(window).on('load', function() {
	setTimeout(function() {
		$('.preloader-backdrop').fadeOut(200);
		$('body').addClass('has-animation');
	},0);
});

// Hide sidebar on small screen
$(window).on('load resize scroll', function () {
    if ($(this).width() < 992) {
        $('body').addClass('sidebar-mini');
    }
});


$(function () {

    // SIDEBAR ACTIVATE METISMENU
    $(".metismenu").metisMenu();

    // Activate Tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Activate Popovers
    $('[data-toggle="popover"]').popover();

    // Activate slimscroll
    $('.scroller').each(function(){
        $(this).slimScroll({
            height: $(this).attr('data-height'),
            color: $(this).attr('data-color'),
            railOpacity: '0.9',
        });
    });


    // TOGGLE THEME-CONFIG BOX    
    $('.theme-config-toggle').on('click', function() {
        $(this).parents('.theme-config').toggleClass('opened');
    });

    // LAYOUT SETTINGS
    // ======================

    // SIDEBAR TOGGLE ACTION
    $('.js-sidebar-toggler').click(function() {
        $('body').toggleClass('sidebar-mini');
    });
    
    // fixed layout
    $('#_fixedlayout').change(function(){
        if( $(this).is(':checked') ) {
           $('body').addClass('fixed-layout');
            $('#sidebar-collapse').slimScroll({
                height: '100%',
                railOpacity: '0.9',
            });
        } else {
            $('#sidebar-collapse').slimScroll({destroy: true}).css({overflow: 'visible', height: 'auto'});
            $('body').removeClass('fixed-layout');
        }
    });

    // fixed navbar
    $('#_fixedNavbar').change(function() {
        if($(this).is(':checked')) $('body').addClass('fixed-navbar');
        else $('body').removeClass('fixed-navbar');
    });
    
    // Boxed layout
    $("[name='layout-style']").change(function(){
        if(+$(this).val()) $('body').addClass('boxed-layout');
        else $('body').removeClass('boxed-layout');
    });

    // THEMES CHANGE
    // ======================

    $('.color-skin-box input:radio').change(function() {
        var val = $(this).val();
        if(val != 'default') {
            if(! $('#theme-style').length ) {
                $('head').append( "<link href='assets/css/themes/"+val+".css' rel='stylesheet' id='theme-style' >" );
            } else $('#theme-style').attr('href', 'assets/css/themes/'+val+'.css');
        } else $('#theme-style').remove();
    });


	// BACK TO TOP
	$(window).scroll(function() {
		if($(this).scrollTop() > APP.UI.scrollTop) $('.to-top').fadeIn();
        else $('.to-top').fadeOut();
	});
	$('.to-top').click(function(e) {
		$("html, body").animate({scrollTop:0},500);
	});



    // PANEL ACTIONS
    // ======================

    $('.ibox-collapse').click(function(){
    	var ibox = $(this).closest('div.ibox');
        ibox.toggleClass('collapsed-mode').children('.ibox-body').slideToggle(200);
    });
    $('.ibox-remove').click(function(){
    	$(this).closest('div.ibox').remove();
    });
    $('.fullscreen-link').click(function(){
        if($('body').hasClass('fullscreen-mode')) {
            $('body').removeClass('fullscreen-mode');
            $(this).closest('div.ibox').removeClass('ibox-fullscreen');
            $(window).off('keydown',toggleFullscreen);
        } else {
            $('body').addClass('fullscreen-mode');
            $(this).closest('div.ibox').addClass('ibox-fullscreen');
            $(window).on('keydown', toggleFullscreen);
        }
    });
    function toggleFullscreen(e) {
        // pressing the ESC key - KEY_ESC = 27 
        if(e.which == 27) {
            $('body').removeClass('fullscreen-mode');
            $('.ibox-fullscreen').removeClass('ibox-fullscreen');
            $(window).off('keydown',toggleFullscreen);
        }
    }
    
    // Backdrop functional

    $.fn.backdrop = function() {
	    $(this).toggleClass('shined');
	    $('body').toggleClass('has-backdrop');
        return $(this);
	};

    $('.backdrop').click(closeShined);

    function closeShined() {
        $('body').removeClass('has-backdrop');
        $('.shined').removeClass('shined');
    }

});



//== VENDOR PLUGINS OPTIONS

$(function () {
    
    // Timepicker
    if($.fn.timepicker) {
        $.fn.timepicker.defaults = $.extend(!0, {}, $.fn.timepicker.defaults, {
            icons: {
                up: "fa fa-angle-up",
                down: "fa fa-angle-down"
            }
        });
    }

});
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
       var btn=document.getElementById('nextBtn');
      btn.setAttribute('type', 'submit'); 
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

//$(document).ready(function() {
//    var max_fields = 10; //Maximum allowed input fields 
//    var wrapper    = $(".wrapper"); //Input fields wrapper
//    var add_button = $(".add_fields"); //Add button class or ID
//	var x = 1; //Initlal input field is set to 1
//	
//	//When user click on add input button
//	$(add_button).click(function(e){
//        e.preventDefault();
//		//Check maximum allowed input fields
//        if(x < max_fields){ 
//            x++; //input field increment
//			 //add input field
//            $(wrapper).append('<div><tr><td><input type="text" name="input_array_name[]" placeholder="Input Text Here" /></td><td><input type="text" name="input_array_name[]" placeholder="Input Text Here" /></td><td><input type="text" name="input_array_name[]" placeholder="Input Text Here" /></td><td><input type="text" name="input_array_name[]" placeholder="Input Text Here" /></td><td><input type="text" name="input_array_name[]" placeholder="Input Text Here" /></td></tr> <a href="javascript:void(0);" class="remove_field">Remove</a></div>');
//        }
//    });
//	
//    //when user click on remove button
//    $(wrapper).on("click",".remove_field", function(e){ 
//        e.preventDefault();
//		$(this).parent('div').remove(); //remove inout field
//		x--; //inout field decrement
//    })
//});