<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */ 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<div class="meta">
		<p>Опубликовано: <?php the_time(get_option('date_format')." в ".get_option('time_format')); ?></p>
		<p>Автор:  <?php the_author_posts_link(); ?></p>
		<p>Категории: <?php the_category(',') ?></p>
		<?php the_tags('<p>Тэги: ', ',', '</p>'); ?>
	</div>
	<div class="row">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="col-sm-3">
				<a href="<?php the_permalink(); ?>" class="thumbnail">
					<?php the_post_thumbnail(); ?>
				</a>
			</div>
		<?php } ?>
		<div class="<?php if ( has_post_thumbnail() ) { ?>col-sm-9<?php } else { ?>col-sm-12<?php }  ?>">
			<?php the_content(''); ?>
		</div>
	</div>
</article>