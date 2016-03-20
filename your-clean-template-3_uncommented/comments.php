<?php
/**
 * Шаблон комментариев (comments.php)
 * Выводит список комментариев и форму добавления
 * @package WordPress
 * @subpackage your-clean-template-3
 */
?>
<div id="comments">
	<h2>Всего комментариев: <?php echo get_comments_number(); ?></h2>
	<?php if (have_comments()) : ?>
	<ul class="comment-list media-list">
		<?php
			$args = array(
				'walker' => new clean_comments_constructor,
			);
			wp_list_comments($args); 
		?>
	</ul>
		<?php if (get_comment_pages_count() > 1 && get_option( 'page_comments')) : ?>
		<?php $args = array(
				'prev_text' => '«',
				'next_text' => '»',
				'type' => 'array',
				'echo' => false
			); 
			$page_links = paginate_comments_links($args);
			if( is_array( $page_links ) ) {
			    echo '<ul class="pagination comments-pagination">';
			    foreach ( $page_links as $link ) {
			    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>";
			        else echo "<li>$link</li>"; 
			    }
			   	echo '</ul>';
		 	}
		?>
		<?php endif; ?>
	<?php endif; ?>
	<?php if (comments_open()) {
		$fields =  array(
			'author' => '<div class="form-group"><label for="author">Имя</label><input class="form-control" id="author" name="author" type="text" value="'.esc_attr($commenter['comment_author']).'" size="30" required></div>',
			'email' => '<div class="form-group"><label for="email">Email</label><input class="form-control" id="email" name="email" type="email" value="'.esc_attr($commenter['comment_author_email']).'" size="30" required></div>',
			'url' => '<div class="form-group"><label for="url">Сайт</label><input class="form-control" id="url" name="url" type="text" value="'.esc_attr($commenter['comment_author_url']).'" size="30"></div>',
			);
		$args = array(
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'comment_field' => '<div class="form-group"><label for="comment">Комментарий:</label><textarea class="form-control" id="comment" name="comment" cols="45" rows="8" required></textarea></div>',
			'must_log_in' => '<p class="must-log-in">Вы должны быть зарегистрированы! '.wp_login_url(apply_filters('the_permalink',get_permalink())).'</p>',
			'logged_in_as' => '<p class="logged-in-as">'.sprintf(__( 'Вы вошли как <a href="%1$s">%2$s</a>. <a href="%3$s">Выйти?</a>'), admin_url('profile.php'), $user_identity, wp_logout_url(apply_filters('the_permalink',get_permalink()))).'</p>',
			'comment_notes_before' => '<p class="comment-notes">Ваш email не будет опубликован.</p>',
			'comment_notes_after' => '<p class="help-block form-allowed-tags">'.sprintf(__( 'Вы можете использовать следующие <abbr>HTML</abbr> тэги: %s'),'<code>'.allowed_tags().'</code>').'</p>',
			'id_form' => 'commentform',
			'id_submit' => 'submit',
			'title_reply' => 'Оставить комментарий',
			'title_reply_to' => 'Ответить %s',
			'cancel_reply_link' => 'Отменить ответ',
			'label_submit' => 'Отправить',
			'class_submit' => 'btn btn-default'
		);
	    comment_form($args);
	} ?>
</div>