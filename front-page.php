<?php
/*
 * Template for displaying front page of the site.
 * Here goes image slider with links to project pages,
 * latest news, and latest images that are attached to the home page.
 *
 * @package WordPress
 * @subpackage npoat
 * @since npoat 2.0.1
 *
 */

// Load necessary script for sliders
wp_enqueue_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle2.min.js', array( 'jquery' ) );
wp_enqueue_script( 'npoat-cycle', get_template_directory_uri() . '/js/npoat.cycle.js', array( 'jquery-cycle' ) );

// Get header template 
get_header(); 
?>
	<div class="container_16">
		<div class="grid_16 project-slider-wrapper">
			<div class="project-slider cycle-slideshow"
                 data-cycle-fx=scrollHorz
                 data-cycle-timeout=9000>
                <?php $allowedHosts = array('npo-at.com', 'npo-at.loc'); ?>
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/project-slide-1.png"
                    <?php if(in_array($_SERVER['HTTP_HOST'], $allowedHosts)) : ?>
                     data-cycle-title="Сервисная робототехника"
                     data-cycle-desc="Компания, использующая сервисных роботов как инструмент рекламы, приобретает уникальную возможность донести до клиентов информацию в новом ракурсе, через призму высоких технологий. <a class='news-list-more' href='http://npo-at.com/projects/service'>Подробнее</a>"
                    <?php endif; ?>>
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/project-slide-2.png"
                    <?php if(in_array($_SERVER['HTTP_HOST'], $allowedHosts)) : ?>
                     data-cycle-title="Космическая робототехника"
                     data-cycle-desc="С 2005 г. в лаборатории «Андроидная техника» создана линейка образцов антропоморфных роботов. Наиболее удачные разработки входят в серию, проходят испытания на промышленных объектах, используются рядом компаний.<a class='news-list-more' href='http://npo-at.com/projects/space'>Подробнее</a></a>"
                    <?php endif; ?>>
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/project-slide-3.png"
                    <?php if(in_array($_SERVER['HTTP_HOST'], $allowedHosts)) : ?>
                     data-cycle-title="Разработки в области авиационных технологий"
                     data-cycle-desc="Исследования в области интеллектуальных композиционных материалов. Упругая адаптивная оболочка. Нейросенсорика. Диагностика деформаций конструкционных материалов.<a class='news-list-more' href='http://npo-at.com/projects/aviation'>Подробнее</a>"
                    <?php endif; ?>>
                <img src="<?php echo get_stylesheet_directory_uri();?>/images/project-slide-4.png"
                    <?php if(in_array($_SERVER['HTTP_HOST'], $allowedHosts)) : ?>
                     data-cycle-title="Технологии для образовательной деятельности"
                     data-cycle-desc="Человеческий интеллект с давних пор создавал образы механизмов, повышающих физические возможности людей. К концу 20 века и образ искусственного интеллекта перестал быть фантастикой. Антропоморфная роботизированная система представляет собой вершину творческих научных усилий постижения человеком природы во всех ее проявлениях.<a class='news-list-more' href='http://npo-at.com/projects/education'>Подробнее</a>"
                    <?php endif; ?>>
                <div class="cycle-pager"></div>
                <?php if(in_array($_SERVER['HTTP_HOST'], $allowedHosts)) : ?><div class="cycle-overlay"></div><?php endif; ?>
			</div>
		</div>
		<br class="clear" />
		<div class="grid_8 news-block">
		<h2><?php if($_SERVER['HTTP_HOST'] == 'npo-at.com') : ?>Новости<?php else: ?> News <?php endif; ?></h2>
		<div class="posts">
			<?php $query_news = new WP_Query( array ( 'posts_per_page' => 3 ) ); ?>
			<?php if ( $query_news->have_posts() ) : ?>
				
				<?php while ( $query_news->have_posts() ) : $query_news->the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<h3 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'npoat' ), the_title_attribute( 'echo=0' ) ); ?>" rel='bookmark'> <?php the_title(); ?></a></h3>
						<div class="post-content">
							<?php the_excerpt( ); ?>
						</div>
						<div class="post-meta">
							<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'npoat' ), the_title_attribute( 'echo=0' ) ); ?>" rel='bookmark'><?php echo get_the_date(); ?></a>
						</div>
					</div>
				<?php  endwhile; /* Reset Post Data after all */ wp_reset_postdata(); ?>
			
			<?php endif; ?>
		</div>
	</div>
	<?php
		// Get page attachments to display them in focus block
		$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID, 'orderby' => 'menu_order', 'order' => 'ASC'  ); 
		$attachments = get_posts( $args );
	?>
	<div class="grid_8 focus-block">
		<h2><?php if($_SERVER['HTTP_HOST'] == 'npo-at.com') : ?>В фокусе<?php else: ?> In focus <?php endif; ?></h2>
		<div class="main-page-cycle cycle-slideshow"
             data-cycle-fx=scrollHorz
             data-cycle-timeout=7000 >
			<?php 
				// if there are $attachments display infocus slider
				if ( $attachments ) {
					foreach ( $attachments as $attachment ) {
						echo wp_get_attachment_image( $attachment->ID , "home-page-slider" );
					}
				}
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
