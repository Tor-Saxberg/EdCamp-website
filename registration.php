<html>
<head>
	<meta charset="UTF-8">
	<title>EdCamps Inc. Home</title>
	<style type="text/css" src="styles.css"></style>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link rel="stylesheet" type="text/css" href="registration.css">


</head>
<body onload="registerEvents()"> 
	<div id="logo">
		<img src="images/logo.jpg" alt="logo">
	</div>
	<h1 id="title">Edcamp registration</h1>
	<img class="banner" src="images/banner.jpg" alt="banner">

<div id="body">
	
	<?php include 'nav.php' ?>

	<content class="form" id="form1">
		<h2>login</h2>
		<h3 id="login-failed"></h3>
		<div class="button" id="button-login">sign in</div>
		<form class="form1" id="form-login" action="login.php" method="POST">
			<input id="type-camps" type="hidden" name="type-camps" value="type-camps" />
			child: <input class="login" type="text" name="child"   required/>
			email: <input class="login" type="email" name="email"  pattern="^[^@]+@[^@]+\.[^@]+$"  required/>
			phone: <input class="login" type="tel" name="phone"  pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"  />
			<br/>
			<button class="login button" type"submit" id="submit-login" name="submit-login">submit</button>
		</form>
		<div class="button" id="button-create">new account</div>
		<form class="form1" id="form-create" action="create.php" method="POST">
			<input id="type-camps" type="hidden" name="type-camps" value="type-camps" />
			child: <input class="create" type="text"  name="child"  required />
			parent: <input  class="create" type="text"  name="parent"  required />
			email address: <input class="create" type="email"  name="email" pattern="[^@]+@[^@]+\.[^@]+$" required />
			phone number: <input class="create" type="tel"  name="phone" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" />
			age: <input class="create" type="text"  name="age"  required />
			grade: <input class="create" type="text"  name="grade"  required />
			<br/>
			<button class="login button" type"submit" id="submit-create" name="submit-create" >submit</button>
		</form>
	</content>

	<content class="form" id="form2">
		<h2>Registration</h2>
		<h3 id="logged-in"></h3>
		<h3 id="message"></h3>
		<form id="form-register" action="buy.php" method="POST">
			<input type="hidden" name="type-camps" value="type-camps" />
			<input id="child-name" type="hidden" name="child"  />
			<input id="parent_count" type="hidden" name="parent_count"  />
			<input id="drop" type="hidden" name="drop" value="0" />
			camp: <input class="camp" id="input-camp" type="text" name="camp" required />
			one or two weeks: <br/>
				<select class="payment duration" name="duration" value="2">
					<option value="1" >1 week</option>
					<option value="2">2 weeks</option>
				</select> 
				<br/>
			cost per week: <input id="price" type="text" name="price" readonly />
			credit card number: <input class="payment" type="number" name="card" required	 />
			cvv: <input class="payment" type="number" name="cvv" required />
			<br/>
			<button class="button" type"submit" id="submit-register" name="submit-register">submit</button>
		</form>
		
		<div class="button another" id="button-anotherChild" onclick="anotherChild()">register another child?</div>

		<div class="button another drop" id="dropping" onclick="droppingCamp()" >deregister from a camp? </div>

		<div class="button another" id="button-anotherCamp" onclick="anotherCamp()">register  for a camp?</div>
		
	</content>

	<content id='camps'>
    	<h2>Camp Listing</h2>
    	<ul id='camp-ul'class='camp-ul'>
			<?php include 'camps.php' ?>
		</ul>
	</content>

	<content id="map-events">
		<h2>Event Locations</h2>
		<div id="map"></div>
	</content>

</div>
	<footer>
		<h2>Web Master</h2>
		<h3>Tor Saxberg</h3>
		<h4>Creator of This Site</h4>
	</footer>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="create.js"></script>
	<script src="login.js"></script>
	<script src="enroll.js"></script>
	<script type='text/javascript'></script>
	<script src="initialize.js"></script>


</body>
</html>