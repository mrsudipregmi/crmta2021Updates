<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package Catch Themes
 * @subpackage Catch Flames
 * @since Catch Flames 1.0
 */
//Getting data from Theme Options Panel
global $catchflames_options_settings;
$options = $catchflames_options_settings; ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'indexed' ); ?>>
		<header class="entry-header">
			<hgroup>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'catch-flames' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<h3 class="entry-format"><?php _e( 'Image', 'catch-flames' ); ?></h3>
			</hgroup>

		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
			global $catchflames_options_settings;
			$options = $catchflames_options_settings;
			$more_tag_text = $options['more_tag_text'];
			the_content( $more_tag_text ); ?>
			<?php wp_link_pages( array(
                'before'		=> '<div class="page-link"><span class="pages">' . __( 'Pages:', 'catch-flames' ) . '</span>',
                'after'			=> '</div>',
                'link_before' 	=> '<span>',
                'link_after'   	=> '</span>',
            ) );
            ?>
		</div><!-- .entry-content -->

		<footer class="entry-meta">
			<div class="entry-meta">
				<?php
					printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%4$s" title="%5$s" rel="author">%6$s</a></span></span>', 'catch-flames' ),
						esc_url( get_permalink() ),
						get_the_date( 'c' ),
						get_the_date(),
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
						esc_attr( sprintf( __( 'View all posts by %s', 'catch-flames' ), get_the_author() ) ),
						get_the_author()
					);
				?>
			</div><!-- .entry-meta -->
			<div class="entry-meta">
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'catch-flames' ) );
					if ( $categories_list ):
				?>
				<span class="cat-links">
					<?php printf( __( '<span class="%1$s">Posted in</span> %2$s', 'catch-flames' ), 'entry-utility-prep entry-utility-prep-cat-links', $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'catch-flames' ) );
					if ( $tags_list ): ?>
				<span class="tag-links">
					<?php printf( __( '<span class="%1$s">Tagged</span> %2$s', 'catch-flames' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>

				<?php if ( comments_open() && ! post_password_required() ) : ?>
					<span class="comments-link"><?php comments_popup_link(__('Leave a reply', 'catch-flames'), __('1 Comment &darr;', 'catch-flames'), __('% Comments &darr;', 'catch-flames')); ?></span>
				<?php endif; // End if comments_open() ?>
			</div><!-- .entry-meta -->

			<?php edit_post_link( __( 'Edit', 'catch-flames' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- #entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->