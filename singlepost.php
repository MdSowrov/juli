<?php 
include('header.php');
?>

	<section class="blog-area">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 col-md-12">
					<div class="blog-posts">

<?php 
	if(isset($_GET['pid'])){
		$pid = $_GET['pid'];
		$article = $connect->getById("articles", "*", "art_id=$pid");
		extract($article);
	
		

?>

						<div class="single-post">
							<div class="image-wrapper"><img src="matrix/<?=$path; ?>" width="1000" height="600" alt="Blog Image"></div>

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
							<a class="btn read-more-btn" href="index.php"><b>BACK</b></a>
						</div><!-- single-post -->
<?php  } ?>


						<div class="post-author">
							<div class="author-image"><img src="images/author-1-200x200.jpg" alt="Autohr Image"></div>

							<div class="author-info">
								<h4 class="name"><b class="light-color">Cristnne Smith</b></h4>

								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
								dolore magnam aliquam quaerat voluptatem.</p>

								<ul class="social-icons">
									<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
									<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
								</ul><!-- right-area -->

							</div><!-- author-info -->
						</div><!-- post-author -->

						<div class="comments-area">
							<h4 class="title"><b class="light-color">2 Comments</b></h4>
<?php 
$comments = $connect->getComments("comments", "*", "art_id=$pid && status=1");
//print_r($comments);
foreach ($comments as $comment) {
	extract($comment);

?>	


							<div class="comment">
								<div class="author-image"><img src="images/author-2-150x150.jpg" alt="Autohr Image"></div>
								<div class="comment-info">
									<h5><b class="light-color"><?=$name;?></b></h5>
									<h6 class="date"><em>Monday, October 30, 2017</em></h6>
									<p><?=$message;?></p>
								</div>
							</div><!-- comment -->

<?php } ?>
							<div class="comment">
								<div class="author-image"><img src="images/author-3-150x150.jpg" alt="Autohr Image"></div>
								<div class="comment-info">
									<h5><b class="light-color">William Smith</b></h5>
									<h6 class="date"><em>Monday, October 30, 2017</em></h6>
									<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
										dolore magnam aliquam quaerat voluptatem.</p>
								</div>
							</div><!-- comment -->

						</div><!-- comments-area -->


<?php 
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	if($connect->Insert("comments", "name='$name', email='$email', subject='$subject', message='$message', art_id='$pid'")){
		$msg = "Comment Successfully Inserted";
	}else{
		$msg = "Comment Inserted Faild";
	}
}


?>

					<div class="leave-comment-area">
							<h4 class="title"><b class="light-color">Leave a comment</b></h4>
							<?php 
							if(isset($msg)){
								echo $msg;
							}else{
								echo "";
							}
							?>
							<div class="leave-comment">

								<form action="singlepost.php?pid=<?=$article['art_id'];?>" method="post">
									<div class="row">
										<div class="col-sm-6">
											<input class="name-input" type="text" name="name" placeholder="Name" required="">
										</div>
										<div class="col-sm-6">
											<input class="email-input" type="text" name="email" placeholder="Email">
										</div>
										<div class="col-sm-12">
											<input class="subject-input" type="text" name="subject" placeholder="Subject">
										</div>
										<div class="col-sm-12">
											<textarea class="message-input" name="message" rows="6" placeholder="Message"></textarea>
										</div>
										<div class="col-sm-12">
											<button class="btn btn-2" type="submit" name="submit" value="submit"><b>COMMENT</b></button>
										</div>

									</div><!-- row -->
								</form>

							</div><!-- leave-comment -->

						</div><!-- comments-area -->

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
