<?php
/**
 * Страница архивов записей (archive.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
				<h1><?php // заголовок архивов
					if (is_day()) : printf('Daily Archives: %s', get_the_date()); // если по дням
					elseif (is_month()) : printf('Monthly Archives: %s', get_the_date('F Y')); // если по месяцам
					elseif (is_year()) : printf('Yearly Archives: %s', get_the_date('Y')); // если по годам
					else : 'Archives';
				endif; ?></h1>
				<?php if (have_posts()) : while (have_posts()) : the_post(); // если посты есть - запускаем цикл wp ?>
					<?php get_template_part('loop'); // для отображения каждой записи берем шаблон loop.php ?>
				<?php endwhile; // конец цикла
				else: echo '<p>Нет записей.</p>'; endif; // если записей нет, напишим "простите" ?>	 
				<?php pagination(); // пагинация, функция нах-ся в function.php ?>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>