<?php
/**
 * Single page template (page.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // include header.php ?>
<section>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); // cycle start ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>> <?php // post container with id and classes ?>
		<h1><?php the_title(); // page title ?></h1>
		<?php the_content(); // page content ?>
	</article>
<?php endwhile; // cycle end ?>
</section>
<?php get_sidebar(); // include sidebar.php ?>
<?php get_footer(); // include footer.php ?>