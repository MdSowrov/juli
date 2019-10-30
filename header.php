<?php 
include('db.php');

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="common-css/bootstrap.css" rel="stylesheet">

	<link href="common-css/ionicons.css" rel="stylesheet">

	<link href="common-css/layerslider.css" rel="stylesheet">


	<link href="01-homepage/css/styles.css" rel="stylesheet">

	<link href="01-homepage/css/responsive.css" rel="stylesheet">

	<link href="02-Single-post/css/styles.css" rel="stylesheet">

	<link href="02-Single-post/css/responsive.css" rel="stylesheet">

	<link href="03-About-me/css/styles.css" rel="stylesheet">

	<link href="03-About-me/css/responsive.css" rel="stylesheet">

	<link href="04-Contact/css/styles.css" rel="stylesheet">

	<link href="04-Contact/css/responsive.css" rel="stylesheet">



</head>
<body>

	<header>

		<div class="top-menu">

			<ul class="left-area welcome-area">
				<li class="hello-blog">Hello nice people, welcome to my blog</li>
				<li><a href="mailto:contact@juliblog.com">contact@juliblog.com</a></li>
			</ul><!-- left-area -->


			<div class="right-area">

				<div class="src-area">
					<form action="search.php" method="post">
						<input class="src-input" name="search" type="text" placeholder="Search">
						<button class="src-btn" type="submit" name="submit"><i class="ion-ios-search-strong"></i></button>
					</form>
				</div><!-- src-area -->

				<ul class="social-icons">
					<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
					<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
					<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
					<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
					<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
				</ul><!-- right-area -->

			</div><!-- right-area -->

		</div><!-- top-menu -->

		<div class="middle-menu center-text"><a href="#" class="logo"><img src="images/logo.png" alt="Logo Image"></a></div>

		<div class="bottom-area">

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

<?php 
	$path = $_SERVER['SCRIPT_FILENAME'];
	$currentpage = basename($path, '.php');

?>


			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a <?php if($currentpage == 'index'){ echo 'id="active"';} ?>
					href="index.php">HOME</a></li>
			<?php
				$menus = $connect->getAll("menus", "*", "status='publish'");
				foreach($menus as $menu){
					extract($menu); ?>
					<li><a <?php if(isset($_REQUEST['menu_id']) && $_REQUEST['menu_id'] == $menu_id){ echo "id='active'";} ?>
						href="post.php?menu_id=<?=$menu_id; ?>"><?=ucfirst($name); ?></a></li>
			<?php	}

			?>
			
				<li><a <?php if($currentpage == 'contact'){ echo 'id="active"';} ?>
				 href="contact.php">CONTACT</a></li>
			</ul><!-- main-menu -->

		</div><!-- conatiner -->
	</header>


