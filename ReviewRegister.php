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
      </div>
<?php
	$callitem=$_REQUEST["callitem"];
	$servername = "localhost";
	$username = "root";
	$password = "tgdshlm99";
	$dbname = "projectdb";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	$sql = "SELECT randomcode FROM items WHERE callitem='$callitem'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);
	$checkcode = $row["randomcode"];
?>

<style>
label {    /*button tag 에 원하는 스타일 적용*/
position: absolute;
width: 65px;
height: 30px;
border-radius: 150px;
font-weight: 800;
border-color: transparent;
font-size: 14px;
background: #fcb314;
color: #fff;
cursor: pointer;
text-align: center;
text-align-last: center;
}


</style>

          <!-- footer -->
              <div class="footer">
              <div class="container">
              <div class="col-md-11 w3agile_footer_grid">

                <div class="banner-bottom">
              	<div class="container">
                <div class="col-md-8 wthree_contact_left">

                  <h3>Review Register</h3>
                  <form action="ITEMinfo.php?callitem=<?= $callitem ?>" enctype="multipart/form-data" method="post">
                    <div class="col-md-8 wthree_contact_left_grid">

                    <!-- <input type="text" name="nickname" placeholder="닉네임" required="" />
                  </div> -->
                    <p><label for="la1">Photo</label> </p></br><p><input id="la1" type="file" name="reviewphotofile"></label> </p>

                    <p><label for="la2">Review</label> </br></div>
                      <textarea id="la2" name="review" placeholder="리뷰 내용 " required="" rows="4" cols="50" ></textarea></p>
                  </br>
                <div class="col-md-8 wthree_contact_left_grid">
                <label for="la3">Code</label></br></br><p> <input id="la3" name="Code" type="text" placeholder="주문 코드" required="" onchange=checkcode(this.value)>

                    </p>
<script>
function checkcode(val) {
	var code = '<?= $checkcode ?>';
	if (val == code) {
		document.getElementById("oksubmit").disabled = false;
	}
}
</script>
                  </div>
                  </br></br></br>

                  <input id="oksubmit" type="submit" value="Submit" disabled = "true"><input type="reset" value="Clear"></div></div></div>
                </form>
              </div>

              <div class="clearfix"> </div>
            </div>
          </div>



    </body>

    </html>
