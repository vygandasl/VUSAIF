<?php
/**
 * Template part for displaying single posts.
 *
 * @package icyNETS Simplic
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
					<header class="entry-header post-header">
						<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>						
						<div class="post-meta"><!--Post Meta-->					
							<?php icynets_simplic_post_meta(); ?>								
						</div>
					</header>
					
					<!--In case Your want to Add Featured Image To top of Post-->					
					<div class="post-content">
						<div class="post-image post-featured">
							<?php if ( has_post_thumbnail() ) : ?>			
								<?php the_post_thumbnail(); ?>					
							<?php endif; ?>
						</div>					
						<?php the_content(); ?>					
						<?php wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'icynets-simplic' ),
							'after'  => '</div>',
						) ); ?>
						
						<footer class="entry-footer">
							<?php edit_post_link( esc_html__( 'Edit This Post', 'icynets-simplic' ), '<span class="edit-link">', '</span>' ); ?>
							<?php //icynets_simplic_entry_footer(); ?>
						</footer><!-- .entry-footer -->
					</div><!--.post-content-->					
					<div class="post-tags"><!--Article Tags come here-->
						<ul>
							<li><?php icynets_simplic_entry_tags(); ?></li>
						</ul>
					</div><!--.Article Tags-->	
					
<?php if (get_theme_mod('author_bio') !='off'){ icynets_simplic_author_box(); } ?>
						
					<div class="post-navigation">
						<?php icynets_simplic_next_prev_post(); ?>						
					</div>
</article><!--.post-box-->

