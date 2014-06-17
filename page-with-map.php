<?php
/**
 *
 * @package WordPress
 * Template Name: Page Width Map
 * @subpackage Base_Theme
 */
?>
<?php get_header(); ?>

<div class="page-title">
	<div class="center-wrap-940">
		<div class="breadcrumbs cf">
		<?php if(function_exists('bcn_display'))
		{
			bcn_display();
		}?>
		</div>
	</div>
</div>
<div class="center-wrap-940">
	<div class="main-area inner cf">
		<?php if ( have_posts() ) : the_post(); ?>
		<article id="content" class="content-fw">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<div class="map-area">
				<div id="map-canvas" class="image-map"></div>
				<?php
				$items = $GLOBALS['gmap']->getItems();				
				if($items)
				{
					foreach ($items as $p) 
					{
						?>
						<div id="box-<?php echo $p->ID; ?>" class="box hide">
							<div class="holder">
								<h3><?php echo $p->post_title; ?></h3>
								<?php echo $p->post_content; ?>
								<?php 
								$images = getAllImagesFromPost($p->ID); 
								if($images)
								{
									?>
									<div class="gallery-map">
										<ul class="slides">
											<?php 
											foreach ($images as $img) 
											{
												?>
												<li><img src="<?php echo $img['small']; ?>" alt=""></li>
												<?php
											}
											?>
										</ul>
									</div>
									<?php
								}
								?>								
								<a href="#" class="close"></a>
							</div>
						</div>
						<?php
					}
				}
				?>
				<div class="box hide">
					<div class="holder">
						<h3>MacAlister Elliot &amp; Co Ltd <br>Tunafish buoys</h3>
						<p>Location: Indian Ocean</p>
						<p>Macalister &amp; Elliott purchased 8 x 2.4m buoys over 2010/12. These were deployed as FADS, which is a floating tuna fish enhancing area off the Indian Ocean coasts of the Yemen & Oman. These buoys were moored in depths ranging from 200 to 700Mtrs.</p>
						<p>Type of Buoy deployed: Name here</p>
						<p>Cost of Project: £36,075</p>
						<div class="gallery-map">
							<ul class="slides">
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
								<li><img src="<?php echo TDU; ?>/images/img-13.jpg" alt=""></li>
							</ul>
						</div>
						<a href="#" class="close"></a>
					</div>
				</div>
				<div class="mask hide"></div>
			</div>
			<script>
				jQuery(function(){
					jQuery('.gallery-map').flexslider({
						animation: "slide",
						slideshowSpeed: 10000,
						animationSpeed: 600,
						controlNav: false,
						touch: false,
						itemWidth: 193,
						itemMargin: 2
					});
				});
			</script>
		</article>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>