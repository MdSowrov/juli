<?php 
include('header.php');
?>

<?php 
if(isset($_REQUEST['search'])){
 $search = $_REQUEST['search'];

}
?>


	<section class="section blog-area">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="blog-posts">
<?php 

	$articles=$connect->getComments("articles", "*", "title like '%$search%' or content like '%$search%'");
	
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
							<h3 class="title"><a href="#"><b class="light-color"><?=$title;?></b></a></h3>
							<p><?=$content;?></p>
							<a class="btn read-more-btn" href="singlepost.php?pid=<?=$article['art_id'];?>"><b>READ MORE</b></a>

						</div><!-- single-post -->
<?php } ?>



						

						

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