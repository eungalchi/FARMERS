<!DOCTYPE html>
<?php
		$servername = "localhost";
		$username = "root";
		$password = "tgdshlm99";
		$dbname = "projectdb";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
session_cache_expire(30);  //세션 30분동안 유지
session_start();

$user_check=$_SESSION['email'];
$ses_sql=mysqli_query($conn,"SELECT * FROM members WHERE email='$user_check' ");
$row1=mysqli_fetch_array($ses_sql);
$login_session=$row1['email'];

?>
<html lang="ko">

  <head>
    <meta charset="utf-8">

	<title>FARMERS</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- /custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //custom-theme -->
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">

</head>

<body>
<!--
  <script>


    function mydrop() {
        document.getElementById("moble_nav_item_2").classList.toggle("open");
    }

     // Close the dropdown menu if the user clicks outside of it
     window.onclick = function(event) {
      if (!event.target.matches('dropdown-menu agile_short_dropdown')) {

        var dropdowns = document.getElementsByClassName("m_nav_item dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('open')) {
            openDropdown.classList.remove('open');
          }
        }
      }
    }

  </script>
  <script>


    function mydropp() {
        document.getElementById("moble_nav_item_12").classList.toggle("open");
    }

     // Close the dropdown menu if the user clicks outside of it
     window.onclick = function(event) {
      if (!event.target.matches('dropdown-menu agile_short_dropdown')) {

        var dropdowns = document.getElementsByClassName("m_nav_item dropdown");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('open')) {
            openDropdown.classList.remove('open');
          }
        }
      }
    }

  </script> -->

	<!-- banner -->
  <image class="banner1" id="home" src="농장.jpg" width=100% height=70 />
		<div class="center-container.inner_agile"/>
				<!-- top_header_agile_info_w3ls -->
				<div class="top_header_agile_info_w3ls">
					<nav class="navbar navbar-default">
						<div class="navbar-header navbar-left">
							<button type="button" onclick="location.href='MOBILE.php'" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							<h1><a class="navbar-brand" href="HOME.php"><span>4</span>조</a></h1>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
              <div class="w3l_header_left">
								<?php
	if (!isset($login_session)) {
?>
								<ul>
									<li><i aria-hidden="true"></i> <a href="LOGIN.php">LOGIN</a></li>
									<li><i aria-hidden="true"></i> <a href="MYPAGE.php">MYPAGE</a></li>
								</ul>
<?php
	}else{
?>
								<ul>
									<li><i aria-hidden="true"></i> <?= $row1['username'] ?>님 반갑습니다!</li>
									<li><i aria-hidden="true"></i> <a href="LOGIN.php">LOGOUT</a></li>
									<li><i aria-hidden="true"></i> <a href="MYPAGE.php">MYPAGE</a></li>
								</ul>
<?php
	}
?>
							</div>
							<div class="clearfix"> </div>

							<div id="m_nav_container" class="m_nav wthree_bg">
								<nav class="menu menu--sebastian">
									<ul id="m_nav_list" class="m_nav menu__list">
										<li class="m_nav_item" id="m_nav_item_1"> <a href="HOME.php" class="link link--kumya"><i aria-hidden="true"></i><span data-letters="Home">Home</span></a></li>
										<li class="m_nav_item" id="moble_nav_item_3"> <a href="ABOUT.php" class="link link--kumya"><i  aria-hidden="true"></i><span data-letters="About">ABOUT</span></a></li>
										<li class="m_nav_item dropdown" id="moble_nav_item_2">
											<a class="dropdown-toggle link link--kumya" area-expanded="true" href="ITEM.php" data-toggle="dropdown"><i aria-hidden="true"></i><span data-letters="Items">ITEM <b class="caret"></b></a>

										</li>
										<li class="m_nav_item dropdown" id="moble_nav_item_2">
											<a href="FARM.php" class="dropdown-toggle link link--kumya" area-expanded="true" data-toggle="dropdown"><i aria-hidden="true"></i><span data-letters="Farms">FARM <b class="caret"></b></a>

										</li>
									</ul>
								</nav>
							</div>
						</div>
					</nav>
				</div>


				<!--//slider-->
			</div>

	<!-- //banner -->
	<!-- Modal1 -->

	<!-- //Modal2 -->
	<?php

		
		$mybaskets = "SELECT DISTINCT callitem FROM baskets WHERE email='$login_session'";
		$basket_list = mysqli_query($conn,$mybaskets);

	?>


	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="MYPAGE.php">MYPAGE</a><i>|</i></li>
				<li>Shopping Basket</li>
			</ul>
		</div>
	</div>
	<!-- gallery -->

	<div class="banner-bottom">
		<div class="container">
			<!---728x90--->

			<h2 class="title-w3-agileits inner">Shopping Basket</h2>
			<p class="quia">My Items </p>

<!---728x90--->

  <h3 class="page-header page-header icon-subheading">Basket Items </h3>
			<div class="w3ls_gallery_grids">
<?php
	if (mysqli_num_rows($basket_list) > 0) {
		while($row = mysqli_fetch_assoc($basket_list)){
			$abc = $row["callitem"];
			$whatitem = "SELECT address1,crop,picture,callitem FROM items WHERE callitem='$abc'";
			$aaaa = mysqli_query($conn,$whatitem);
			$showitem =  mysqli_fetch_assoc($aaaa);

?>
				<div class="col-md-4 w3_agile_gallery_grid">
					<div class="agile_gallery_grid">
						<a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est." href="ITEMinfo.php?callitem=<?= $showitem["callitem"] ?>">
							<div class="agile_gallery_grid1">
								<img src="<?= $showitem["picture"] ?>" alt="<?= $showitem["picture"] ?>" width="350" height="250"/>
								<div class="w3layouts_gallery_grid1_pos">
									<h3><?php print $showitem["crop"]; ?></h3>
									<p><?php print $showitem["address1"]; ?></p>
								</div>
							</div>
						</a>
					</div>
				</div>
<?php
		}
	}

?>

				<div class="clearfix"></div>
			</div></div></div>


	<!-- //gallery -->
<!---728x90--->
</body>

</html>
