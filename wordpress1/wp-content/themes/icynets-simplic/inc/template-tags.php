<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package icyNETS Simplic
 */

if ( ! function_exists( 'icynets_simplic_the_posts_navigation' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 */
function icynets_simplic_the_posts_navigation() {
// Don't print empty markup if there's only one page.
if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
	return;
}
?>
<nav class="navigation posts-navigation" role="navigation">
	<h2 class="screen-reader-text"><?php esc_html_e( 'Posts navigation', 'icynets-simplic' ); ?></h2>
	<div class="nav-links">
		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( esc_html__( 'Older posts', 'icynets-simplic' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( esc_html__( 'Newer posts', 'icynets-simplic' ) ); ?></div>
		<?php endif; ?>

	</div><!-- .nav-links -->
</nav><!-- .navigation -->
<?php
}
endif;


if ( ! function_exists( 'icynets_simplic_posted_on' ) ) :
/**
 * Prints article date.
 */
function icynets_simplic_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( '%s', 'post date', 'icynets-simplic' ),
		$time_string
	);

	echo '<span class="posted-on"><i class="space fa fa-calendar"></i>' . $posted_on . '</span>';

}
endif;

// Prints Author Name.
if ( ! function_exists( 'icynets_simplic_entry_author' ) ) :
function icynets_simplic_entry_author() {
	if ( get_theme_mod('author_meta') != 'off' ) {
		if ( 'post' == get_post_type() ) {
				$byline = sprintf(
			_x( '%s', 'post author', 'icynets-simplic' ),
			'<span class="author vcard"><span class="url fn"><a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"> <i class="fa fa-user"></i> ' . esc_html( get_the_author() ) . '</a></span></span>'
		);
				echo '<span class="theauthor"> ' . $byline . '</span>';
		}
	}
}
endif;

// Prints Category.
if ( ! function_exists( 'icynets_simplic_entry_category' ) ) :
function icynets_simplic_entry_category() {
	if ( get_theme_mod('category_meta') != 'off' ) {
		if ( 'post' == get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( '', 'icynets-simplic' ) );
			if ( $categories_list && icynets_simplic_categorized_blog() ) {
				printf( '<div class="thecategory">' . __( '%1$s', 'icynets-simplic' ) . '</div>', $categories_list );
			}
		} 
	}
}
endif;

// Prints number of Comments.
if ( ! function_exists( 'icynets_simplic_entry_comments' ) ) :
function icynets_simplic_entry_comments() {
	if ( get_theme_mod('comments_count') != 'off' ) {
		if ( 'post' == get_post_type() ) {
				  $num_comments = get_comments_number(); // get_comments_number returns only a numeric value
					  if ( comments_open() ) {
						   if ( $num_comments == 0 ) {
				   $comments = __('', 'icynets-simplic' );
					   } elseif ( $num_comments > 1 ) {
				   $comments = $num_comments . __('', 'icynets-simplic' );
					   } else {
					   $comments = __('1', 'icynets-simplic' );
					   }
					   $write_comments = $comments;
						   } else {
					   $write_comments =  __('Comments Off!', 'icynets-simplic' );
					  }
		
			if ( $write_comments ) {
				printf( '<span class="comments"><i class="fa fa-comments"></i> ' . __( '%1$s', 'icynets-simplic' ) . '</span>', $write_comments );
			}
		}
	}
}
endif;

// Prints Post Tags.
if ( ! function_exists( 'icynets_simplic_entry_tags' ) ) :
function icynets_simplic_entry_tags() {
    if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'icynets-simplic' ) );
		if ( $tags_list ) {
			printf( '<span class="thetags"><i class="fa fa-tags"></i>' . __( '%1$s', 'icynets-simplic' ) . '</span>', $tags_list );
		}
    }
}
endif;


if ( ! function_exists( 'icynets_simplic_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function icynets_simplic_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'icynets-simplic' ) );
		if ( $categories_list && icynets_simplic_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'icynets-simplic' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'icynets-simplic' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'icynets-simplic' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'icynets-simplic' ), esc_html__( '1 Comment', 'icynets-simplic' ), esc_html__( '% Comments', 'icynets-simplic' ) );
		echo '</span>';
	}

	edit_post_link( esc_html__( 'Edit', 'icynets-simplic' ), '<span class="edit-link">', '</span>' );
}
endif;


/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function icynets_simplic_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'icynets_simplic_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'icynets_simplic_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so icynets_simplic_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so icynets_simplic_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in icynets_simplic_categorized_blog.
 */
function icynets_simplic_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'icynets_simplic_categories' );
}
add_action( 'edit_category', 'icynets_simplic_category_transient_flusher' );
add_action( 'save_post',     'icynets_simplic_category_transient_flusher' );
