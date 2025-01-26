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

	$( "#loginFormStudent" ).on( "submit", function( event ) {
		 event.preventDefault();
		 var studentCode = $('#studentCode').val();
		 $.ajax({
		 	url:'phpFunctions/studentLoginFunction.php',
		 	type:'POST',
		 	data:{
		 		studentCode:studentCode
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
	  // $("#page3").css("display", "none");
	  $("#progressBt").css("width", "100%");
	  $("#titleForm").html("Parents Information");
	  $("html, body").animate({ scrollTop: 0 }, "fast");
	});

	$("#buttonPage2Back").click(function () {
	  $("#page1").css("display", "block");
	  $("#page2").css("display", "none");
	  // $("#page3").css("display", "none");
	$("#progressBt").css("width", "50%");
	$("#titleForm").html("Personal Information");
	$("html, body").animate({ scrollTop: 0 }, "fast");
	});

	// $("#buttonPage2Next").click(function () {
	//   $("#page1").css("display", "none");
	//   $("#page2").css("display", "none");
	//   $("#page3").css("display", "block");
	// $("#progressBt").css("width", "100%");
	// $("#titleForm").html("Scholarship Requirements");
	// $("html, body").animate({ scrollTop: 0 }, "fast");
	// });

	// $("#buttonPage3Back").click(function () {
	//   $("#page1").css("display", "none");
	//   $("#page2").css("display", "block");
	//   $("#page3").css("display", "none");
	//   $("#progressBt").css("width", "66%");
	//   $("#titleForm").html("Parents Information");
	//   $("html, body").animate({ scrollTop: 0 }, "fast");
	// });




   
})

	
new DataTable('#student'); 
new DataTable('#courses'); 
