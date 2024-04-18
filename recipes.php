<?php
include('connection/connect.php');

session_start(); //session started by unique user_id

error_reporting(0);                                                                      //for printing the  text
$sql = "SELECT * FROM signup where user_id='" . $_SESSION["user_id"] . "'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$name = $row['firstname'];


if ($_SESSION["user_id"] == 0) {
	$none = 'none';
}

?>
<!DOCTYPE html>

<html>

<head>
	<meta charset="UTF-8">
	<title>Recipes </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!-- jquery CDN and js for live search -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$("#live_search").keyup(function() {
				var input = $(this).val();

				if (input != "") {
					$.ajax({
						url: "livesearch.php",
						method: "POST",
						data: {
							input: input
						},
						success: function(data) {
							$("#searchresult").html(data);
							$("#searchresult").css("display", "block");
						}
					});
				} else {
					$("#searchresult").html("");
				}
			});
		});
	</script>
</head>

<body>
	<div class="header">
		<div>
			<a href="index.php"><img src="images/logo.png" alt="Logo"></a>
		</div>
	</div>
	<div class="body">
		<div>
			<div class="header">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li class="current">
						<a href="recipes.php"> Recipes</a>
					</li>
					<li>
						<a href="featured.php">Recipe of Month</a>
					</li>

					<li>
						<a href="about.php">About</a>
					</li>
					<?php
					if (empty($_SESSION["user_id"])) {
						echo '<li><a href="login.php">login</a></li>';
						echo '<li><a href="signup.php">signup</a></li>';
					} else {
						echo '
								<li>
									<a href="manage_recipes.php">Mange your recipes</a>
								</li>';

						$logout = '<form action="login.php" method="post" >
								<input type="submit" id="logout" name="logout" value="logout" style="width:100px;color:#000;border:none;padding:5px;font-size:15px;"  ></form>';
					}
					?>
				</ul>
			</div>

			<div class="search-box">
				<input type="text" class="input-box" id="live_search" autocomplete="off" placeholder="Search Recipes...">
			</div>

			<div class="search-result" id="searchresult" style="margin: 0px; width: 223px; background-color: #fff;"></div>

			<!-- <div class="search-result">
				<div class="list-group" id="searchresult"></div>
			</div> -->

			<form action="" method="GET" style="margin: 20px 0px;">
				<div>
					<select name="sort" class="form-select">
						<option value="">--Select Option--</option>
						<option value="level" <?php if (isset($_GET['sort']) && $_GET['sort'] == "level") {
													echo "selected";
												} ?>>Level</option>
						<option value="time" <?php if (isset($_GET['sort']) && $_GET['sort'] == "time") {
													echo "selected";
												} ?>>Cooking Time</option>
						<option value="rating" <?php if (isset($_GET['sort']) && $_GET['sort'] == "rating") {
													echo "selected";
												} ?>>Rating</option>
					</select>

					<button type="submit" value="submit">Sort</button>
				</div>
			</form>


			<div class="body">
				<div id="content">
					<div>
						<ul>
							<?php
							if (isset($_GET['sort'])) {
								if ($_GET['sort'] == "level") {
									$sql = "SELECT * FROM recipes ORDER BY CASE WHEN reslevel = 'Easy' THEN 1 WHEN reslevel = 'Medium' THEN 2 ELSE 3 END ASC";
								} elseif ($_GET['sort'] == "time") {
									$sql = "SELECT * FROM recipes ORDER BY CASE WHEN cooktime = '5-10 mins' THEN 1 WHEN cooktime = '11-30 mins' THEN 2 WHEN cooktime = '31-60 mins' THEN 3 ELSE 4 END ASC";
								} elseif ($_GET['sort'] == "rating") {
									$sql = "SELECT * FROM recipes ORDER BY resscore DESC";
								}
							} else {
								$sql = "SELECT * FROM recipes ORDER BY rid DESC";
								$result = mysqli_query($db, $sql);
							}

							$result = mysqli_query($db, $sql);

							while ($row = mysqli_fetch_array($result)) {
								$rid =  $row['rid'];
								$rimage =  $row['rimage'];
								$rname =  $row['resname'];
								$rlevel = $row['reslevel'];
								$rtime = $row['cooktime'];
								$rtext =  $row['rtext'];
								$rrating = $row['resscore'];

								echo		'<li>';
								echo			"<a href=fullrecipy.php?DISC=" . $row['rid'] . "><img  style='width:150px;
													height:180px;
													margin-top:5px;
													margin-left:5px; 
													border-radius:5px;
													' src='admin/img/" . $row['rimage'] . "' ></a>";
								echo			'<div>';
								echo				"<h3><a href=fullrecipy.php?DISC=" . $row['rid'] . ">$rname</a></h3>";

								echo				"<p>$rtext</p>";

								echo				"<div style='display: inline-flex;'>
														<p>
															Rating
														</p>
														<p>
															$rrating
														</p>
													</div>";

								echo				"<div style='display: inline-flex;'>
														<p>
															Level
														</p>
														<p>
															$rlevel
														</p>
													</div>";
								echo				"<div style='display: inline-flex;'>
														<p>
															Cooking Time
														</p>
														<p>
															$rtime
														</p>
													</div>";
								echo			'</div>';
								echo		'</li>';
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div>
				<h3>Cooking Video</h3>
				<a href="videos.php"><img src="images/cooking-video.png" alt="Image"></a>
				<span>Vegetable &amp; Rice Topping</span>
			</div>
			<div>
				<h3>Featured Recipes</h3>
				<ul id="featured">
					<li>
						<a href="recipes.php"><img src="images/sandwich.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Ham Sandwich</a></h2>
							<span>by: Anna</span>
						</div>
					</li>
					<li>
						<a href="recipes.php"><img src="images/biscuit-and-coffee.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Biscuit &amp; Sandwich</a></h2>
							<span>by: Sarah</span>
						</div>
					</li>
					<li>
						<a href="recipes.php"><img src="images/pizza.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Delicious Pizza</a></h2>
							<span>by: Rico</span>
						</div>
					</li>
				</ul>
			</div>

			<div>
				<h3>Get Updates</h3>
				<a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" id="facebook">Facebook</a>
				<a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" id="twitter">Twitter</a>
				<a href="http://freewebsitetemplates.com/go/youtube/" target="_blank" id="youtube">Youtube</a>
				<a href="http://freewebsitetemplates.com/go/flickr/" target="_blank" id="flickr">Flickr</a>
				<a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" id="googleplus">Google&#43;</a>
			</div>
			<div style="display:<?php echo $none; ?>;">
				<h3>Settings</h3>
				<a href="#"><?php echo $logout; ?></a>
			</div>
		</div>

		<div class="footer">
			<div>
				<p>
					&copy;(Navbro) Copyright 2012. All rights reserved
				</p>
			</div>
		</div>
	</div>
</body>

</html>