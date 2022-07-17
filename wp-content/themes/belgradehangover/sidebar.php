<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package belgradehangover
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary">
	<h2>Read our newest articles</h2>

	<div class="latestPosts">
		<?php
			$query = new WP_Query([
				'posts_per_page' => 3
			]);

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<div class="latestPosts__post">
					<div class="latestPosts__post-image">
						<a href="<?php echo esc_url(get_permalink()); ?>">
							<img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
						</a>
					</div>
					<div class="latestPosts__post-title">
						<a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
					</div>
					<div class="latestPosts__post-meta">
						<?php belgradehangover_posted_on(); ?>
					</div>
					<div class="latestPosts__post-content">
						<?php the_excerpt(); ?>
					</div>
					<a rel="nofollow" class="blogPage__button" href="<?php echo esc_url( get_permalink() ); ?>"><?php _e( 'Read more >>'); ?></a>

				</div>
		<?php
				endwhile;
			endif;
			wp_reset_query();
		?>
	</div>


	<?php // dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
