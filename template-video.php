<?php
/*
 * Template Name: video
 *
 * Template for displaying video page. Need some optimization via page attachments.
 *
 * @package WordPress
 * @subpackage npoat
 * @since npoat 2.0.1
 *
 */
	wp_enqueue_script( 'jquery-cycle', get_template_directory_uri() . '/js/jquery.cycle.js', array( 'jquery' ) );
?>
<?php get_header() ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.videothumb').click(function() {
			$('#videoplayer').show();
			var vid=$(this).attr("video");
			$('#videocont').empty().html('<iframe type="text/html" width="680" height="470" src="http://www.youtube.com/embed/'+vid+'" frameborder="0"></iframe>');
			
			return false; //не уходим по ссылке
		});
	});
</script>

<div class="container_16 content-wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="grid_4 sidebar">
					<div class="page-title">
						<h2><?php $parent_title = get_the_title($post->post_parent); echo $parent_title?></h2>
						<ul class="child-pages">
							<?php
								if($post->post_parent) {
									$children = wp_list_pages( "title_li=&child_of=".$post->post_parent."&echo=0" );
								} else {
									$children = wp_list_pages( "title_li=&child_of=".$post->ID."&echo=0" );
								}
								if ($children) { 
									echo $children;
								}
							?>
						</ul>
					</div>
				</div>
				<div class="grid_12 content-single-page">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<div class="post-content">
						<div id="page_post_text" style="padding: 0 10px;">
							<div id="videoplayer">
								<div id="videocont"><iframe width="680" height="470" frameborder="0" src="http://www.youtube.com/embed/IPGlLVfq7hM" type="text/html"></iframe></div>
							</div>
							<div id="videoprevs" style="padding-top: 10px;">
								<div class="grid_3 alpha" style="text-align: center">
									<a class="videothumb" href="http://www.youtube.com/watch?v=IPGlLVfq7hM" video="IPGlLVfq7hM" title="AR-600" style="display: block;">
										<img src="http://img.youtube.com/vi/IPGlLVfq7hM/2.jpg" alt="AR-600 " />
									</a>
									<a class="videothumb" href="http://www.youtube.com/watch?v=IPGlLVfq7hM" video="IPGlLVfq7hM" title="AR-600" style="display: block;">
										AR-600
									</a>
								</div>
								<div class="grid_3" style="text-align: center">
									<a class="videothumb" href="http://www.youtube.com/watch?v=BN6x2GDpBac" video="BN6x2GDpBac" title="Elements of motion" style="display: block;">
										<img src="http://img.youtube.com/vi/BN6x2GDpBac/2.jpg" alt="Elements of motion" />
									</a>
									<a class="videothumb" href="http://www.youtube.com/watch?v=BN6x2GDpBac" video="BN6x2GDpBac" title="Elements of motion" style="display: block;">
										<span class="display: inline-block; width: 100px;">Движения АР-600</span>
									</a>
								</div>
								<div class="grid_3" style="text-align: center">
									<a class="videothumb" href="http://www.youtube.com/watch?v=W3bVrgEMEno" video="W3bVrgEMEno" title="Svarka" style="display: block;">
										<img src="http://img.youtube.com/vi/W3bVrgEMEno/2.jpg" alt="Svarka" />
									</a>
									<a class="videothumb" href="http://www.youtube.com/watch?v=W3bVrgEMEno" video="W3bVrgEMEno" title="Svarka" style="display: block;">
										<span class="display: inline-block; width: 100px;">Сварка</span>
									</a>
								</div>
								<!--<a class="videothumb" href="http://www.youtube.com/watch?v=FXnSBg0_wIE" video="FXnSBg0_wIE" title="Technical vision">
									<img src="http://img.youtube.com/vi/FXnSBg0_wIE/2.jpg" alt="Technical vision" />Техническое зрение
								</a>-->
							</div>
						</div>
					</div>
				</div><!-- #post-<?php the_ID(); ?> -->
			<?php endwhile; ?>
			</div>
		</div>
<?php get_footer(); ?>