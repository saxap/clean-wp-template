<?php
/**
 * Главная страница (index.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?> 
<section>
	<div class="container">
		<div class="<?php if (is_active_sidebar( 'sidebar' )) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } ?>">
			<h1><?php
				if (is_day()) : printf('Daily Archives: %s', get_the_date());
				elseif (is_month()) : printf('Monthly Archives: %s', get_the_date('F Y'));
				elseif (is_year()) : printf('Yearly Archives: %s', get_the_date('Y'));
				else : 'Archives';
			endif; ?></h1>
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