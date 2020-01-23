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
  <image class="banner1" id="home" src="양.jpg" width=100% height=70 />
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

	<div class="services">
		<div class="container">
			<h3 class="title-w3-agileits two">MY PAGE</h3>
			<p class="quia">What We Do</p>
			<div class="wthree_services_bottom_left banner_bottom_agile_grids">
				<div class="wthree_services_bottom_left_grid">
          <div class="col-md-4 w3_agileits_services_bottom_l_grid">
            <div class="agile_services_bottom_l_grid1">
            </div>
            <div class="serve_info_agile two">
              <!-- <image src="아가.jpg" width="150" height="150"/> -->
              <!-- <div class="more">
                <a href="#" class="hvr-shutter-in-vertical" value="profileupdate">프로필 사진 변경<span class="glyphicon glyphicon-arrow-middle"></span></a>
              </div> -->
              <div class="footer">
              <div class="container">
              <div class="col-md-3 w3agile_footer_grid">
                <h3><?= $row1['username'] ?></h3>
                <ul><li><?= $row1['email'] ?></li></ul>
                <!-- <div class="more">
                  <a href="#" class="hvr-shutter-in-vertical" value="profileupdate">닉네임 변경<span class="glyphicon glyphicon-arrow-middle"></span></a>
                </div> -->
                <image src="나비.jpg" width="100%" height="80"/>
              </div></div>
              </div>
            </div>
          </div>
        </div>

        <!-- <image src="시골.jpg" width="750" height="130"/> -->

        <div class="w3l_services_grids">
          <div class="col-md-3 w3l_services_grid">
            <div class="w3l_services_grid1">
              <span aria-hidden="true"></span>
              <h4><a href="ShoppingBasket.php">장바구니</a></h4>
              <p>ITEM 페이지에서 담은 장바구니 목록을 확인할 수 있습니다.</p>
            </div>
          </div>
          <div class="col-md-3 w3l_services_grid">
            <div class="w3l_services_grid1">
              <span aria-hidden="true"></span>
              <h4><a href="Order.php">주문 목록 조회</a></h4>
              <p>ITEM 페이지에서 구매한 주문 목록을 확인할 수 있습니다.</p>
            </div>
          </div></div>
          <div class="w3l_services_grids">
            <div class="col-md-3 w3l_services_grid">
              <div class="w3l_services_grid1">
                <span aria-hidden="true"></span>
                <h4><a href="CheckAgain.php">작성글 조회 및 </br> 코드 확인</a></h4>
                <p>작성한 ITEM & FARM 글을 조회 및 수정하고 ITEM을 등록할 때 발급받은 주문 코드를 다시 확인할 수 있습니다.</p>
              </div>
            </div>
            <!-- <div class="col-md-3 w3l_services_grid">
              <div class="w3l_services_grid1">
                <span aria-hidden="true"></span>
                <h4><a href="MYPAGEupdate.php">회원 정보 수정</a></h4>
                <p>회원님의 닉네임과 프로필 사진을 변경할 수 있습니다.</p>
              </div>
            </div> -->
					</div>
          </br>
            <!-- <image src="시골.jpg" width=100% height="130"/> -->
            <div class="clearfix"> </div>

				</div>

			</div>
		</div>
	</div>




    </body>

    </html>
