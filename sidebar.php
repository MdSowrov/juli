
<div class="col-lg-4 col-md-12">
					<div class="sidebar-area">

						<div class="sidebar-section about-author center-text">
							<div class="author-image"><img src="images/author-1-200x200.jpg" alt="Autohr Image"></div>

							<ul class="social-icons">
								<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
								<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
								<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
								<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
								<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
							</ul><!-- right-area -->

							<h4 class="author-name"><b class="light-color">Cristine Smith</b></h4>
							<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
								dolore magnam aliquam quaerat voluptatem.</p>

							<div class="signature-image"><img src="images/signature-image.png" alt="Signature Image"></div>
							<a class="read-more-link" href="#"><b>READ MORE</b></a>

						</div><!-- sidebar-section about-author -->

						<div class="sidebar-section src-area">

							<form action="post">
								<input class="src-input" type="text" placeholder="Search">
								<button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
							</form>

						</div><!-- sidebar-section src-area -->

						<div class="sidebar-section newsletter-area">
							<h5 class="title"><b>Subscribe to our newsletter</b></h5>
							<form action="post">
								<input class="email-input" type="text" placeholder="Your email here">
								<button class="btn btn-2" type="submit">SUBSCRIBE</button>
							</form>
						</div><!-- sidebar-section newsletter-area -->

						<div class="sidebar-section category-area">
							<h4 class="title"><b class="light-color">Categories</b></h4>
<?php 
				$categories = $connect->getAll("categories", "*");
				foreach($categories as $category){
					extract($category); ?>

							<a class="category" href="post.php?cat_id=<?=$cat_id;?>">
								<img src="#" alt="Category Image">
								<h6 class="name"><?=$name;?></h6>
							</a>

<?php }  ?>

							
						</div><!-- sidebar-section category-area -->

						<div class="sidebar-section latest-post-area">
							<h4 class="title"><b class="light-color">Latest Posts</b></h4>
<?php 

	$articles=$connect->getAll("articles", "*");
	foreach ($articles as $article) {
		extract($article);
?>
							<div class="latest-post" href="#">
								<div class="l-post-image"><img src="matrix/<?= $path; ?>" width="50" height="50" alt="Category Image"></div>
								<div class="post-info">
									<a class="btn category-btn" href="#">
													<?php
                                                        $art_id=$article['cat_id'];
                                                        extract($connect->getById("categories", "*", "cat_id=$art_id"));
                                                        echo $name;
                                                    ?></a>
									<h5><a href="singlepost.php?pid=<?=$article['art_id'];?>"><b class="light-color"><?=$title;?></b></a></h5>
									<h6 class="date"><em>Monday, October 13, 2017</em></h6>
								</div>
							</div>
<?php } ?>

							

						</div><!-- sidebar-section latest-post-area -->

						<div class="sidebar-section advertisement-area">
							<h4 class="title"><b class="light-color">Advertisement</b></h4>
							<a class="advertisement-img" href="#">
								<img src="images/advertise-1-400x500.jpg" alt="Advertisement Image">
								<h6 class="btn btn-2 discover-btn">DISCOVER</h6>
							</a>
						</div><!-- sidebar-section advertisement-area -->

						<div class="sidebar-section instagram-area">
							<h4 class="title"><b class="light-color">Instagram</b></h4>
<?php 

	$articles=$connect->getAll("articles", "*");
	foreach ($articles as $article) {
		extract($article);
?>
							<ul class="instagram-img">
								<li><a href="#"><img src="matrix/<?= $path; ?>" width="50" height="80" alt="Instagram Image"></a></li>
								
							</ul>
<?php } ?>
						</div><!-- sidebar-section instagram-area -->

						<div class="sidebar-section tags-area">
							<h4 class="title"><b class="light-color">Tags</b></h4>
							<ul class="tags">
								<li><a class="btn" href="#">design</a></li>
								<li><a class="btn" href="#">fasinon</a></li>
								<li><a class="btn" href="#">travel</a></li>
								<li><a class="btn" href="#">music</a></li>
								<li><a class="btn" href="#">video</a></li>
								<li><a class="btn" href="#">photography</a></li>
								<li><a class="btn" href="#">adventure</a></li>
							</ul>
						</div><!-- sidebar-section tags-area -->


					</div><!-- about-author -->
				</div><!-- col-lg-4 -->
