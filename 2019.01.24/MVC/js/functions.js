// function postAjax(url, data, success) {
//     var params = typeof data == 'string' ? data : Object.keys(data).map(
//             function(k){ return encodeURIComponent(k) + '=' + encodeURIComponent(data[k]) }
//         ).join('&');

//     var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
//     xhr.open('POST', url);
//     xhr.onreadystatechange = function() {
//         if (xhr.readyState>3 && xhr.status==200) { success(xhr.responseText); }
//     };
//     xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
//     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
//     xhr.send(params);
//     return xhr;
// }

// function serialize(form) {
//     var field, l, s = [];
//     if (typeof form == 'object' && form.nodeName == "FORM") {
//         var len = form.elements.length;
//         for (var i=0; i<len; i++) {
//             field = form.elements[i];
//             if (field.name && !field.disabled && field.type != 'file' && field.type != 'reset' && field.type != 'submit' && field.type != 'button') {
//                 if (field.type == 'select-multiple') {
//                     l = form.elements[i].options.length; 
//                     for (var j=0; j<l; j++) {
//                         if(field.options[j].selected)
//                             s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.options[j].value);
//                     }
//                 } else if ((field.type != 'checkbox' && field.type != 'radio') || field.checked) {
//                     s[s.length] = encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value);
//                 }
//             }
//         }
//     }
//     return s.join('&').replace(/%20/g, '+');
// }

//-------------------------------------------



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
			// alert("You saved post!");
		}
	})
})

// Komentaro alertas
$("")




// Paieskos scriptas

$(".search-field").change(function(e){
	e.preventDefault();


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