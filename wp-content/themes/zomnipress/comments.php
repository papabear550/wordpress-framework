<?php
/**
 * comments.php
 *
 */
?>

<?php
	if( !empty($_SERVER['SCRIPT-FILENAME']) && basename( $_SERVER['SCRIPT-FILENAME'] ) == 'comments.php') {
		die( __('You cannot access this page directly.', 'alpha') );
	}
?>

<?php 
	// Check if post is password protected
	if( post_password_required() ) :
?>

<p>
	<?php
		_e( 'This post is password protected. Enter the password to view comments.', 'alpha' );

		return;
	?>
</p>

<?php endif; ?>

<!-- START: COMMENTS AREA -->
<div class="comments-area" id="comments">
	<?php if( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php 
				printf( _nx( 'One comment', '%1$s comments', get_comments_number(), 'Comments title', 'alpha' ), number_format_i18n( get_comments_number() ) );
			 ?>
		</h2>

		<ol class="comments">
			<?php wp_list_comments(); ?>
		</ol>

		<?php
			// If the comments are paginated, Display the control
			if( get_comment_pages_count() > 1 && get_option( 'page_comments') ) :
		?>
			<nav class="comment-nav" role="navigation">
				<p class="comment-nav-prev">
					<?php previous_comments_link( __('&larr; Older comments', 'alpha') ) ?>
				</p>

				<p class="comment-nav-next">
					<?php next_comments_link( __('Newer comments &rarr;', 'alpha') ) ?>
				</p>
			</nav>
		<?php endif; ?>

		<?php
			// If comments are closed, display an info text
			if(!comments_open() && get_comments_number() ) :
		?>
			<p class="no-comments">
				<?php _e('Comments are closed.', 'alpha') ?>
			</p>
		<?php endif; ?>

		<?php comment_form(); ?>
	<?php endif; ?>
</div>
<!-- END: COMMENTS AREA -->