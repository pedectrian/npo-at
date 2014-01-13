<?php get_header(); ?>
	<?php if ( have_posts() ) : ?>
		<div class="container_16 content-wrapper">
			<div class="grid_4 sidebar">
				<div class="page-title">
					<h2>Результаты поиска</h2>
					<ul class="child-pages">
						
					</ul>
				</div>
			</div>
			<div class="grid_12 alpha omega content-blog-page">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="grid_12 post-wrapper" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="post-content" style="padding: 10px 0;">
								<?php the_content(); ?>
								<br class="clear" />
								<a href="<?php the_permalink(); ?>" class="more-link" style="right:10px;"> Читать далее -></a>
							</div>
						</div><!-- #post-<?php the_ID(); ?> -->
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>