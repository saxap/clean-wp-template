<?php
/**
 * Header template (header.php)
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); // display your language attribute ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); // default charset ?>">
	<?php /* RSS and other staff */ ?>
	<link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo('rdf_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
	<link rel="alternate" type="application/rss+xml" title="Comments RSS" href="<?php bloginfo('comments_rss2_url'); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); // absolute path to youк theme ?>/style.css">
	 <!--[if lt IE 9]>
	 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	 <![endif]-->
	<title><?php typical_title(); // generate title, located in function.php ?></title>
	<?php wp_head(); // necessary for work plugins and functionality wp ?>
</head>
<body <?php body_class(); // all body classes, may be needed for styling ?>>
	<header>
		<?php $args = array( // arguments to display top menu, menu must be created in admin panel for arguments working
			'theme_location' => 'top', // menu identificator, defined of register_nav_menus() function in function.php
			'container'=> 'nav', // parent tag of ul, false is nothing
			'menu_class' => 'menu', // class of ul
  			'menu_id' => 'top-nav', // id attribute of ul
  			);
			wp_nav_menu($args); // display top menu
		?>
	</header>