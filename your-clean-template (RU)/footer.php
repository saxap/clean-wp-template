<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
	<footer>
		<?php $args = array( // опции для вывода нижнего меню, чтобы они работали, меню должно быть создано в админке
			'theme_location' => 'bottom', // идентификатор меню, определен в register_nav_menus() в function.php
			'container'=> false, // обертка списка, false - это ничего
			'menu_class' => 'bottom-menu', // класс для ul
	  		'menu_id' => 'bottom-nav', // id для ul
	  	);
		wp_nav_menu($args); // выводим нижние меню
		?>
	</footer>
<?php wp_footer(); // необходимо для работы плагинов и функционала  ?>
</body>
</html>