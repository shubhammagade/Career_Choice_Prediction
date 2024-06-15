<?php
// Initialize the session
session_start();

require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'header.php' ?>
	<!-- Hero-area -->
	<div class="hero-area section">

		<!-- Backgound Image -->
		<div class="bg-image bg-parallax overlay" style="background-image:url(./img/bgc2.jpg); "></div>
		<!-- /Backgound Image -->

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1 text-center">
					<ul class="hero-area-tree">
						<li><a href="main.php">Home</a></li>
						<li>Courses</li>
					</ul>
					<h1 class="white-text">Get Started</h1>

				</div>
			</div>
		</div>

	</div>
	<!-- /Hero-area -->

	<!-- Courses -->
	<div id="courses" class="section">

		<!-- container -->
		<div class="container">

			<!-- row 
				<div class="row">
					<div class="section-header text-center">
						<h2>Explore Courses</h2>
						<p class="lead">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant.</p>
					</div>
				</div>
				 -->

			<!-- tags widget -->
			<div class="widget tags-widget">
				<a class="tag" href="#web">Web</a>
				<a class="tag" href="#prog">Programming Langauges</a>
				<a class="tag" href="#">Css</a>
				<a class="tag" href="#">Responsive</a>
				<a class="tag" href="#bootstrap">bootstrap</a>
				<a class="tag" href="#web">Html</a>
				<a class="tag" href="#">Website</a>
				<a class="tag" href="#">Business</a>
			</div>
			<!-- /tags widget -->

			<!-- courses -->
			<hr class="section-hr" id="web">
			<div id="courses-wrapper">

				<?php
				$sql = "SELECT DISTINCT `cate` FROM `courses`";
				$res = mysqli_query($link, $sql);
				while ($row = mysqli_fetch_assoc($res)) {
					$current_cate = $row['cate'];
				?>
					<!-- row -->
					<div class="row">
						<div class="section-header text-center">
							<h2><?php echo $current_cate; ?></h2>
						</div>

						<?php
						$csql = "SELECT * FROM `courses` WHERE `cate`='$current_cate'";
						$cres = mysqli_query($link, $csql);
						while ($crow = mysqli_fetch_assoc($cres)) {
						?>
							<!-- single course -->
							<div class="col-md-3 col-sm-6 col-xs-6">
								<div class="course">
									<a href="<?php echo $crow['link']; ?>" target="_blank" class="course-img">
										<img src="<?php echo $crow['thumbnail']; ?>" alt="">
										<i class="course-link-icon fa fa-link"></i>
									</a>
									<a class="course-title" href="<?php echo $crow['link']; ?>" target="_blank" style="font-size:18px; text-align: center"><?php echo $crow['name']; ?></a>
									<div class="course-details" style="margin:5px;">
										<span class="course-category"><?php echo $crow['cate']; ?></span>
										<span class="course-price  <?php echo $crow['price']=='Free' ? 'course-free' : 'course-premium' ?>"><?php echo $crow['price']; ?></span>
									</div>
								</div>
							</div>
							<!-- /single course -->
						<?php
						}
						?>

					</div>
					<!-- /row -->
				<?php
				}
				?>


			</div>
			<!-- container -->

		</div>
		<!-- /Courses -->
		<?php include 'footer.php' ?>

</html>