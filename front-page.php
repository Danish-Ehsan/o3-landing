<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Operation_O3
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php operation_o3_post_thumbnail(); ?>

					<div class="entry-content">
						<?php
						the_content();

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'operation-o3' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<?php if ( get_edit_post_link() ) : ?>
						<footer class="entry-footer">
							<?php
							edit_post_link(
								sprintf(
									wp_kses(
										/* translators: %s: Name of current post. Only visible to screen readers */
										__( 'Edit <span class="screen-reader-text">%s</span>', 'operation-o3' ),
										array(
											'span' => array(
												'class' => array(),
											),
										)
									),
									wp_kses_post( get_the_title() )
								),
								'<span class="edit-link">',
								'</span>'
							);
							?>
						</footer><!-- .entry-footer -->
					<?php endif; ?>
				</article><!-- #post-<?php the_ID(); ?> -->
			<?php

			endwhile;


		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

	</main><!-- #main -->

<?php
get_footer();
