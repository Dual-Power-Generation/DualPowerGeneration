<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define( 'WP_USE_THEMES', true );

/** Loads the WordPress Environment and Template */
require( dirname( __FILE__ ) . '/wp-blog-header.php' );

echo "
<!DOCTYPE html>

<!-- TODO make DATA Center page-->
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="../text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="description" content=""><meta name="author" content="">
	<title>Your Engineering Solutions</title>
	<link rel="shortcut icon" href="../img/temp_logo.png">
	<!-- Bootstrap Core CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet" /><!-- Custom CSS -->
	<link href="../css/business-casual.css" rel="stylesheet" /><!-- Fonts -->
	<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
	<link href="//fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css" /><!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries --><!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<!-- https://www.w3schools.com/howto/default.asp -->
<!-- https://www.siteground.com/tutorials/php-mysql/ -->

<div id="mySidenav" class="sidenav">
  <a href="https://dualpowergeneration.sdsu.edu/">Home</a>
  <a href="https://github.com/BrandonMFong/DualPowerGeneration">Open Source</a>
  <a href="https://www.gofundme.com/f/senior-design-project-renewable-energy?utm_medium=email&utm_source=product&utm_campaign=p_email%2B5311-donation-receipt-wp-v5&utm_content=internal">GoFundMe</a>
  <a href="https://dualpowergeneration.sdsu.edu/datacenter/">Data Center</a>
  <a href="../pages/Slides.html">Slides</a>
  <!--<a href="javascript:void(0)" class="closebtn" onclick="closeNav()"></a>-->
</div>
<body>
	<!-- Animated Icon -->
	<div id="main">
	<!-- Side menu button -->
	<hamburger>
		<div class="container_for_menu" onclick="myFunction(this)">
		  <div class="bar1"></div>
		  <div class="bar2"></div>
		  <div class="bar3"></div>
		</div>
	</hamburger>
	
	
	<div class="brand">Data Center</div>
	<!--https://www.youtube.com/watch?v=ka5m_kvQUFo-->
	<div class="container">
		<div class="row">
			<div class="box">
				<div class="col-lg-12 text-center">
					<?php
						$conn = mysqli_connect("rohancp", "dualpower_BrandonMFong", "819295224bfWANG/", "dualpower_DataCenter");
						
						// Check connection
						if (!$conn) 
						{
							die("Connection failed: " . mysql_error());
						}
						
						$sql = "SELECT * from Client";
						$result = $conn->query($sql);
						// output data of each row
						while($row = mysql_fetch_assoc($result)) 
						{
						echo "<tr><td>" . $row["Organization_Name"]. "</td><td>" . $row["Admin_FirstName"] . "</td><td>"
						. $row["Admin_LastName"]. $row["ID"]. "</td></tr>";
						}
						echo "</table>";

						$conn->close();
					?>

				</div>
			</div>
		</div>
	</div>


	
<!---------------------------------------------------------------------------------------------------------->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="copyright">
						Copyright &copy; Your Engineering Solution 2019
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- jQuery --><script src="../js/jquery.js"></script><!-- Bootstrap Core JavaScript --><script src="../js/bootstrap.min.js"></script><script type="../application/ld+json">
		{
		  "@context" : "http://schema.org",
		  "@type" : "Organization",

		  
		  "name" : "Your Engineering Solution",
		  

		  
		  "url" : "\/\/dualpowergeneration.sdsu.edu",
		  

		  

		  
		}
	</script>
	</div>
</body>
</html>

";
