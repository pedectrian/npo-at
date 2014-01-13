<?php
/*
 * Template for displaying news (world and company)
 *
 * @package WordPress
 * @subpackage npoat
 * @since npoat 2.0.1
 *
 */
 
get_header()
?>
	<?php if ( have_posts() ) : ?>
		<div class="container_16 content-wrapper">
			<div class="grid_4 sidebar">
				<div class="page-title">
					<h2>Новости</h2>
					<ul class="child-pages">
						<?php wp_list_categories( "title_li=&child_of=4" ); ?>
					</ul>
				</div>
			</div>
			<div class="grid_12 alpha omega content-blog-page">
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="grid_12 post-wrapper" >
						<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="post-title">
								<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'npoat' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							</div>
							<div class="post-content">
								<?php the_content('Читать далее &rarr;'); ?>
							</div>
							<div class="post-meta">
								<span class='published'>Опубликовано:</span> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'npoat' ), the_title_attribute( 'echo=0' ) ); ?>" rel='bookmark'><?php echo the_date('d.m.y в G:H'); ?><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'npoat' ), the_title_attribute( 'echo=0' ) ); ?>" class='custom-more-link'>Читать далее &rarr;</a>
							</div>
						</div><!-- #post-<?php the_ID(); ?> -->
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
<?php get_footer(); ?>
