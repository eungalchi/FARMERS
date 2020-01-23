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

if(!isset($login_session))
{
	header("Location: LOGIN.php");
}
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


				<!--//slider-->
			</div>
<script>
		window.onload = callitem; 
		function callitem(){
              		var randomString = function(length) {

              			var text = "";

              			var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

              			for(var i = 0; i < length; i++) {

              				text += possible.charAt(Math.floor(Math.random() * possible.length));

              			}

              			return text;
              		}

              		// random string length
              		var random = randomString(10);

              		// insert random string to the field
              		var elem = document.getElementById("callitem").value = random;

              	}
	</script>

    <div class="services-breadcrumb">
      <div class="container">
        <ul>
          <li><a href="HOME.php">Home</a><i>|</i></li>
          <li>FARM REGISTER</li>
        </ul>
      </div>
    </div>

    <div class="banner-bottom">
      <div class="container">
      <!---728x90--->

        <h2 class="title-w3-agileits inner">FARM REGISTER</h2>
        <p class="quia">Register Farm Information </p>
  <!---728x90--->
</br>
  <div class="col-md-4 wthree_contact_left">
    <h4>Photo</h4>
    <form action="FARMinfo.php" method="post" enctype="multipart/form-data">
    <img src="액자.jpg" alt=" " width="350" height="250"/>
    <input type="file" name="photofile">

  </div>

  <div class="col-md-8 wthree_contact_left">
    <h4>Form</h4>
    <!-- <form action="#" method="post"> -->
      <div class="col-md-6 wthree_contact_left_grid">
        <input type="text" name="Name" placeholder="농장 이름" required="">
        <p><br/>
          지역 :
          <select name="Location">
              <option value="seoul">서울</option>
							<option value="incheon">인천</option>
							<option value="kyung">경기도</option>
							<option value="kang">강원도</option>
							<option value="Cheong">충청도</option>
							<option value="Jun">전라도</option>
							<option value="Kyungsang">경상도</option>
							<option value="Jeju">제주도</option>
          </select>
      </p>
        <input type="text" name="Address" placeholder="상세 주소" required="">
      </div>
      <div class="col-md-6 wthree_contact_left_grid">
        <input type="text" name="F_Category" placeholder="주 카테고리" required="">
        <!-- <p>
          주 카테고리 :
          <select name="Category" size="1" multiple>
              <option value="seoul">호박</option>
              <option value="english">고구마</option>
              <option value="chinese">감자</option>
              <option value="chinese">들깨</option>
              <option value="chinese">참깨</option>
              <option value="chinese">고추</option>
              <option value="chinese">옥수수</option>
              <option value="chinese">배추</option>
          </select></p> -->
        <input type="text" name="Number" placeholder="연락처" required="">
      </div>
      <div class="clearfix"> </div>
      <textarea name="Message" placeholder="소개글 " required=""></textarea>
	<input type="hidden" value="" id="callitem" name="Callitem">
      <input type="submit" value="Submit">
      <input type="reset" value="Clear">
    </form>
  </div>
  <div class="clearfix"> </div>
</div>
</div>
<!-- //contact -->

    </body>

    </html>
