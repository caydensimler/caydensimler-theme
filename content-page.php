<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php generate_article_schema( 'CreativeWork' ); ?>>
	<div class="inside-article">
		<?php
		/**
		 * generate_before_content hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_featured_page_header_inside_single - 10
		 */
		do_action( 'generate_before_content' );

		if ( generate_show_title() ) : ?>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
			</header><!-- .entry-header -->

		<?php endif;

		/**
		 * generate_after_entry_header hook.
		 *
		 * @since 0.1
		 *
		 * @hooked generate_post_image - 10
		 */
		do_action( 'generate_after_entry_header' );
		?>

		<div class="entry-content" itemprop="text">
			<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'generatepress' ),
				'after'  => '</div>',
			) );
			?>

			<div class="section_content">

				<!-- About Me/Interests -->
				<h1 class="section_header" id="about">
					<?php the_field( 'interest_header' ); ?>
					<hr>
				</h1>

				<?php if ( have_rows( 'interest_single' ) ) : ?>
					<?php while ( have_rows( 'interest_single' ) ) : the_row(); ?>
						<div class="col-xs-12 col-md-6 col-lg-4 interest_single">
							<!-- <div class="interest_single_header" style="background-image: url(<?php the_sub_field( 'interest_single_background_image' ); ?>"> -->
							<div class="interest_single_header" style="background:linear-gradient(0deg,rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(<?php the_sub_field( 'interest_single_background_image' ); ?>);">
								<h1>
									<span class="interest_icon"><?php the_sub_field( 'interest_single_icon' ); ?></span>
								</h1>
								<h2><?php the_sub_field( 'interest_single_header' ); ?></h2>
							</div>

							<p class="interest_text"><?php the_sub_field( 'interest_single_text' ); ?></p>
						</div>
					<?php endwhile; ?>
				<?php else : ?>
					<?php // no rows found ?>
				<?php endif; ?>

				<!-- Portfolio -->
				<?php
					// Get the 'Profiles' post type
					// $args = array(
					//     'post_type' => 'projects',
					// );
					// $loop = new WP_Query($args);

					// while($loop->have_posts()): $loop->the_post();

					// the_title();
					// the_category();
					// echo '<img src="' . get_the_post_thumbnail_url() . '">';
					// echo '<br>';

					// endwhile;
					// wp_reset_query();
				?>

		</div><!-- .entry-content -->

		<?php
		/**
		 * generate_after_content hook.
		 *
		 * @since 0.1
		 */
		do_action( 'generate_after_content' );
		?>
	</div><!-- .inside-article -->
</article><!-- #post-## -->
