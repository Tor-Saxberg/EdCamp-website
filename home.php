<html>
<head>
	<meta charset="UTF-8">
	<title>EdCamps Inc. Home</title>

	<link rel="stylesheet" type="text/css" href="styles.css">
	<style type="text/css">
		#store {font-size: 1.5em;}
		.price {display: none;}
	</style>

</head>
<body> 
	<div id="logo">
		<img src="images/logo.jpg" alt="logo">
	</div>
	<h1 id="title">Edcamp Homepage</h1>
	<img class="banner" src="images/banner.jpg" alt="banner">

<div id="body">
		
	<?php include 'nav.php' ?>


	<content>
		<div>
			<h2>Who We Are</h2>
			<h3>We provide educational summer camps for children aged 10-14, across the country.</h3>
			<h3>Each of our two week camps offers either computer-based or outdoor activities.</h3>
			<h4>Details of each can be found by clicking on a camp in the list below.</h4>
		</div>
	</content>
	<content>
		<div>
			<h2> Store <h2>
			<h3>Check out our<a id="store" href="catalog.html"> online store!</a> for books, back-packs, T-shirts, and much more!</h3>
			<h4>Enrolled students get a 15% discount on all items!<h5>10% more for each child after the first</h5></h4>
			
			</div>
	</content>
	<content>
		<?php include 'camps.php' ?>
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

</body>
</html>