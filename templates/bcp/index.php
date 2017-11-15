<?php
/**
 * https://www.facebook.com/Parad0x25
 *
 * @version 1.0.0
 * @author Dev Glenox <025glenox025@gmail.com>
 * @copyright (c) 2017, Dev Glenox Free BCP Panel
 * @license https://www.facebook.com/Parad0x25
 * @build 4/21/2017
 */

if(!defined('access') or !access) die();
include('inc/template.settings.php');
include('inc/template.functions.php');
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

	<?=$handler->printHeader()?>
	<!-- Meta Tags -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="author" content="Luzong">
 	<meta charset="UTF-8">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?=__PATH_TEMPLATE__?>img/favicon.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/owl.carousel.min.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/animate.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/magnific-popup.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/meanmenu.min.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>fonts/material-icons.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/override.css">

        <script src="https://use.fontawesome.com/ef55715097.js" async></script>
        <link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/main.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>css/responsive.css">
	<link rel="stylesheet" href="<?=__PATH_TEMPLATE__?>style.css">
	<script src='https://www.google.com/recaptcha/api.js' async></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
		<div id="preloader">
			<!--<div id="status"></div>-->
			<!-- <div class="loader" id="loader-1"></div> -->
		</div>
		<!-- Pre loader -->


		<!-- Header Top Start -->
		            <div id="fb-root"></div>
<script async>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '326223631134513',
      xfbml      : true,
      version    : 'v2.9'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

		<!-- Header Start -->
		<?php include('inc/modules/header.php'); ?>



		<!-- Header End -->


			<?php $handler->loadModule($_REQUEST['page'],$_REQUEST['subpage']); ?>



		<!-- Footer Start-->
		 <?php include('inc/modules/footer.php'); ?>
		<!-- Footer End-->

		<!-- Scroll to Top Start -->
		<a href="#" class="scrollup">
			<i class="fa fa-angle-up"></i>
		</a>
		<!-- Scroll to Top End -->

	<!-- Scripts Js Start -->

	<script src="<?=__PATH_TEMPLATE__?>js/wow.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/jquery-2.2.4.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/bootstrap.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/owl.carousel.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/owl.animate.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/waypoints.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/jquery.counterup.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/modernizr.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/jquery.meanmenu.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/custom.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/main.js"></script> <!-- Resource jQuery -->
	<script type="text/javascript" src="<?=__PATH_TEMPLATE__?>js/modals.js"></script> <!-- Modal Jq -->

<!--       Typed js  Animation  -->
	<script src="<?=__PATH_TEMPLATE__?>js/mb.js"></script>
  <script src="<?=__PATH_TEMPLATE__?>js/typed.js"></script>
  <script src="<?=__PATH_TEMPLATE__?>js/home.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/home.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/masonry.pkgd.min.js"></script>
	<script src="<?=__PATH_TEMPLATE__?>js/imagesloaded.pkgd.min.js"></script>

    <!--      Typed js Animation end  -->

	<!-- Scripts Js End -->
</body>
</html>
