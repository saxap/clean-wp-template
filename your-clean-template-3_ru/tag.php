<?php
/**
 * tag template (tag.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container">
		<div class="<?php if (is_active_sidebar( 'sidebar' )) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } // классы в зависимости от того есть ли сайдбар ?>">
			<h1><?php printf('Посты с тэгом: %s', single_tag_title('', false)); // заголовок тэга ?></h1>
			<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
				<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
			<?php endwhile; // конец цикла
			else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>	 
			<?php pagination(); // пагинация, функция нах-ся в function.php ?>
		</div>
		<?php get_sidebar(); // подключаем sidebar.php ?>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>