<?php get_header() ?>
<div class="container_16 content-wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="grid_4 sidebar">
					<div class="page-title">
						<h2><?php $parent_title = get_the_title($post->post_parent); echo $parent_title?></h2>
						<ul class="child-pages">
							<?php
								if($post->post_parent) {
                                    $parent = $post->post_parent;
								} else {
									$parent = $post->ID;
								}
                                if($post->post_name == 'news' || $post->post_name == 'news-2') {
                                    wp_list_categories( "title_li=&child_of=4" );
                                } else {
                                    wp_list_pages("title_li=&child_of=".$parent);
                                }
							?>
						</ul>
					</div>
				</div>
				<div class="grid_12 content-single-page">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="post-content">
						<?php the_content(); ?>
						<br class="clear" />
					</div>
				</div><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; ?>
			</div>
		</div>
<?php get_footer(); ?>