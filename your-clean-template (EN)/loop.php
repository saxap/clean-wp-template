<?php
/**
 * Post in loop (loop.php)
 * @package WordPress
 * @subpackage your-clean-template
 */ 
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // post container with id and classes ?>
		<span><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span> <?php // post title and link to single post page (single.php) ?>
		<div class="meta">
			<p>Posted: <?php the_time('F j, Y'); ?> at <?php the_time('g:i a'); ?></p> <?php // created date and time ?>
			<p>Categories: <?php the_category(',') ?></p> <?php // links to categories ?>
			<?php the_tags('<p>Tags: ', ',', '</p>'); // links to tags ?>
		</div>
		<?php if ( has_post_thumbnail() ) the_post_thumbnail(); // show thumbmail if exist ?>
		<?php the_content(''); // post content before more line ?>
	</article>