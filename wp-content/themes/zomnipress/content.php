<?php
/**
 * content.php
 * 
 * The default file that will display content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class() ?>>
	<!-- START: ENTRY HEADER -->
	<header class="entry-header">
		<!-- FOR SHOWING THUMBNAILS -->
		<?php if( has_post_thumbnail() && !post_password_required() ) : ?>
			<figure class="entry-thumbnail">
				<?php the_post_thumbnail() ?>
			</figure>
		<?php endif; ?>

		<!-- TITLE FOR THE POST -->
		<?php if( is_single() ) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<p class="entry-meta">
			<?php
				// Display the meta information
				alpha_post_meta();
			?>
		</p>
	</header>
	<!-- END: ENTRY HEADER -->

	<!-- START: ARTICLE CONTENT -->
	<div class="entry-content">
		<?php if( is_search() ) : ?>
			<?php the_excerpt(); ?>
		<?php else : ?>
			<?php the_content( __('Continue Reading &rarr;', 'alpha') ); ?>
			
			<!-- START: DISPLAY PAGINATION -->
			<?php wp_link_pages(); ?>
		<?php endif; ?>
	</div>
	<!-- END: ARTICLE CONTENT -->

	<!-- START: ARTICLE FOOTER -->
	<footer class="entry-footer">
		<?php if( is_single() && get_the_author_meta('description') ) : ?>
			<h2><?php echo __('Written by ', 'alpha') . get_the_author(); ?></h2>
			<p><?php echo the_author_meta('description'); ?></p>
		<?php else : ?>

		<?php endif; ?>
	</footer>
	<!-- END: ARTICLE FOOTER -->
</article>