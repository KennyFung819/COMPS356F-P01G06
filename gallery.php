
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <?php require_once "asset/header.html"?>
	<body>

	<div id="fh5co-container">
		<div class="js-sticky">
			<div class="fh5co-main-nav">
				<div class="container-fluid">
					<div class="fh5co-menu-1">
						<a href="index.php" data-nav-section="home">Home</a>
						<a href="about.php" data-nav-section="about">About</a>
					</div>
					<div class="fh5co-logo">
						<a href="index.php">Cellfish</a>
					</div>
					<div class="fh5co-menu-2">
						<a href="news.php" data-nav-section="features">News</a>
						<a href="games.php" data-nav-section="menu">Game</a>
					</div>
				</div>
				
			</div>
		</div>

		

        <section class="p-0 bg-dark padding-top" id="product">
            <div class="container-fluid p-0">
                <div class="row no-gutters popup-gallery">
                    <?php
                    $host='localhost';
                    $user='root';
                    $password='';
                    $database='cellfish';
                    $port=3306;
                    $conn=new mysqli($host, $user, $password, $database, $port);
                    if (mysqli_connect_errno()) {
                        echo "cannot open the connection";
                        return null;
                    }

                    $sql = "Select id,title,url,intro from gallery";
                    $stmt = $conn->query($sql);
                    $i=0;
                    while ($row = $stmt->fetch_assoc()) {
                        $id[$i] =$row['id'];
                        $title[$i] =$row['title'];
                        $url[$i] =$row['url'];
                        $intro[$i] =$row['intro'];
                        $i++;
                    }

                    ?>
                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[1] ?>">
                            <img class="img-fluid" src="<?php echo $url[1] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[1] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[1] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[2] ?>">
                            <img class="img-fluid" src="<?php echo $url[2] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[2] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[2] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[3] ?>">
                            <img class="img-fluid" src="<?php echo $url[3] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[3] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[3] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[4] ?>">
                            <img class="img-fluid" src="<?php echo $url[4] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[4] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[4] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[5] ?>">
                            <img class="img-fluid" src="<?php echo $url[5] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[5] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[5] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[5] ?>">
                            <img class="img-fluid" src="<?php echo $url[5] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[5] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[5] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="product-box" href="<?php echo $url[6] ?>">
                            <img class="img-fluid" src="<?php echo $url[6] ?>" alt="">
                            <div class="product-box-caption">
                                <div class="product-box-caption-content">
                                    <div class="project-category text-faded">
                                        <?php echo $title[6] ?>
                                    </div>
                                    <div class="project-name">
                                        <?php echo $intro[6] ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

            </div>
        </section>
	<div id="fh5co-footer">
		<div class="container">
			<div class="row row-padded">
				<div class="col-md-12 text-center">
					<p class="to-animate">&copy; 2017 Software engineering . <br> Designed by OU student
					</p>
					<p class="text-center to-animate"><a href="#" class="js-gotop">Go To Top</a></p>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="fh5co-social">
						<li class="to-animate-2"><a href="#"><i class="icon-facebook"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-twitter"></i></a></li>
						<li class="to-animate-2"><a href="#"><i class="icon-instagram"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>


	
	
	
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Bootstrap DateTimePicker -->
	<script src="js/moment.js"></script>
	<script src="js/bootstrap-datetimepicker.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>

	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<script>
		$(function () {
	       $('#date').datetimepicker();
	   });
	</script>
	<!-- Main JS -->
	<script src="js/main.js"></script>

	</body>
</html>

