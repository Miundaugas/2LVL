
$(document).ready(function(){
	$('.text-field').change(function(){
		var myusername = $('.text-field').val();
		// console.log(myusername);
		$.ajax({
			type: "POST",
			url: "http://localhost/2LVL/2019.01.24/MVC/index.php/posts/test",
			data: {myusername:myusername},
			cache: false,
			success: function(data){
				$(".text-field").val(data);
			}
		})
	})
});

// POST'o trinimo confirmation script
$(document).ready(function(){
	$(".delete-post").click(function(){
		return confirm('Tikrai trinti posta?');
	})
})


// USER LOG IN SCRIPT
// $(document).ready(function(){
// 	$('.login').click(function(e){
// 		e.preventDefault();
// 		var logInEmail = $('.loginemail').val();
// 		var logInPass  = $('.loginpass').val();		
// 		$.ajax({
// 			type: "POST",
// 			url: "http://localhost/2LVL/2019.01.24/MVC/index.php/users/longInUser",
// 			data: {logInEmail:logInEmail, logInPass:logInPass},
// 			cache: false,
// 			success: function(data){
// 				alert(data);
// 			}
// 		})
// 	})
// });