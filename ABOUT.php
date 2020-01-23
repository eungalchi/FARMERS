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
										<li class="m_nav_item active" id="moble_nav_item_3"> <a href="ABOUT.php" class="link link--kumya"><i  aria-hidden="true"></i><span data-letters="About">ABOUT</span></a></li>
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
      <div class="services-breadcrumb">
    		<div class="container">
    			<ul>
    				<li><a href="HOME.php">Home</a><i>|</i></li>
    				<li>ABOUT</li>
    			</ul>
    		</div>
    	</div>

      <!-- <div class="banner-bottom">
        <div class="container">

          <h2 class="title-w3-agileits inner">About</h2>
          <p class="quia">Market Information</p> -->

					<div class="about">
		<div class="container">
		<!---728x90--->

			<h2 class="title-w3-agileits inner">About</h2>
			<p class="quia">Market Information</p>
<!---728x90--->

			<div class="agile_about_grids">
				<div class="col-md-6 agile_about_grid_right">
						<h4>Seller</h4>
						<p>주말 농작 잔여 농작물 판매 사이트인 FARMERS 입니다. 판매자께서는 ITEM, FARM 페이지에서 직접 게시글을 작성할 수 있습니다. 양식에 맞추어 알맞게 작성하시고 등록하시면 됩니다.
							FARMERS는 개인정보 유출 방지를 위하여 주문 거래를 카카오 오픈채팅 링크를 사용합니다. 글을 작성하실 때에 오픈채팅방을 개설하시고 그 주소를 양식에 입력해 주시면 됩니다.
							구매자는 이 주소의 채팅방에 입장하여 판매자와 직접 대화 후에 직거래하실 수 있습니다. 그리고, 글을 작성하실 때 발급받은 주문 코드를 구매자와 직거래 시에 전달해주시면 구매자가 리뷰를 작성할 수 있습니다.
							주문 코드를 잊을 시에는 MYPAGE에서 다시 확인 하실 수 있습니다.
						</p>
						<p>유동적으로 농작물을 재배하시는 주말 농장 주인분께서는 FARM 페이지에 농장을 등록하시면 선 주문 하시는 구매자님과 연결되실 수 있습니다.</p>
						<p>
							만약, 악의를 가진 게시물을 작성 시에는 엄중한 형사 처벌을 받습니다!
						</p>

				</div>
				<div class="col-md-6 agile_about_grid_right">
					<h4>Buyer</h4>
					<p> 구매자는 구매의 의사가 생겼을 때 주문 버튼을 누르면 생기는 알림창의 채팅방의 주소로 판매자의 오픈채팅방에 입장하여 판매자와 직접 대화 후에 직거래하실 수 있습니다.
						또한, 판매자가 알려주는 주문 코드로 인증하여 리뷰를 작성해주시면 다음 구매자에게 도움이 됩니다.
						MYPAGE에서 주문하거나 장바구니에 담은 ITEM을 다시 확인하실 수 있습니다.
				 	</p>
					<p>
						꾸준하게 원하는 농작물을 거래하시거나 선 주문하실 구매자님께서는 FARM 페이지를 이용하시면 원하시는 농장을 찾을 수 있습니다.
					</p>
					<!-- <p>Et harum quidem rerum facilis est et expedita <span>distinctio</span>. Nam libero tempore, cum soluta nobis est eligendi
						optio cumque nihil impedit quo minus id <span>quod</span> maxime placeat facere possimus, omnis voluptas assumenda
						est, omnis dolor repellendus. Temporibus <span>autem</span> quibusdam et aut officiis debitis.<i>impedit quo minus id <span>quod</span> maxime placeat facere possimus, omnis voluptas
						assumenda est, omnis dolor repellendus. Temporibus <span>autem</span> quibusdam et aut
						officiis debitis.</i></p> -->
					<!-- <div class="more wthree_more1 ">
						<a href="single.html" class="hvr-shutter-in-vertical"> Read More <span class="glyphicon glyphicon-arrow-right"></span></a>
					</div> -->
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
<!--

				<div class="w3ls_map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26370863.006641828!2d-113.70834778640587!3d36.212776709411365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x54eab584e432360b%3A0x1c3bb99243deb742!2sUnited+States!5e0!3m2!1sen!2sin!4v1497258476294"
					allowfullscreen></iframe>
		</div>
 -->

    </body>

    </html>
