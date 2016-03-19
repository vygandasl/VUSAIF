<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package icyNETS Simplic
 */

get_header(); ?>

	<div class="row" id="primary">
		 <main id="content" class="col-md-8" role="main">

			<section class="error-404 not-found">
				<header class=""><!--.page-header-->
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'icynets-simplic' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'icynets-simplic' ); ?></p>

					<?php get_search_form(); ?>
					
					<h2><?php esc_html_e( 'Browse through some recent activities', 'icynets-simplic' ); ?></h2>
					<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>

					<?php if ( icynets_simplic_categorized_blog() ) : // Only show the widget if site has multiple categories. ?>
					<div class="widget widget_categories">
						<h2 class="widget-title"><?php esc_html_e( 'Most Used Categories', 'icynets-simplic' ); ?></h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					<?php endif; ?>

					<?php
						/* translators: %1$s: smiley */
						$archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'icynets-simplic' ), convert_smilies( ':)' ) ) . '</p>';
						the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
		
		<aside class="col-md-4">
		
			<?php get_sidebar(); ?>
			
		</aside><!--.col-md-4 siddebar widget-->
	</div><!-- #primary -->

<?php get_footer(); ?>
