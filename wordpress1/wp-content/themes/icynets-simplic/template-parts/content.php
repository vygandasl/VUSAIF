<?php
/**
 * Template part for displaying posts.
 *
 * @package icyNETS Simplic
 */

?>
<?php if (get_theme_mod('article_display') =='excerpt_smallfeatured'){ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>  
			<div class="post-image">
				<?php if ( has_post_thumbnail() ) : ?>
				
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('simplic_smallfeatured'); ?></a>
				
				<?php endif; ?>
			</div>
			
			<div class="post-data">
					<header class="entry-header">
							<?php the_title( sprintf( '<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?> 
							
								<div class="post-meta"><!--Post Meta Infos-->				 
									<?php icynets_simplic_post_meta(); ?>
								</div>        		
					</header><!-- .entry-header -->
					<div class="post-excerpt">
						<?php
						/* the post excerpts */
						the_excerpt();
						?>		
					</div><!-- .entry-content -->
					
					<div class="readmore">
						<a class="post-readmore float-r" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_attr_e('READ MORE', 'icynets-simplic'); ?></a>
					</div>
			</div><!-- .post-data -->
	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'icynets-simplic' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php } else { ?>


<article id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>> 								
	<div class="post-image-lg">				
		<?php if ( has_post_thumbnail() ) : ?>								
		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('simplic_big'); ?></a>								

		<?php endif; ?>			
	</div>					
	<header class="entry-header"><!--Post Title-->						
		<?php the_title( sprintf( '<h3 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>	
													
		<div class="post-meta"><!--Pot Tags-->							
			<?php icynets_simplic_post_meta(); ?>						
		</div>					
	</header>										

	<div class="post-excerpt-lg">						
		<?php the_excerpt();?>												

		<a class="post-readmore float-r" href="<?php echo get_permalink(); ?>">
			<?php esc_attr_e('READ MORE', 'icynets-simplic'); ?>
		</a>					
	</div>
</article>

<?php } ?>