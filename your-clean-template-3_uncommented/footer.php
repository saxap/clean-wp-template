<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
	<footer>
		<div class="container">
			<div class="col-md-12">
				<?php $args = array(
					'theme_location' => 'bottom',
					'container'=> false,
					'menu_class' => 'nav nav-pills bottom-menu',
			  		'menu_id' => 'bottom-nav',
			  	);
				wp_nav_menu($args);
				?>
			</div>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>