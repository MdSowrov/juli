<?php 
include('header.php');
?>


	<div class="main-slider">
		<div id="slider">

			<div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
				<img src="images/slider-1-1600x800.jpg" class="ls-bg" alt="" />

					<div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
						<a class="btn" href="#">TRAVEL</a>
						<h3 class="title"><b>Travel, Love, Live</b></h3>
						<h6>29 October, 2017</h6>
					</div>

			</div><!-- ls-slide -->

			<div class="ls-slide" data-ls="bgsize:cover; bgposition:50% 50%; duration:4000; transition2d:104; kenburnsscale:1.00;">
				<img src="images/slider-2-1600x800.jpg" class="ls-bg" alt="" />

					<div class="slider-content ls-l" style="top:60%; left:30%;" data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
						<a class="btn" href="#">TRAVEL</a>
						<h3 class="title"><b>Travel, Love, Live</b></h3>
						<h6>29 October, 2017</h6>
					</div>

			</div><!-- ls-slide -->

		</div><!-- slider -->
	</div><!-- main-slider -->


	<section class="section blog-area">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="blog-posts">
<?php 

	$articles=$connect->getAll("articles", "*");
	// if(array_chunk($articles, 2)){
	foreach ($articles as $article) {
		extract($article);

?>

						<div class="single-post">
							<div class="image-wrapper"><img src="matrix/<?= $path; ?>" width="1000" height="600" alt="Blog Image"></div>

							<div class="icons">
								<div class="left-area">
									<a class="btn caegory-btn" href="#"><b>
													<?php
                                                        $art_id=$article['cat_id'];
                                                        extract($connect->getById("categories", "*", "cat_id=$art_id"));
                                                        echo $name;
                                                    ?></b></a>
								</div>
								<ul class="right-area social-icons">
									<li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
									<li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
									<li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
								</ul>
							</div>
							<p class="date"><em>Monday, October 13, 2017</em></p>
							<h3 class="title"><a href="#"><b class="light-color"><?= $title;?></b></a></h3>
							<p><?=substr($content,0,125);?>.....</p>
							<a class="btn read-more-btn" href="singlepost.php?pid=<?=$article['art_id'];?>"><b>READ MORE</b></a>

						</div><!-- single-post -->
<?php } ?>



						<div class="row">
<?php 

	$articles=$connect->getAll("articles", "*");

	foreach ($articles as $article) {
		extract($article);
?>
							<div class="col-lg-6 col-md-12">
								<div class="single-post">
									<div class="image-wrapper"><img src="matrix/<?= $path; ?>" width="200" height="200" alt="Blog Image"></div>

									<div class="icons">
										<div class="left-area">
											<a class="btn caegory-btn" href="#"><b>
													<?php
                                                        $art_id=$article['cat_id'];
                                                        extract($connect->getById("categories", "*", "cat_id=$art_id"));
                                                        echo $name;
                                                    ?></b></a>
										</div>
										<ul class="right-area social-icons">
											<li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
											<li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
											<li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
										</ul>
									</div>
									<h6 class="date"><em>Monday, October 13, 2017</em></h6>
									<h3 class="title"><a href="#"><b class="light-color"><?=$title;?></b></a></h3>
									<p><?=substr($content,0,125);?></p>
									<a class="btn read-more-btn" href="singlepost.php?pid=<?=$article['art_id'];?>"><b>READ MORE</b></a>
								</div><!-- single-post -->
							</div><!-- col-sm-6 -->
<?php }  ?>
							

							<div class="col-lg-12 col-md-12">
								<div class="single-post post-style-2">
									<div class="image-wrapper width-50 left-area">
										<img src="images/blog-7-500x400.jpg" alt="Blog Image"></div>

									<div class="post-details width-50 right-area">

										<div class="icons">
											<div class="left-area">
												<a class="btn caegory-btn" href="#"><b>TRAVEL</b></a>
											</div>
											<ul class="right-area social-icons">
												<li><a href="#"><i class="ion-android-share-alt"></i>Share</a></li>
												<li><a href="#"><i class="ion-android-favorite-outline"></i>03</a></li>
												<li><a href="#"><i class="ion-android-textsms"></i>06</a></li>
											</ul>
										</div>
										<h6 class="date"><em>Monday, October 13, 2017</em></h6>
										<h3 class="title"><a href="#"><b class="light-color">How to througn the best engagement party</b></a></h3>
										<p>Sed ut perspiciatis unde omnis iste natus error sit doloremque
											 laudantium, totam rem aperiam, eaque ipsa quae ab illo veritatis et quasi
											dolore magnam aliquam quaerat voluptatem.</p>
										<a class="btn read-more-btn" href="#"><b>READ MORE</b></a>
									</div><!-- post-details -->

								</div><!-- single-post -->
							</div><!-- col-sm-6 -->

						</div><!-- row -->

						<a class="btn load-more-btn" target="_blank" href="#">LOAD OLDER POSTS</a>

					</div><!-- blog-posts -->
				</div><!-- col-lg-4 -->


				<?php  
					include('sidebar.php');
				?>

			</div><!-- row -->
		</div><!-- container -->
	</section><!-- section -->


<?php
include('footer.php');
?>