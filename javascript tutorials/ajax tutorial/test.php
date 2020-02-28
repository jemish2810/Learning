<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<script>    
function ajax(){
var xhr = new XMLHttpRequest();
	
	// Ready State - 0
	console.log('readyState after new : ' + xhr.readyState);
	xhr.open('GET', 'index.php');
	
	// Ready State - 1
	console.log('readyState afer open : ' + xhr.readyState);
	xhr.onreadystatechange = function(){
		// Ready State - 2,3,4
		console.log('readyState inside function : ' + xhr.readyState);
		if(xhr.readyState == 4 && xhr.status == 200){
			var text = xhr.responseText;
			console.log('response from test.php : ' + xhr.responseText);
			var target = document.getElementById("ajax");
			target.innerHTML = text;
		}
	}
 
	xhr.send();
 
}
// function getjsondata(){
//         var xhr = new XMLHttpRequest();
//         xhr.onreadystatechange = function(){
//             if(xhr.readyState == 4 &&xhr.status == 200){
// 	alert('sdf');
//                 var j = JSON.parse(xhr.response);
//                 console.log("id = "+ j.id);

//             }
//             xhr.open('GET','testjson.php',true);
// 			xhr.send();
//         }
//     }
</script>

</script>
</head>
<body>
    <button onclick="getjsondata();">click me</button>
    <div id="ajax-result">

    </div>
</body>
</html>