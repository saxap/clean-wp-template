<?php
/**
 * index (index.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
get_header(); // include header.php ?> 
<section>
	<?php if (have_posts()) : while (have_posts()) : the_post(); // if posts exist - start cycle ?>
		<?php get_template_part('loop'); // to output posts get loop template (loop.php) ?>
	<?php endwhile; // cycle end
	else: echo '<h2>Sorry, posts not found</h2>'; endif; // if posts not exist, show message ?>	 
	<?php pagination(); // show pagination, located in function.php ?>
</section>
<?php get_sidebar(); // include sidebar.php ?>
<?php get_footer(); // include footer.php ?>