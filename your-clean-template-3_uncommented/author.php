<?php
/**
 * Страница автора (author.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
get_header(); ?> 
<section>
	<div class="container">
		<div class="row">
			<div class="<?php content_class_by_sidebar();  ?>">
			    <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
				<h1>Посты автора <?php echo $curauth->nickname; ?></h1>
				<div class="media">
					<div class="media-left">
						<?php echo get_avatar($curauth->ID, 64, '', $curauth->nickname, array('class' => 'media-object')); ?>
					</div>
				<div class="media-body">
					<h4 class="media-heading"><?php echo $curauth->display_name; ?></h4>
					<?php if ($curauth->user_url) echo '<a href="'.$curauth->user_url.'">'.$curauth->user_url.'</a>'; ?>
					<?php if ($curauth->description) echo '<p>'.$curauth->description.'</p>'; ?>
				</div>
				</div>

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<?php get_template_part('loop'); ?>
				<?php endwhile;
				else: echo '<p>Нет записей.</p>'; endif; ?>	 
				<?php pagination(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>