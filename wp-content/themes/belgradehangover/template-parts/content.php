<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package belgradehangover
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-image">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
			<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
		</a>
	</div>

	<div class="entry-content">
		<header class="entry-header">
			<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			endif;

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php belgradehangover_posted_on(); ?> <?php echo do_shortcode('[likebtn theme="disk" dislike_enabled="0" icon_dislike_show="0" ef_voting="heartbeat" white_label="1" position="top" voter_by="user" user_logged_in="1" wrap="0" share_enabled="0"]'); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->
		<?php
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'belgradehangover' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'belgradehangover' ),
				'after'  => '</div>',
			) );

			if (is_single()) {
				echo do_shortcode('[wpdevart_facebook_comment curent_url="' . get_post_permalink() . '" order_type="social" title_text="Facebook Comment" title_text_color="#000000" title_text_font_size="22" title_text_font_famely="monospace" title_text_position="left" width="100%" bg_color="#d4d4d4" animation_effect="random" count_of_comments="3" ]');
			}

		?>
		<a rel="nofollow" class="blogPage__button" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read more>>'); ?></a>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
