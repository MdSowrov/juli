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
if(isset($_REQUEST['menu_id'])){
	$menu = $_REQUEST['menu_id'];
	$menu=$connect->getById("menus", "*", "menu_id=$menu");
	extract($menu);

?>

						<div class="single-post">
							<div class="image-wrapper"><img src="images/blog-1-1000x600.jpg" alt="Blog Image"></div>

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
							<p class="date"><em>Monday, October 13, 2017</em></p>
							<h3 class="title"><a href="#"><b class="light-color"><?= $name;?></b></a></h3>
							<p><?=$content;?></p>
							<a class="btn read-more-btn" href="#"><b>READ MORE</b></a>
						</div><!-- single-post -->

<?php }elseif(isset($_REQUEST['cat_id'])){
	$cat_id = $_REQUEST['cat_id'];
	$articles = $connect->getAllByCatId("articles", "*", "cat_id=$cat_id");
	if(count($articles, 1) > 1){
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
							<p><?=substr($content,0,125);?>.......</p>
							<a class="btn read-more-btn" href="singlepost.php?pid=<?=$article['art_id'];?>"><b>READ MORE</b></a>
						</div><!-- single-post -->
<?php 

}
}else{
	echo "";
} 
}



?>





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