$(document).ready(function(){

	$( "#loginForm" ).on( "submit", function( event ) {
		 event.preventDefault();
		 var usernameLogin = $('#usernameLogin').val();
		 var pwdLogin = $('#pwdLogin').val();
		 $.ajax({
		 	url:'phpFunctions/login_functions.php',
		 	type:'POST',
		 	data:{
		 		usernameLogin:usernameLogin,
		 		pwdLogin:pwdLogin
		 	},
		 	success:function(response){
			 		// alert(response);
			 			$('.responseLogin').html(response).effect('shake');
			 		
		 		}
		 	});
		});

	$("#buttonPage1Next").click(function () {
	  $("#page1").css("display", "none");
	  $("#page2").css("display", "block");
	  $("#progressBt").css("width", "100%");
	  $("#titleForm").html("Parents Information");
	  $("html, body").animate({ scrollTop: 0 }, "fast");
	});

	$("#buttonPage2Back").click(function () {
	  $("#page1").css("display", "block");
	  $("#page2").css("display", "none");
	$("#progressBt").css("width", "50%");
	$("#titleForm").html("Personal Information");
	$("html, body").animate({ scrollTop: 0 }, "fast");
	});


   
})

	
new DataTable('#student'); 