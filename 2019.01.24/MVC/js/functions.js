
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
	$(".delete-post").click(function(e){
		var conf = confirm('Delete post?');
        var btnId = e.currentTarget.id;

		if(conf == true){
			e.preventDefault();
			alert("Post deleted");
            $.ajax({
            	type: "POST",
            	url: "http://localhost/2LVL/2019.01.24/MVC/index.php/posts/delete",
            	data: {btnId:btnId},
            	cache: false,
            	success: function(){
            		location.href = 'http://localhost/2LVL/2019.01.24/MVC/index.php/posts';
        		}
            })  
		} else {
			alert("You saved post!");
		}
	})
})

// Komentaro alertas
$("")




// Paieskos scriptas

$(".search-field").change(function(e){
	e.preventDefault();
	var searchInfo = $(".search-field").val();
    $.ajax({
    	type: "POST",
    	url: "http://localhost/2LVL/2019.01.24/MVC/index.php/search/find",
    	data: {searchInfo:searchInfo},
    	cache: false,
    	success: function(data){
    		$('.search-result').html(data);
		}
    })
	// else {
	// 	alert("Tokio posto nera");
	// }	
});




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