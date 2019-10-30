	<section class="footer-instagram-area">

		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h5 class="title"><b class="light-color">Follow me &copy; instagram</b></h5>
				</div><!-- col-lg-4 -->
			</div><!-- row -->
		</div><!-- container -->
<?php 

	$articles=$connect->getAll("articles", "*");
	foreach ($articles as $article) {
		extract($article);
?>
		<ul class="instagram">
			<li><a href="#"><img src="matrix/<?= $path; ?>" width="50" height="150" alt="Instagram Image"></a></li>
			<!-- <li><a href="#"><img src="images/instragram-2-300x400.jpg" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="images/instragram-3-300x400.jpg" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="images/instragram-4-300x400.jpg" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="images/instragram-5-300x400.jpg" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="images/instragram-6-300x400.jpg" alt="Instagram Image"></a></li>
			<li><a href="#"><img src="images/instragram-7-300x400.jpg" alt="Instagram Image"></a></li> -->
		</ul>
<?php } ?>
	</section><!-- section -->


	<footer>
		<div class="container">
			<div class="row">

				<div class="col-sm-6">
					<div class="footer-section">
						<p class="copyright">Juli &copy; 2018. All rights reserved | Made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> &amp; distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a></p>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

				<div class="col-sm-6">
					<div class="footer-section">
						<ul class="social-icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>
					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="common-js/jquery-3.1.1.min.js"></script>

	<script src="common-js/tether.min.js"></script>

	<script src="common-js/bootstrap.js"></script>

	<script src="common-js/layerslider.js"></script>

	<script src="common-js/scripts.js"></script>

</body>
</html>

