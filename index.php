<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-1of2 t-2of3 d-4of7 cf" role="main">

							<article>
								<h3><?php echo stripslashes(get_option('intro-title')); ?></h3>
        						<p><?php echo stripslashes(get_option('intro-text')); ?></p>
							</article>

						</div>

						<div class='m-1of2 t-1of3 d-3of7 cf'>
							<div class='wp-caption'>
								<img id="love-img" src="<?php echo get_stylesheet_directory_uri() . '/img/love.jpg'; ?>">
								<p class="wp-caption-text">All You Need Is Love, Mike Carter<br />The sculpture was give to Luebbecke by Mike as a gift from his hometown of Dorchester.</p>
							</div><!-- end caption -->
						</div>

						<div class="d-1of2 m-all t-1of2 town-box">
							<h2>Dorchester</h2>
							<p><?php echo stripslashes(get_option('dorch-text')); ?></p>
						<?php	

							$mymap = new Mappress_Map(array("width" => "90%", "center" => array("lat" => 50.7154, "lng" => -2.4367), "zoom" => 12));
							echo $mymap->display();
						?>

						</div><!-- end 1of2 -->
						<div class="d-1of2 m-all t-1of2 town-box">
							<h2>Lübbecke</h2>
							<p><?php echo stripslashes(get_option('luebb-text')); ?></p>
						<?php	

							$mymap = new Mappress_Map(array("width" => "90%", "center" => array("lat" => 52.308056, "lng" => 8.623056), "zoom" => 12));
							echo $mymap->display();
						?>

						</div><!-- end 1of2 -->

				</div><!-- end inner-content -->

			</div><!-- end content -->


<?php get_footer(); ?>
