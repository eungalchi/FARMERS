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

	<!-- banner -->
  <image class="banner1" id="home" src="농장.jpg" width=100% height=70 />
		<div class="center-container.inner_agile">
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
										<li class="m_nav_item dropdown active" id="moble_nav_item_2">
											<a href="FARM.php" class="dropdown-toggle link link--kumya" area-expanded="true" data-toggle="dropdown"><i aria-hidden="true"></i><span data-letters="Farms">FARM <b class="caret"></b></a>

										</li>
									</ul>
								</nav>
							</div>
						</div>
					</nav>
				</div>
      </div>



				<!--//slider-->

	<!-- //banner -->
	<!-- Modal1 -->


<div class="services-breadcrumb">
  <div class="container">
    <ul>
      <li><a href="HOME.php">Home</a><i>|</i></li>
      <li>FARM INFO</li>
    </ul>
  </div>
</div>
<!-- icons -->

<!-- contact -->
<div class="banner-bottom">
  <div class="container">
  <!---728x90--->
<?php

	$farmname = $_REQUEST["Name"];
	$location = $_REQUEST["Location"];
	$address = $_REQUEST["Address"];
	$category = $_REQUEST["F_Category"];
	$phone = $_REQUEST["Number"];
	$intro = $_REQUEST["Message"];
	$callitem = $_REQUEST["Callitem"];
	$photo = basename($_FILES["photofile"]["name"]);
	move_uploaded_file($_FILES["photofile"]["tmp_name"],"/var/www/html/web/FARMERS/farmpictures/$photo");
	$mainphoto = "farmpictures/$photo";


	if ($intro != null){
		$sql = "INSERT INTO farms (email, farmname,category,address1,address2,phonenum,intro,callitem,picture) VALUES ('$login_session','$farmname','$category','$location','$address','$phone','$intro','$callitem','$mainphoto')";
		mysqli_query($conn,$sql);
		$selsql = "SELECT email,farmname,category,address1,address2,phonenum,intro,picture FROM farms WHERE callitem='$callitem'";
		$result = mysqli_query($conn,$selsql);
	}else{
		$callitem = $_REQUEST["callitem"];
		$selsql = "SELECT email,farmname,category,address1,address2,phonenum,intro,picture FROM farms WHERE callitem='$callitem'";
		$result = mysqli_query($conn,$selsql);
	}
		$row = mysqli_fetch_array($result);
?>

    <h2 class="title-w3-agileits inner">FARM INFO</h2>
    <p class="quia">View Farm Information </p>
<!---728x90--->
    <div class="more">
      <a href="Register_FARM.php" class="hvr-shutter-in-vertical">Register<span class="glyphicon glyphicon-arrow-middle"></span></a>
    </div>

    <!-- <div class="w3ls_map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26370863.006641828!2d-113.70834778640587!3d36.212776709411365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1497258476294"
          allowfullscreen></iframe>
    </div> -->
    <div class="col-md-4 wthree_contact_left">
      <h4>Photo</h4>
      <img src="<?= $row["picture"] ?>" alt="<?= $row["picture"] ?>" width="350" height="250"/>
      <!-- <ul>
        <li><span class="fa fa-phone" aria-hidden="true"></span> Free Phone :+(010) 012 345 211</li>
      </ul> -->
    </div>
    <div class="col-md-8 wthree_contact_left">
      <h4>Info</h4>
      <form action="#" method="post">
        <div class="col-md-6 wthree_contact_left_grid">
          <p><?php print $row["farmname"]; ?> </p>
          <p><?php print $row["address2"]; ?> </p>

        </div>
        <div class="col-md-6 wthree_contact_left_grid">
          <p><?php print $row["category"]; ?> </p>
          <p><?php print $row["phonenum"]; ?> </p>

        </div>
        <div class="clearfix"> </div>
        <p>
          <?php print $row["intro"] ?>
         </p>
        <!-- <input type="submit" value="Update(생략)"> -->
      </form>
<!-- 관리자 MODE => 게시글 삭제 Button -->
			<?php
				if ($row1['email'] == "admin@admin.com"|| $row1['email'] == $row['email']){ //관리자 계정일 경우
			?>
				<form action="FARM.php" method="post">
				<input type="hidden" value="<?= $callitem?>" id="callitem" name="Callitem"> </br>
				<input type="submit" id="rred" name="delete" value="농장 삭제하기" onclick="delete_row()"></form>

				<style>
				#rred {
					background: red;
				}
				</style>
				
			<?php
				}else{
			?>

			<?php
				}
			?>
  </br></div>
<!--
  <img src="호박.jpg" alt=" " width="350" height="250"/>
  <img src="호박.jpg" alt=" " width="350" height="250"/>
  <img src="호박.jpg" alt=" " width="350" height="250"/>
  <img src="호박.jpg" alt=" " width="350" height="250"/>
-->
    <div class="clearfix"> </div>
  </div>
</div>
<!-- //contact -->
<!---728x90--->

    </body>

    </html>
