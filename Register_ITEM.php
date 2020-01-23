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
										<li class="m_nav_item dropdown active" id="moble_nav_item_2">
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

    <div class="services-breadcrumb">
      <div class="container">
        <ul>
          <li><a href="HOME.php">Home</a><i>|</i></li>
          <li>ITEM REGISTER</li>
        </ul>
      </div>
    </div>

    <!-- contact -->
  	<div class="banner-bottom">
  		<div class="container">
  		<!---728x90--->

  			<h2 class="title-w3-agileits inner">ITEM REGISTER</h2>
  			<p class="quia">Register Item Information </p>
  <!---728x90--->

  			<!-- <div class="w3ls_map">
  				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26370863.006641828!2d-113.70834778640587!3d36.212776709411365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1497258476294"
  				    allowfullscreen></iframe>
  			</div> -->
      </br>
  			<div class="col-md-4 wthree_contact_left">
  				<h4>Photo</h4>
          <form action="ITEMinfo.php" enctype="multipart/form-data" method="post">
  				<img src="액자.jpg" alt=" " width="350" height="250"/>
          <input type="file" name="photofile">
  			</div>
  			<div class="col-md-8 wthree_contact_left">
  				<h4>Form</h4>

  				<!-- <form action="#" method="post"> -->
  					<div class="col-md-6 wthree_contact_left_grid">
              <input type="text" name="Title" placeholder="글 제목" required="">
              <input type="text" name="Name" placeholder="농장 이름" required="">
  						<!-- <input type="text" name="Location" placeholder="지역 " required=""> -->
              <p><br/>
                지역 :
                  <select name="Location" >
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
              <input type="text" name="Link" placeholder="오픈채팅방 링크(클릭시 보이게)" required="">
  						<input type="text" name="I_Category" placeholder="판매할 카테고리" required="">
              <!-- <p><br/>
                판매할 카테고리 :
                <select name="Category" size="1" multiple>
                    <option value="ho">호박</option>
                    <option value="ko">고구마</option>
                    <option value="kam">감자</option>
                    <option value="dle">들깨</option>
                    <option value="cham">참깨</option>
                    <option value="go">고추</option>
                    <option value="oks">옥수수</option>
                    <option value="ba">배추</option>
                </select>
              </p> -->
            <p></br>
                수량 :
                <select name="Quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select></p>
                <script>
                function makecode() {
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
              		var elem = document.getElementById("code").value = random;

              	}
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
                <input type="text" id="code" name="Code" placeholder="주문 코드" value="" required="" ><button onclick="makecode()" name="random">Get Code</button>


								<style>
								button {    /*button tag 에 원하는 스타일 적용*/

								  width: 90px;
								  height: 30px;
								  border-radius: 3px;
								  font-weight: 400;
								  border-color: transparent;
								  font-size: 14px;
								  background: #fcb314;
								  color: #fff;
								 cursor: pointer;
								}

								</style>

  					</div>
  					<div class="clearfix"> </div>
  					<textarea name="Message" placeholder="소개글 " required=""></textarea>
<input type="hidden" value="" id="callitem" name="Callitem">
  					<input type="submit" value="Submit">
  					<input type="reset" value="Clear">
  				</form>
  			</div>
  			<div class="clearfix"></div>

  		</div>
  	</div>
  	<!-- //contact -->

    </body>

    </html>
