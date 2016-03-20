<?php
/**
 * Страница 404 ошибки (404.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?>
<section>
	<div class="container">
		<div class="<?php if (is_active_sidebar( 'sidebar' )) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?>">
			<h1>Ой, это 404!</h1>
			<p>Блаблабла 404 Блаблабла</p>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>