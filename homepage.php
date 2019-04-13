<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>TypingWarzz - Main Page</title>
	<link rel="stylesheet" type="text/css" href="style/style.css">
	<link rel="stylesheet" href="lib/bootstrap-4.3.1/css/bootstrap.min.css">
</head>

<body>
	<!-- NAVBAR ON THE TOP -->
	<div class="container">
		<nav class="navbar navbar-expand-md navbar-light bg-primary navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<a href="/typeracer/homepage.php" class="navbar-brand"><img src="logo.png" width=30 length=30></a>
					<span class="navbar-text" style="font-family: 'Helvetica';color: white;font-size: 20px;"> <b> TypingWarzz </b> </span>					
				</div>
		    <ul class="navbar-nav navbar-left">
				<li class="nav-item"> 
					<a href="#" class="nav-link active"> 
						Home
					</a>
				</li>
				<li class="nav-item"> 
					<a href="#" class="nav-link"> 
						Profile
					</a>
				</li>
				<li class="nav-item"> 
					<a href="#" class="nav-link"> 
						Leaderboard
					</a>
				</li>
				<li class="nav-item"> 
					<a href="#" class="nav-link"> 
						About Us
					</a>
				</li>
			</ul>
			<ul class="navbar-nav navbar-right" style="font-size: 14	px;">
				<li class="nav-item"> 
					<span class="navbar-text" style="margin-left:5px;margin-right:5px;font-size: 13px;"><b> Speed </b></span>
				</li>
		      	<li class="nav-item">
					<span class="navbar-text" style="margin-left:5px;margin-right:5px;color: white;font-size: 13px;"> <b> Profile Name </b> </span>
		      	</li>
		      	<li class="nav-item"> 
					<a href="#" class="nav-link" style="margin-left:0px;margin-right:5px;font-size: 13px;"> <b> Logout  </b></a>
				</li>
			</ul>
		</div>
		</nav>	
	</div>
	<!-- Typing box -->
	<div class="container" style="margin-top: 20px;" id="typing_region">
		<div class="row">
			<div class="col-md-8 h-100">
				<span class="badge badge-primary" style="margin-left:3px;"> Type this ..  </span>
				<div class="jumbotron" style="min-height: 300px; margin-top:6px;">
					<p>
						<span id="correct"></span>
						<span id="wrong"></span>
						<span id="remaining"></span>
					</p>
				</div>	
			</div>
			<div class="col-md-4" style="min-height: 300px;">
					<span class="badge badge-primary" style="margin-left:3px;"> History </span>
					<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
						<thead> 
							<tr>
								<td scope="col" class="bg-primary"> MatchId </td>
								<td scope="col" class="bg-primary"> Average WPM </td>
								<td scope="col" class="bg-primary"> Total time taken </td>
							</tr>
						</thead>
					</table>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-8 h-100">
			<span class="badge badge-primary"> Leaderboard </span>
			<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
				<thead> 
					<tr>
						<td scope="col" class="bg-primary"> MatchId </td>
						<td scope="col" class="bg-primary"> PlayerId </td>
						<td scope="col" class="bg-primary"> WPM </td>
						<td scope="col" class="bg-primary"> Time </td>
					</tr>
				</thead>
			</table>
			</div>
			<div class="col-md-4" style="min-height: 300px;">
				<span class="badge badge-primary"> Ratings </span>
				<table class="table table-bordered" style="font-size: 10px;margin-top:6px;text-align: center;">
					<thead> 
						<tr>
							<td scope="col" class="bg-primary"> PlayerId </td>
							<td scope="col" class="bg-primary"> Rating </td>
							<td scope="col" class="bg-primary"> Rank </td>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>

    <script type="text/javascript" src="lib/jquery-3.4.0.min.js"></script>
    <script src="lib/bootstrap-4.3.1/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		var str = "this is a simple paragraph that is meant to be nice and easy to type which is why there will be mommas no periods or any capital letters";

		var correct = document.getElementById("correct");
		var wrong = document.getElementById("wrong");
		var remaining = document.getElementById("remaining");

		var iNext = 0;
		var wrongCount = 0;
		var typingOn = true;

		updatePage();

		document.addEventListener('keydown', function(event){
			if( typingOn==false ) return; 
			if( event.key!="Backspace" && event.key.length>1 ) return;
			if(wrongCount==0){
				if( event.key=="Backspace" ){
					if(iNext>0)
						iNext--;	
				}
				else if( event.key==str[iNext] ){
					iNext++;
					if(iNext==str.length)
						typingOn = false;
				}
				else{
					if(wrongCount<str.length-iNext)
						wrongCount++;
				}
			}
			else{
				if( event.key=="Backspace" ){
					wrongCount--;	
				}
				else{
					if(wrongCount<str.length-iNext)
						wrongCount++;
				}
			}
			updatePage();
		});

		function updatePage(){
			var str1, str2, str3, temp;
			str1 = str.substring(0,iNext);
			str2 = str.substr(iNext,wrongCount);
			str3 = str.substring(iNext+wrongCount, str.length);
			correct.innerHTML = addBreaks(str1);
			wrong.innerHTML = addBreaks(str2);
			remaining.innerHTML = addBreaks(str3);
		}

		function addBreaks(textStr){
			var res = "";
			for(var i=0; i<textStr.length; i++){
				if(textStr[i]==" ")
					res += "&nbsp;<wbr>";
				else 
					res += textStr[i];
			}
			return res;
		}
</script>
</body>
</html>
