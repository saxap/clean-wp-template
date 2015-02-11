<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // подключаем header.php ?>
<section>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
		<h1><?php the_title(); // заголовок поста ?></h1>
		<div class="meta">
			<p>Опубликовано: <?php the_time('F j, Y'); ?> в <?php the_time('g:i a'); ?></p> <?php // дата и время создания ?>
			<p>Категории: <?php the_category(',') ?></p> <?php // ссылки на категории в которых опубликован пост, через зпт ?>
			<?php the_tags('<p>Тэги: ', ',', '</p>'); // ссылки на тэги поста ?>
		</div>
		<?php the_content(); // контент ?>
	</article>
<?php endwhile; // конец цикла ?>
<?php previous_post_link('%link', '<- Предыдущий пост: %title', TRUE); // ссылка на предыдущий пост ?> 
<?php next_post_link('%link', 'Следующий пост: %title ->', TRUE); // ссылка на следующий пост ?> 
<?php if (comments_open() || get_comments_number()) comments_template('', true); // если комментирование открыто - мы покажем список комментариев и форму, если закрыто, но кол-во комментов > 0 - покажем только список комментариев ?>
</section>
<?php get_sidebar(); // подключаем sidebar.php ?>
<?php get_footer(); // подключаем footer.php ?>
