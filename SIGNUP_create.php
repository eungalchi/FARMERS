<?php
$servername = "localhost";
		$username = "root";
		$password = "tgdshlm99";
		$dbname = "projectdb";

		$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
$filtered = array(
	'username'=>mysqli_real_escape_string($conn, $_POST['username']),
	'email'=>mysqli_real_escape_string($conn, $_POST['email']),
  'pw'=>mysqli_real_escape_string($conn, $_POST['pw'])
);

$checkemail = $filtered['email'];
$checkemailsql = mysqli_query($conn, "SELECT email FROM members WHERE email='$checkemail' ");
$emailexist=mysqli_fetch_array($checkemailsql);
$sql = "
  INSERT INTO members
    (username, email, pw)
    VALUES(
        '{$filtered['username']}',
        '{$filtered['email']}',
        '{$filtered['pw']}'
    )
";
$result = mysqli_query($conn, $sql);


?>
<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="utf-8">

	<title>Temp</title>
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
	<div class="banner_top" id="home">
    <img class="background-video" src="가입.jpg" />
		<div data-vide-bg="가입.jpg">
      <!-- <img class="image" src="농업.jpg" width="1400" height="700"/> -->
			<div class="center-container">
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

				<!--// top_header_agile_info_w3ls -->
				<!--/slider-->
				<div class="banner_wthree_agile_info">
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>
									<div class="agileits-banner-info">
							<?php
								if (isset($emailexist['email'])){
							?>
										<h4>Sorry!</h4>
										<h3>This email already exists.</h3>
										<h2>Please enter another email!</h2>
							<?php
								} else {
							?>
										<h4>Welcome!</h4>
										<h3>Congratulations for Sign in.</h3>
							<?php
								}
							?>
										<!-- <div class="more">
											<a href="single.php" class="hvr-shutter-in-vertical"> Read More<span class="glyphicon glyphicon-arrow-right"></span></a>
										</div> -->
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--//slider-->
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- Modal1 -->

	<!-- //for bootstrap working -->
</body>

</html>
