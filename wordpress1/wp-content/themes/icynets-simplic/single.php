<?php
/**
 * The template for displaying all single posts.
 *
 * @package icyNETS Simplic
 */

get_header(); ?>

<div class="row" id="primary">
		<main id="content" class="col-md-8" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'single' ); ?>

				

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	

		<aside class="col-md-4">
		
			<?php get_sidebar(); ?>
			
		</aside><!--.col-md-4 siddebar widget-->
		
</div><!-- #primary -->

<?php get_footer(); ?>
