<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?> 
<section>
	<div class="container">
		<div class="<?php if (is_active_sidebar( 'sidebar' )) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?>">
			<h1><?php single_cat_title(); ?></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php get_template_part('loop'); ?>
			<?php endwhile;
			else: echo '<p>Нет записей.</p>'; endif; ?>	 
			<?php pagination(); ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</section>
<?php get_footer(); ?>