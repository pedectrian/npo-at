<?php
/**
 * Search Form
 *
 * @package WordPress
 * @subpackage npoat
 * @since npoat 1.0
 */
?>
	<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="search-input" value="<?php if($_SERVER['HTTP_HOST'] == 'npo-at.com') : ?>Поиск<?php else: ?> Search <?php endif; ?>" name="s" id="s" />
	</form>
