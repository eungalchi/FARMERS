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
	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="HOME.php">Home</a><i>|</i></li>
				<li>MYITEM INFO</li>
			</ul>
		</div>
	</div>

  <!-- contact -->
	<div class="banner-bottom">
		<div class="container">
		<!---728x90--->

			<h2 class="title-w3-agileits inner">MYITEM INFO</h2>
			<p class="quia">View My Item Information </p>
<!---728x90--->

	<?php

		$callitem = $_REQUEST["callitem"];
		$selsql = "SELECT title,farm,address1,address2,crop,kakaolink,intro,picture,randomcode FROM items WHERE callitem='$callitem'";
		$result = mysqli_query($conn,$selsql);

		$row = mysqli_fetch_array($result);
	?>
			<!-- <div class="w3ls_map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26370863.006641828!2d-113.70834778640587!3d36.212776709411365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1497258476294"
				    allowfullscreen></iframe>
			</div> -->
			<div class="col-md-4 wthree_contact_left">
				<h4>Photo</h4>
				<img src="<?= $row["picture"] ?>" alt="<?= $row["picture"]?>" width="350" height="250"/>
				<!-- <ul>
					<li><span class="fa fa-phone" aria-hidden="true"></span> Free Phone :+(010) 012 345 211</li>
				</ul> -->
			</div>
			<div class="col-md-8 wthree_contact_left">

				<h4>Info</h4>
				<form action="MYITEMinfo.php?callitem=<?= $callitem?>" method="post">
					<div class="col-md-6 wthree_contact_left_grid">
            <p>글제목 <?php print $row["title"]; ?></p>
						<p>농장이름 <?php print $row["farm"]; ?></p>
            <p>지역 <?php print $row["address1"]; ?></p>
						<p>주문코드 <?php print $row["randomcode"];?> </p>

					</div>
					<div class="col-md-6 wthree_contact_left_grid">
            <p>카테고리 <?php print $row["crop"]; ?></p>
            <p>오픈채팅방 링크 <?php print $row["kakaolink"]; ?></p>
            <p>상세주소 <?php print $row["address2"];?></p>
					</div>
					<div class="clearfix"> </div>
					<p>상세 소개
            <?php print $row["intro"]; ?>
           </p>
				</form>

				<form action="CheckAgain.php" method="post">
				<input type="hidden" value="<?= $callitem?>" id="callitem" name="Callitem">
				<input type="submit" id="rred" name="delete" value="상품 삭제하기" ></form>

				<style>
				#rred {
					background: red;
				}
				</style>

			</br></div>


			<div class="clearfix"> </div>

		</div>
	</div>
	<!-- //contact -->
<!---728x90--->
<!-- footer -->
<?php

		$reviewphoto = basename($_FILES["reviewphotofile"]["name"]);
		move_uploaded_file($_FILES["reviewphotofile"]["tmp_name"],"/var/www/html/web/FARMERS/reviewpictures/$reviewphoto");
		$reviewmainphoto = "pictures/$reviewphoto";
		$review = $_REQUEST["review"];

if ($review == null) {
		$selreviewsql = "SELECT photo,review FROM reviews WHERE callitem='$callitem'";
		$reviewresult = mysqli_query($conn,$selreviewsql);
}
else {
		$reviewsql = "INSERT INTO reviews (email, photo, review, callitem) VALUES('$login_session','$reviewmainphoto','$review','$callitem')";
		mysqli_query($conn,$reviewsql);
		$selreviewsql = "SELECT photo,review FROM reviews WHERE callitem='$callitem'";
		$reviewresult = mysqli_query($conn,$selreviewsql);
	}

?>
      <div class="footer">
        <div class="container">
          <div class="col-md-10 w3agile_footer_grid">
            <h3>Review</h3>
<?php
	if (mysqli_num_rows($reviewresult) > 0) {
		while($row = mysqli_fetch_assoc($reviewresult)){
?>
            <ul class="w3agile_footer_grid_list">
              <span><i class="fa fa-twitter" aria-hidden="true"></i> <?= print $row1["username"]; ?></span>
            </ul>
            <img src="<?= $row["photo"] ?>" alt="<?= $row["photo"] ?>" width="100" height="100"/>
            <p>
			<?php print $row["review"]; ?>
            </p>
          </br>
<?php
		}
	}
?>
          </div></div></div>
      <!---728x90--->
</body>

</html>
