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
$callitem = $_REQUEST["Callitem"];
if(isset($_POST['delete'])){

            	$sql_delete = "DELETE FROM items WHERE callitem = '$callitem' ";
					$query = mysqli_query($conn, $sql_delete);
		$review_delete = "DELETE FROM reviews WHERE callitem = '$callitem' ";
					$query2 = mysqli_query($conn, $review_delete);
		$basket_delete = "DELETE FROM baskets WHERE callitem = '$callitem' ";
					$query3 = mysqli_query($conn, $basket_delete);
		$order_delete = "DELETE FROM orders WHERE callitem = '$callitem' ";
					$query4 = mysqli_query($conn, $order_delete);
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

  <!-- <script>


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

	<!-- //Modal2 -->
	<?php
		
		$Location = $_REQUEST["location"];
		$Crop = $_REQUEST["crop"];
		

	if (($Location == "nocheck") && ($Crop == "nocheck")) {
		$selsql = "SELECT address1,crop,picture,callitem FROM items";
		$result = mysqli_query($conn,$selsql);
	}
	else if ($Location == null && $Crop == null) {
		$selsql = "SELECT address1,crop,picture,callitem FROM items";
		$result = mysqli_query($conn,$selsql);
	}
	else if ($Location != null && $Crop == "nocheck"){
		$selsql = "SELECT address1,crop,picture,callitem FROM items WHERE address1='$Location'";
		$result = mysqli_query($conn,$selsql);
	}
	else if ($Location == "nocheck" && $Crop != null){
		$selsql = "SELECT address1,crop,picture,callitem FROM items WHERE crop='$Crop'";
		$result = mysqli_query($conn,$selsql);
	}
	else if ($Location != null && $Crop != null){
		$selsql = "SELECT address1,crop,picture,callitem FROM items WHERE address1='$Location' AND crop='$Crop'";
		$result = mysqli_query($conn,$selsql);
	}
	?>


	<div class="services-breadcrumb">
		<div class="container">
			<ul>
				<li><a href="HOME.php">Home</a><i>|</i></li>
				<li>ITEM</li>
			</ul>
		</div>
	</div>
	<!-- gallery -->
	<div class="banner-bottom">
		<div class="container">
			<!---728x90--->

			<h2 class="title-w3-agileits inner">ITEM</h2>
			<p class="quia">View Items </p>
      <div class="more">
        <a href="Register_ITEM.php" class="hvr-shutter-in-vertical">Register<span class="glyphicon glyphicon-arrow-middle"></span></a>
           <p><!--
             <li class="m_nav_item dropdown" id="moble_nav_item_2">
               <a onclick="mydrop()" href="#" class="dropdown-toggle link link--kumya" data-toggle="dropdown">품목<b class="caret"></b></a>

               <ul class="dropdown-menu agile_short_dropdown">
                 <li><a href="#">고구마</a></li>
                 <li><a href="#">호박</a></li>
               </ul>
             </li>
             <li class="m_nav_item dropdown" id="moble_nav_item_12">
               <a onclick="mydropp()" href="#" class="dropdown-toggle link link--kumya" data-toggle="dropdown">지역<b class="caret"></b></a>

               <ul class="dropdown-menu agile_short_dropdown">
                 <li><a href="#" value="seoul">서울</a></li>
                 <li><a href="#" value="kyung">경기도</a></li>
                 <li><a href="#" value="kang">강원도</a></li>
                 <li><a href="#" value="Cheong">충청도</a></li>
                 <li><a href="#" value="Jun">전라도</a></li>
                 <li><a href="#" value="Kyungsang">경상도</a></li>
                 <li><a href="#" value="Jeju">제주도</a></li>
               </ul>
             </li>
		-->

		<style>
		select {
			background : #34bf49;
			color : #fff;
			width: 80px;
			height: 30px;
			font-weight: 400;
			font-size: 14px;
			font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
			/* color: #006fff; */
			text-align-last: center;
			-webkit-appearance: none;
		 -moz-appearance: none;
		 appearance: none;
		 /* background: url('select-arrow.png') no-repeat 95% 50%; /* 화살표 아이콘 추가 */ */
	}
	select::-ms-expand {
		 display: none;
	}
	/* check, hover 스타일 설정 IE, Chrome */
select option:checked,
select option:hover {
		background: #fcb314;
		color: #0a0a0a;
}

/* check, hover 스타일 설정 FireFox */
 select option:checked,
select option:hover {
		box-shadow: 0 0 10px 100px #ff00ff inset;
		color: #0a0a0a;
}

input {
	width: 50px;
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




		<form action="ITEM.php">
			<select name="crop">
				<option value="nocheck">품목</option>
	<?php
		$cropsql = "SELECT DISTINCT crop FROM items";
		$getcrop = mysqli_query($conn,$cropsql);
		if (mysqli_num_rows($getcrop) > 0) {
			while($croprow = mysqli_fetch_assoc($getcrop)){
	?>
				<option value="<?= $croprow["crop"] ?>"><?php print $croprow["crop"]; ?>
	<?php
			}
		}
	?>

			</select>
			<select name="location">
				<option value="nocheck">지역</option>
				<option value="seoul">서울</option>
				<option value="incheon">인천</option>
				<option value="kyung">경기도</option>
				<option value="kang">강원도</option>
				<option value="Cheong">충청도</option>
				<option value="Jun">전라도</option>
				<option value="Kyungsang">경상도</option>
				<option value="Jeju">제주도</option>
			</select>
			<input type="submit" value="검색">
		</form>
         </p>

      </div>
<!---728x90--->

  <h3 class="page-header page-header icon-subheading">Registered Items </h3>
			<div class="w3ls_gallery_grids">
<?php
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)){
?>
				<div class="col-md-4 w3_agile_gallery_grid">
					<div class="agile_gallery_grid">
						<a title="Donec sapien massa, placerat ac sodales ac, feugiat quis est." href="ITEMinfo.php?callitem=<?= $row["callitem"] ?>">
							<div class="agile_gallery_grid1">
								<img src="<?= $row["picture"] ?>" alt="<?= $row["picture"] ?>" width="350" height="250"/>
								<div class="w3layouts_gallery_grid1_pos">
									<h3><?php print $row["crop"]; ?></h3>
									<p><?php print $row["address1"]; ?></p>
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
			</div>

	<!-- //gallery -->
<!---728x90--->
</body>

</html>
