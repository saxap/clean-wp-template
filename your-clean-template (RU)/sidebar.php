<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<aside>
<?php dynamic_sidebar('left-sidebar'); // выводим сайдбар, имя определено в function.php ?>
</aside>