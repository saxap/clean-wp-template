<?php
/**
 * Functions of your template (function.php)
 * @package WordPress
 * @subpackage your-clean-template
 */

function typical_title() { // display title function
	global $page, $paged; // pagination vars must be global
	wp_title('|', true, 'right'); // standart wp title with "|" devider
	bloginfo('name'); // show sitename
	$site_description = get_bloginfo('description', 'display'); // get site description
	if ($site_description && (is_home() || is_front_page())) // if site description exist and this is home page
		echo " | $site_description"; // display site description with "|" devider
	if ($paged >= 2 || $page >= 2) // if pagination is used
		echo ' | '.sprintf(__( 'Page %s'), max($paged, $page)); // display page number with "|" devider
}

register_nav_menus(array( // register 2 menus
	'top' => 'Top menu', // top menu
	'bottom' => 'Bottom menu' // bottom menu
));

add_theme_support('post-thumbnails'); // enable thumbnails support
set_post_thumbnail_size(250, 150); // set thumbnail size 250x150
add_image_size('big-thumb', 400, 400, true); // add one more image size 400x400 with crop, may be repeat with another first argument(name), to adding more images size

register_sidebar(array( // register left sidebar, this block may be repeat to add other sidebars
	'name' => 'Left sidebar', // displaying name in admin panel
	'id' => "left-sidebar", // identificator for calling sidebar in sidebar.php or another templates
	'description' => 'Typical sidebar on the left', // displaying description in admin panel
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // markup before any widget
	'after_widget' => "</div>\n", // markup after any widget
	'before_title' => '<span class="widgettitle">', // markup before any title in widget
	'after_title' => "</span>\n", // markup after any title in widget
));

class clean_comments_constructor extends Walker_Comment { // class, that construct all comments structure
	public function start_lvl( &$output, $depth = 0, $args = array()) { // what display before child comments
		$output .= '<ul class="children">' . "\n";
	}
	public function end_lvl( &$output, $depth = 0, $args = array()) { // what display after child comments
		$output .= "</ul><!-- .children -->\n";
	}
    protected function comment( $comment, $depth, $args ) { // each comment markup, without </li>!
    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : ''); // get typical wp comment classes and if comment belong post autor add "author-comment" class
        echo '<li id="li-comment-'.get_comment_ID().'" class="'.$classes.'">'."\n"; // parent tag with classes and uniq id
    	echo '<div id="comment-'.get_comment_ID().'">'."\n"; // anchor element with this id need to anchor links on comments works
    	echo get_avatar($comment, 64)."\n"; // show avatar with size 64x64 px
    	echo '<p class="meta">Posted by: '.get_comment_author()."\n"; // comment autor name
    	echo ' '.get_comment_author_email(); // comment autor email
    	echo ' '.get_comment_author_url(); // comment autor url
    	echo ' On '.get_comment_date('F j, Y').' at '.get_comment_time().'</p>'."\n"; // date and time of comment creating
    	if ( '0' == $comment->comment_approved ) echo '<em class="comment-awaiting-moderation">Your comment is awaiting moderation</em>'."\n"; // if comment is not approved notify of it
        comment_text()."\n"; // display comment text
        $reply_link_args = array( // reply link options
        	'depth' => $depth, // current comment depth
        	'reply_text' => 'Reply on it', // reply text
			'login_text' => 'You must be logged to post comments' // login text, if comments posting may only registered users
        );
        echo get_comment_reply_link(array_merge($args, $reply_link_args)); // display reply link
        echo '</div>'."\n"; // anchor element end
    }
    public function end_el( &$output, $comment, $depth = 0, $args = array() ) { // end of each comment markup
		$output .= "</li><!-- #comment-## -->\n";
	}
}

function pagination() {
	global $wp_query; // wp_query must be global
	$big = 999999999; // uniq num for replace
	echo paginate_links(array(
		'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))), // what replace in format
		'format' => '?paged=%#%', // format of pagination, %#% will be replaced
		'current' => max(1, get_query_var('paged')), // current page, 1 if $_GET['page'] is not set
		'type' => 'list', // links in ul list
		'prev_text'    => 'prev', // prev text
    	'next_text'    => 'next', // next text
		'total' => $wp_query->max_num_pages, // total amount of pages in pagination list
		'show_all'     => false, // do not show all links, otherwise end_size and mid_size will be ignored
		'end_size'     => 15, // how many numbers on either the start and the end list edges (12 ... 4 ... 89)
		'mid_size'     => 15, // how many numbers to either side of current page, but not including current page (... 123 5 678 ...).
		'add_args'     => false, // array of GET parameters to add in href
		'add_fragment' => '',	//string to append to each href in links
		'before_page_number' => '', // string to appear before the page number
		'after_page_number' => '' // string to appear after the page number
	));
}
?>
