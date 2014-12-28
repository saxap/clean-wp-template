<?php
/**
 * Footer template (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<footer>
		<?php $args = array( // arguments to display bottom menu, menu must be created in admin panel for arguments working
			'theme_location' => 'bottom', // menu identificator, defined of register_nav_menus() function in function.php
			'container'=> false, // parent tag of ul, false is nothing
			'menu_class' => 'bottom-menu', // class of ul
	  		'menu_id' => 'bottom-nav', // id attribute of ul
	  	);
		wp_nav_menu($args); // display bottom menu
		?>
	</footer>
<?php wp_footer(); // necessary for work plugins and functionality wp ?>
</body>
</html>