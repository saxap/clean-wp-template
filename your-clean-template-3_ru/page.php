<?php
/**
 * Шаблон обычной страницы (page.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?>
<section>
	<div class="container">
		<div class="<?php if (is_active_sidebar( 'sidebar' )) { ?>col-sm-9<?php } else { ?>col-sm-12<?php } // классы в зависимости от того есть ли сайдбар ?>">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // старт цикла ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // контэйнер с классами и id ?>
					<h1><?php the_title(); // заголовок поста ?></h1>
					<?php the_content(); // контент ?>
				</article>
			<?php endwhile; // конец цикла ?>
		</div>
		<?php get_sidebar(); // подключаем sidebar.php ?>
	</div>
</section>
<?php get_footer(); // подключаем footer.php ?>