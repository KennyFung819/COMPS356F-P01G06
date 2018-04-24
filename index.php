<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<?php require_once "asset/header.html"?>
	<body>
    <?php require_once "asset/navbar.html"?>
	
			<div style="padding-top: 75px;
				text-align: center;
				vertical-align: middle;
				background-color: white;
				font-size:16px;
				color: black;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <?php require 'weather.php'?>
                        </div>
                        <div class="col-lg-5">
                            <?php require 'HSI.php'?>
                        </div>
                        <div class="col-lg-2">
                            <?php require 'fortuneCookie.php'?>
                            <p>Get some Cookies</p>
                        </div>
                    </div>
                </div>
			</div>
			
    <div id="fh5co-home" class="js-fullheight" data-section="home">

        <div class="flexslider">

            <div class="fh5co-overlay"></div>
            <div class="fh5co-text">
                <div class="container">
                    <div class="row">
                        <h1 class="to-animate">Cellfish</h1>
                        <br>
                        <h2 class="to-animate">(n)an individual who continues talking on their phone so as to be rude or inconsiderate of other people</h2>
                    </div>
                </div>
            </div>
            <ul class="slides">
                <li style="background-image: url(images/slide_1.jpg);" data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/slide_1.jpg);" data-stellar-background-ratio="0.5"></li>
                <li style="background-image: url(images/slide_1.jpg);" data-stellar-background-ratio="0.5"></li>
            </ul>

        </div>

    </div>

    <div id="fh5co-sayings">

			<div class="container">
				<div class="row to-animate">

					<div class="flexslider">
						<ul class="slides">
							
							<li>
								<blockquote>
									<p>&ldquo;Don't play more phone.&rdquo;</p>
									<p class="quote-author">&mdash; Edmond</p>
								</blockquote>
							</li>
							<li>
								<blockquote>
									<p>&ldquo;Cellfish sounds like selfish.&rdquo;</p>
									<p class="quote-author">&mdash; Tony</p>
								</blockquote>
							</li>
							<li>
								<blockquote>
									<p>&ldquo;Find something you’re passionate about and keep tremendously interested in it.&rdquo;</p>
									<p class="quote-author">&mdash; Julia Child</p>
								</blockquote>
							</li>
							<li>
								<blockquote>
									<p>&ldquo;Don't play phone or you will pay a new phone.&rdquo;</p>
									<p class="quote-author">&mdash; Tony</p>
								</blockquote>
							</li>
							
							
						</ul>
					</div>

				</div>
			</div>
		</div>

        <div>
            <?php require_once "tweets.html" ?>
        </div>

<div id="fb-root"></div>


    <?php require_once "asset/footer.html"?>
	</body>
</html>

