<?php
/**
 * Comments template (comments.php)
 * Contain comments list and adding form
 * @package WordPress
 * @subpackage your-clean-template
 */
?>
<div id="comments"> <?php // must be for anchor link to comments works ?>
	<span>Total comments: <?php echo get_comments_number(); // get total comments num ?></span>
	<?php if (have_comments()) : // if comments exists ?>
	<ul class="comment-list">
		<?php
			$args = array( // arguments for comments list, some options see in admin panel, others in walker class
				'walker' => new clean_comments_constructor, // class, that construct all comments structure, located in function.php
			);
			wp_list_comments($args); // display comments
		?>
	</ul>
	<?php if (get_comment_pages_count() > 1 && get_option( 'page_comments')) : // if comments pages > 1 and comments pagination enabled?>
	<?php $args = array( // arguments for comments pagination
			'prev_text' => '«', // prev page text
			'next_text' => '»' // next page text
		); 
		paginate_comments_links($args); // show comments pagination
	?>
	<?php endif; // if comments pages > 1 and comments pagination enabled - end ?>
	<?php endif; // if comments exists - end ?>
	<?php if (comments_open()) { // if comments open
		/* COMMENT FORM STAFF */
		$fields =  array( // text inputs markup
			'author' => '<label for="author">Your name <input id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30" required></label>', // name field
			'email' => '<label for="email">Your email<input id="email" name="email" type="text" value="'.esc_attr($commenter['comment_author_email']).'" size="30" required></label>', // email field
			'url' => '<label for="url">Your site<input id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"></label>', // url field
			);
		$args = array( // comment form options
			'fields' => apply_filters('comment_form_default_fields', $fields), // replace default text inputs to inputs in $fields
			'comment_field' => '<label for="comment">Say something<textarea id="comment" name="comment" cols="45" rows="8"></textarea></label>', // texarea field
			'must_log_in' => '<p class="must-log-in">You must be login! '.wp_login_url(apply_filters('the_permalink',get_permalink())).'</p>', // must be login text
			'logged_in_as' => '<p class="logged-in-as">'.sprintf(__( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s">Log out?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink',get_permalink()))).'</p>', // logged in as text and markup
			'comment_notes_before' => '<p class="comment-notes">Your email address will not be published.</p>', // text before form
			'comment_notes_after' => '<p class="form-allowed-tags">'.sprintf(__( 'You may use these <abbr>HTML</abbr> tags and attributes: %s'),'<code>'.allowed_tags().'</code>').'</p>', // text after form
			'id_form' => 'commentform', // form id attribute
			'id_submit' => 'submit', // submit button id attribute
			'title_reply' => 'Leave a Reply', // comment form title
			'title_reply_to' => 'Leave a Reply to %s', // "Reply to" text
			'cancel_reply_link' => 'Cancel reply', // cancel reply text
			'label_submit' => 'Post Comment' // text on submit button
		);
		/* NEXT CODE WILL BE REPLACE NATIVE COMMENT FORM MARKUP, THAT WE CANNOT CHANGE WITH STANDART FUNCTIONS */
		/* FOR EXAMPLE IT MAY BE HELPFUL IF WE NEED TO CHANGE MARKUP FOR TWITTER BOOTSTRAP */
		ob_start(); // enable output buferisation
	    comment_form($args); // show comment form with ours arguments
	    $what_changes = array( // array, where key - is what we change and value - is to what we change
	    		'<small>' => '', // delete <small> tag
	    		'</small>' => '', // delete </small> tag
	    		'<h3 id="reply-title" class="comment-reply-title">' => '<span id="reply-title">', // replace h3 to span tag
	    		'</h3>' => '</span>', // replace h3 to span tag
	    		'<input name="submit" type="submit" id="submit" value="'.$args['label_submit'].'" />' => '<button type="submit">'.$args['label_submit'].'</button>' //replace submit input to button
	    	);
	    $new_form = str_replace(array_keys($what_changes), array_values($what_changes), ob_get_contents()); // change elements in output
	    ob_end_clean(); // clear buferiation
	    echo $new_form; // show new form
	} ?>
</div>