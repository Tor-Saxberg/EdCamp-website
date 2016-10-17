<html>
<head>
	<meta charset="UTF-8">
	<title>Visualization</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<style type="text/css">

	.stocknm {fill: blue;}
	rect {fill: darkred; stroke:green}
	.data {width: 80%; height: 80%;}
	text {fill: rgba(208, 231, 255, 0.74);}
	.data {height: 40em;}
	#camps, #items {display: none;}
	.camp-list {display: none;}
	.item-list {display: none;}

	

	</style>

</head>

<body onload="registerEvents()"> 
	<div id="logo">
		<img src="images/logo.jpg" alt="logo">
	</div>
	<h1 id="title">Edcamp Visuals</h1>
	<img class="banner" src="images/banner.jpg" alt="banner">

<div id="body">
	
	<?php include 'nav.php' ?>

	<content class="form" id="form1">
		<h2>login</h2>
		<h3 id="login-failed"></h3>
		<div class="button" id="button-login">sign in</div>
		<form class="form1" id="form-login" action="login.php" method="POST">

			<input id="type-items" type="hidden" name="type-items" value="type-items" />
			<input id="type-camps" type="hidden" name="type-camps" value="type-camps" />
			<input id="camp-items" type="hidden" name="camp-items" value="camp-items" />
			<input id="display" type="hidden" name="display" value="display" />

			child: <input class="login" type="text" name="child"   />
			email: <input class="login" type="email" name="email"  pattern="^[^@]+@[^@]+\.[^@]+$"  />
			phone: <input class="login" type="tel" name="phone"  pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$"  />
			<br/>

			<button class="login button" type"submit" id="submit-login" name="submit-login">submit</button>

		</form>
		<div class="button" id="button-create">new account</div>
		<form class="form1" id="form-create" action="create.php" method="POST">
			<input type="hidden" name="type-items" value="type-items" />
			child: <input class="create" type="text"  name="child"  />
			parent: <input class="create" type="text"  name="parent"  />
			email address: <input class="create" type="email"  name="email" pattern="[^@]+@[^@]+\.[^@]+$" />
			phone number: <input class="create" type="tel"  name="phone" pattern="^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$" />
			age: <input class="create" type="text"  name="age"  />
			grade: <input class="create" type="text"  name="grade"  />
			<br/>

			<button class="login button" type"submit" id="submit-create" name="submit-create" >submit</button>
		</form>
	</content>


	<content id='camps'>
    	<h2>Your Camps</h2>
    	<ul id='camp-ul'class='camp-ul'>
			<?php include 'camps.php' ?>
		</ul>
	</content>
	
	
	
	<content id="items">
		<br/>
	    <ul id="items-ul"> <h2>Your Items </h2>
				<?php include 'items.php' ?>
		</ul>
	</content>

	<?php include 'statfunc.php' ?>

	<content class="data">
		<h1 style="text-align:center"> Camp Data</h1>
		<svg width="100%" height="100%" version="1.1"
		 		xmlns="http://www.w3.org/2000/svg">
			<?php include 'campdata.php' ?>
		</svg>
	</content>

	<content class="data">
		<h1 style="text-align:center"> item Data</h1>
		<svg width="100%" height="100%" version="1.1"
		 		xmlns="http://www.w3.org/2000/svg">
			<?php include 'itemdata.php' ?>
		</svg>
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
	<script src="initialize.js"></script>

</body>
</html>