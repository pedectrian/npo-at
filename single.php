<?php
/*
 * Template for displaying single post content.
 *
 * @package WordPress
 * @subpackage npoat
 * @since npoat 2.0.1
 *
 */

get_header() ?>
<div class="container_16 content-single-wrapper">
			<div class="grid_16">
				<div class="content-single">
				<?php while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-title">
							<h2><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'npoat' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						</div>
						<div class="post-content">
							<?php the_content(); ?>
							<br class="clear" />
						</div>
					</div><!-- #post-<?php the_ID(); ?> -->
				<?php endwhile; ?>
				</div>
			</div>
		</div>
<?php get_footer(); ?>