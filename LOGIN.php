<?php
	session_start();   //세션 시작
	$_SESSION["email"]=null;
	$servername = "localhost";
	$username = "root";
	$password = "tgdshlm99";
	$dbname = "projectdb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn,"utf8");
   if($_POST["email"] != ""){  // email값이 있으면
    $myusername=$_POST["email"];
    $mypassword=$_POST["pw"];

 $sql="SELECT * FROM members WHERE email = '$myusername' AND pw = '$mypassword'";
//아이디랑 비번값 대조
   $result=mysqli_query($conn, $sql);
    $count=mysqli_num_rows($result);

     if($count==1)
    {
        $_SESSION["email"]=$myusername;

				header("location: WELCOME.php");  // welcome.php 페이지로 넘김

    }
    else
    {?>
			<script> alert("Your Email or Password is invalid");</script>
<?php   }
}
?>

<!DOCTYPE html>
<html lang="ko">

  <head>
    <meta charset="utf-8">

	<title>Login</title>
	<!-- custom-theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- /custom-theme -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- //custom-theme -->
	<!-- font-awesome-icons -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- banner -->
  <image class="banner1" id="home" src="로그인.jpg" width=100% height=70 />
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

										<!-- <li class="m_nav_item" id="moble_nav_item_6"> <a href="contact.php" class="link link--kumya"><i class="fa fa-envelope-o" aria-hidden="true"></i><span data-letters="Contact">Contact</span></a></li> -->

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
    			<h3 class="title-w3-agileits two">LOGIN</h3>
    			<div class="wthree_services_bottom_left banner_bottom_agile_grids">
    				<div class="wthree_services_bottom_left_grid">
              <div class="modal-dialog">
                <!-- Modal content-->
                <!-- <div class="modal-content"> -->
                  <div class="modal-header">
                    <!-- <button type="button" class="open" data-dismiss="modal">&times;</button> -->
                    <div class="signin-form profile">
                      <div class="login-form">
                        <form action="" method="post">
                          <input type="email" name="email" placeholder="E-mail" required="">
                          <input type="password" name="pw" placeholder="Password" required="">
                          <div class="tp">
                            <input type="submit" value="Sign In">
                          </div>
                        </form>
                      </div>
                      <p><a href="SIGNUP.php" data-toggle="modal" data-target="#myModal3"> Don't have an account?</a></p>
                    </div>
                  </div>
                </div>
              </div>

    					<div class="clearfix"> </div>
    				</div>

    			</div>
    		</div>

	<!-- <div class="modal fade" id="myModal2" tabindex="-1" role="dialog"> -->
                    <!-- <div>
                  		<div class="modal-dialog">
                  				<div class="modal-header">

                  					<div class="signin-form profile">
                  						<h3 class="agileinfo_sign">LOGIN</h3>
                  						<div class="login-form">
                  							<form action="#" method="post">
                  								<input type="email" name="email" placeholder="E-mail" required="">
                  								<input type="password" name="password" placeholder="Password" required="">
                  								<div class="tp">
                  									<input type="submit" value="Sign In">
                  								</div>
                  							</form>
                  						</div>
                  						<p><a href="SIGNUP.php" data-toggle="modal" data-target="#myModal3"> Don't have an account?</a></p>
                  					</div>
                  				</div>
                  			</div>
                  		</div> -->
	<!-- //Modal1 -->
	<!-- Modal2 -->
<!-- class="modal fade" id="myModal3" tabindex="-1"> -->

    </body>

    </html>
