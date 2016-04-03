<?php
/**
 * Страница автора (author.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); // подключаем header.php ?> 
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar(); // функция подставит класс в зависимости от того есть ли сайдбар, лежит в functions.php ?>">
			    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); // получим данные о авторе ?>
				<h1>Посты автора <?php echo $curauth->nickname; ?></h1>
				<?php /* Немного инфы о авторе */ ?>
				<div class="media">
					<div class="media-left">
						<?php echo get_avatar($curauth->ID, 64, '', $curauth->nickname, array('class' => 'media-object')); // покажим аватарку ?>
					</div>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $curauth->display_name; // тут может быть имя или ник, в зависимости что выберет автор ?></h4>
					<?php if ($curauth->user_url) echo '<a href="'.$curauth->user_url.'">'.$curauth->user_url.'</a>'; // если есть сайт ?>
					<?php if ($curauth->description) echo '<p>'.$curauth->description.'</p>'; // если есть описание ?>
				</div>
				</div>

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