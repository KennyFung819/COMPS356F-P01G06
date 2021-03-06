<?php
	require_once('database.php');
	$sth = $conn->prepare("SELECT Id,Title,Introduction,Image,type FROM Post ORDER BY likeNo desc");
    $sth->execute();
    $result = $sth->fetchAll();

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

    <?php require_once "asset/header.html"?>
	<body>


    <?php require_once "asset/navbar.html"?>


        <div id="fh5co-featured" data-section="features">
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">Hot News of Cellfish</h2>
						
					</div>
				</div>
				<div class="row">
					<div class="fh5co-grid">
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[0]['Image']?>)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2><?=$result[0]['Title'] ?></h2>
								<p><?=$result[0]['Introduction'] ?></p>
								<a href="detail.php?id=<?=$result[0]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
							</div>
						</div>
						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[1]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2><?=$result[1]['Title'] ?></h2>
									<p><?=$result[1]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[1]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[2]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2><?=$result[2]['Title'] ?></h2>
									<p><?=$result[2]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[2]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
						</div>

						<div class="fh5co-v-half">
							<div class="fh5co-h-row-2 fh5co-reversed to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[3]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-right">
									<h2><?=$result[3]['Title'] ?></h2>
									<p><?=$result[3]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[3]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
							<div class="fh5co-h-row-2 to-animate-2">
								<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[4]['Image']?>)"></div>
								<div class="fh5co-v-col-2 fh5co-text arrow-left">
									<h2>Salad with Crispy Chicken</h2>
									<h2><?=$result[4]['Title'] ?></h2>
									<p><?=$result[4]['Introduction'] ?></p>
									<a href="detail.php?id=<?=$result[4]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
								</div>
							</div>
						</div>
						<div class="fh5co-v-half to-animate-2">
							<div class="fh5co-v-col-2 fh5co-bg-img" style="background-image: url(<?=$result[5]['Image']?>)"></div>
							<div class="fh5co-v-col-2 fh5co-text fh5co-special-1 arrow-left">
								<h2><?=$result[5]['Title'] ?></h2>
								<p><?=$result[5]['Introduction'] ?></p>
								<a href="detail.php?id=<?=$result[5]['Id']?>"><input type="submit" class="am-btn am-btn-secondary" value="More Details"></a>
							</div>
						</div>

					</div>
				</div>

			</div>
		</div>
<div id="fh5co-menus" >
			<div class="container">
				<div class="row text-center fh5co-heading row-padded">
					<div class="col-md-8 col-md-offset-2">
						<h2 class="heading to-animate">News</h2>
					</div>
				</div>
				<div class="row row-padded">
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-drinks">Accident</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type FROM Post where type='Accident' ORDER BY likeNo desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
											<img src="<?=$posts[$i]['Image']?>" class="img-responsive" width="524" height="350">
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-dishes">Health</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type FROM Post where type='Health' ORDER BY likeNo desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
											<img src="<?=$posts[$i]['Image']?>" class="img-responsive" width="524" height="350">
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-drinks">Mobile Addiction</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type FROM Post where type='Mobile Addiction' ORDER BY likeNo desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
											<img src="<?=$posts[$i]['Image']?>" class="img-responsive" width="524" height="350">
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
					<div class="col-md-6">
						<div class="fh5co-food-menu to-animate-2">
							<h2 class="fh5co-dishes">Patients</h2>
							<ul>
								<?php
									$postC = $conn->prepare("SELECT Id,Title,Introduction,Image,type FROM Post where type='Patients' ORDER BY likeNo desc");
	    							$postC->execute();
	    							$posts = $postC->fetchAll();
									for($i=0;$i<count($posts);$i++){
										
									
								?>
								<li>
									<div class="fh5co-food-desc">
										<figure>
											<img src="<?=$posts[$i]['Image']?>" class="img-responsive" width="524" height="350">
										</figure>
										<div>
											<h3><a href="detail.php?id=<?=$posts[$i]["Id"]?>"><?=$posts[$i]["Title"]?></a></h3>
										</div>
									</div>
								</li>
								<?php
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>

		
	</div>

    <?php require_once "asset/footer.html"?>
	</body>
</html>

