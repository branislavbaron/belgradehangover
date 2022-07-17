<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
				<?php belgradehangover_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>

            <div class="venueDetails">
                <ul>
                    <li>Address: <?php echo get_field('address'); ?></li>
                    <li>Capacity: <?php echo get_field('capacity'); ?></li>
                    <li>Music: <?php echo get_field('music'); ?></li>
                    <li>Work Hours: <?php echo get_field('work_hours'); ?></li>
                </ul>
            </div>

		</header><!-- .entry-header -->
		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'belgradehangover' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'belgradehangover' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->

	<div class="entry-image">
		<?php the_post_thumbnail(); ?>
	</div>
</article><!-- #post-## -->
