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

					<div class="entry-content">
						<?php
						the_content();
						?>
					</div><!-- .entry-content -->
					
					<?php  
						$logos_section_title = get_field('logo_section_title');
						$logo_images = get_field('logo_image_gallery');
						
						if ($logo_images) :
					?>
					<div class="logos-section-cont">
						<h3 class="logo-section__title"><?php echo $logos_section_title; ?></h3>
						<div class="logos-gallery-cont">
							<?php foreach( $logo_images as $logo_image) {
								echo '<div class="logo-image-cont" style="background-image: ' . $logo_image . '"></div>';
							}
							?>
						</div>
					</div>
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
