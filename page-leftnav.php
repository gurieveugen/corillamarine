<?php
/*
 * @package WordPress
 * Template Name: Left Nav Page
*/
?>
<?php get_header(); ?>

<div class="page-title">
	<div class="center-wrap-940">
		<h1>Reseller area / Technical Specs</h1>
	</div>
</div>
<div class="center-wrap-940">
	<div class="main-area inner-1 cf">
		<aside class="aside left">
			<nav>
			<?php wp_nav_menu( array(
				'menu' => 'Reseller menu',
				'container' => false,
				'menu_id' => 'nav-aside',
				'menu_class' => 'nav-aside'
				)); ?>
			</nav>	
			<?php /*		
			<nav>			
				<ul class="nav-aside">
					<li><a href="#">Technical Specs</a></li>
					<li><a href="#">Images</a></li>
					<li><a href="#">Tender Documents</a></li>
					<li><a href="#">Videos</a></li>
					<li class="open">
						<a href="#">CAD layouts</a>
						<ul>
							<li><a href="#">Menu item 1</a></li>
							<li><a href="#">Menu item 2</a></li>
						</ul>
					</li>
				</ul>
			</nav> */ ?>
		</aside>
		<?php if ( have_posts() ) : the_post(); ?>
		<article id="content" class="right c-inner">
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</article>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>