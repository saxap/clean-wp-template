<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?>
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
						<h1><?php the_title(); // заголовок поста ?></h1>
						<div class="meta">
							<p>Опубликовано: <?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></p> <?php // дата и время создания ?>
							<p>Автор:  <?php the_author_posts_link(); ?></p>
							<p>Категории: <?php the_category(',') ?></p> <?php // ссылки на категории в которых опубликован пост, через зпт ?>
							<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
						</div>
						<?php the_content(); // контент ?>
					</article>
				<?php endwhile; // конец цикла ?>
				<?php previous_post_link('%link', '<- Предыдущий пост: %title', TRUE); // ссылка на предыдущий пост ?> 
				<?php next_post_link('%link', 'Следующий пост: %title ->', TRUE); // ссылка на следующий пост ?> 
				<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
			</div>
			<?php get_sidebar(); // подключаем sidebar.php ?>
		</div>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>
