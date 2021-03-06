<?php

    //----------------------------------------------------------------------
    //  Posts navigation link. <- Older post  |   Newer Post ->
    //----------------------------------------------------------------------

    if (!function_exists('kotha_posts_navigation')) {

        function kotha_posts_navigation()
        {
            ?>
            <div class="row next-previous-posts clearfix">

                <?php if (get_previous_posts_link()) { ?>
                    <div class="col-xs-6 pull-left">
                        <div class="next-posts">
                            <div class="post-headingn text-left">
                                <h2><?php previous_posts_link(__('<i class="fa fa-angle-left"></i> Newer posts', 'kotha')); ?></h2></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php if (get_next_posts_link()) { ?>
                    <div class="col-xs-6 pull-right">
                        <div class="previous-posts">
                            <div class="post-heading text-right">
                                <h2><?php next_posts_link(__('Older posts <i class="fa fa-angle-right"></i>', 'kotha')); ?></h2></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        <?php
        }
    }


    //----------------------------------------------------------------------
    //  Blog Pagination
    //----------------------------------------------------------------------

    if (!function_exists('kotha_posts_pagination')) {
        function kotha_posts_pagination()
        {
            global $wp_query;
            if ($wp_query->max_num_pages > 1) {
                $big   = 999999999; // need an unlikely integer
                $items = paginate_links(array(
                    'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format'    => '?paged=%#%',
                    'prev_next' => TRUE,
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $wp_query->max_num_pages,
                    'type'      => 'array',
                    'prev_text' => '<i class="fa fa-angle-left"></i>',
                    'next_text' => '<i class="fa fa-angle-right"></i>'
                ));

                $pagination = "<ul class=\"pagination\">\n\t<li>";
                $pagination .= join("</li>\n\t<li>", $items);
                $pagination . "</li>\n</ul>\n";

                echo $pagination;
            }
            return;
        }
    }


    //----------------------------------------------------------------------
    //  Posted on
    //----------------------------------------------------------------------

    if (!function_exists('kotha_post_tag_list')) {
        function kotha_post_tag_list()
        {
        $tags_list = get_the_tag_list( '', __( ', ', 'kotha' ) );
        if ( $tags_list ) {
            printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'kotha' ) . '</span>', $tags_list );
        }

        }}


    if (!function_exists('kotha_posted_on')) {
        function kotha_posted_on()
        {
            ?>
            <ul class="list-inline">
            <?php if (!get_theme_mod('kotha_post_author_name')): ?>
                <li>
                    <span class="author vcard">
                        <?php _e('By ', 'kotha');
                            printf('<a itemprop="author" class="url fn n" href="%1$s">%2$s</a>',
                                esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                                esc_html(get_the_author())
                            ) ?>
                    </span>
                </li>

                <li>/</li>
            <?php endif; ?>

			<?php if (!get_theme_mod('kotha_post_date')): ?>
                <li>
                    <span class="posted-on" itemprop="datePublished"><?php the_time('d M Y') ?></span>
                </li>

                <li>/</li>
            <?php endif; ?>

            <?php if (!get_theme_mod('kotha_post_cat')): ?>
                <?php if (get_the_category_list()): ?>
                    <li>
                        <span class="posted-in" itemprop="keywords">
                            <?php echo get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.', 'kotha'));
                            ?>
                        </span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>


            </ul>
        <?php
        }
    }



    //----------------------------------------------------------------------
    //  Single Post navigation link. <- Previous post  |   Next Post ->
    //----------------------------------------------------------------------

    if (!function_exists('kotha_post_navigation')) {

        function kotha_post_navigation()
        {
            // Don't print empty markup if there's nowhere to navigate.
            $previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(FALSE, '', TRUE);
            $next     = get_adjacent_post(FALSE, '', FALSE);

            if (!$next && !$previous) {
                return;
            }
            ?>
            <nav class="next-previous-post clearfix" role="navigation">
                <div class="next-previous-post clearfix">
                    <!-- Previous Post -->
                    <div class="previous-post pull-left">
                        <?php previous_post_link('<div class="nav-previous">%link</div>', __('<i class="fa fa-angle-left"></i> Previous Post', 'kotha')); ?>
                    </div>

                    <!-- Next Post -->
                    <div class="next-post pull-right text-right">
                        <?php next_post_link('<div class="nav-next">%link</div>', __('Next Post <i class="fa fa-angle-right"></i>', 'kotha')); ?>
                    </div>
                </div>
            </nav><!-- .navigation -->
        <?php
        }
    }


    //----------------------------------------------------------------------
    // Archive title
    //----------------------------------------------------------------------

    if ( ! function_exists( 'kotha_archive_title' ) ) :

    function kotha_archive_title( $before = '', $after = '' ) {
    	if ( is_category() ) {
    		$title = sprintf( __( 'Browse Category <h1>%s</h1>', 'kotha' ), single_cat_title( '', false ) );
    	} elseif ( is_tag() ) {
    		$title = sprintf( __( 'Browse Tag <h1>%s</h1>', 'kotha' ), single_tag_title( '', false ) );
    	} elseif ( is_author() ) {
    		$title = sprintf( __( 'Browse Author <h1>%s</h1>', 'kotha' ), '<span class="vcard">' . get_the_author() . '</span>' );
    	} elseif ( is_year() ) {
    		$title = sprintf( __( 'Browse Year <h1>%s</h1>', 'kotha' ), get_the_date( _x( 'Y', 'yearly archives date format', 'kotha' ) ) );
    	} elseif ( is_month() ) {
    		$title = sprintf( __( 'Browse Month <h1>%s</h1>', 'kotha' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'kotha' ) ) );
    	} elseif ( is_day() ) {
    		$title = sprintf( __( 'Browse Day <h1>%s</h1>', 'kotha' ), get_the_date( _x( 'F j, Y', 'daily archives date format', 'kotha' ) ) );
    	} elseif ( is_tax( 'post_format' ) ) {
    		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
    			$title = _x( 'Asides', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
    			$title = _x( 'Galleries', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
    			$title = _x( 'Images', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
    			$title = _x( 'Videos', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
    			$title = _x( 'Quotes', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
    			$title = _x( 'Links', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
    			$title = _x( 'Statuses', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
    			$title = _x( 'Audio', 'post format archive title', 'kotha' );
    		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
    			$title = _x( 'Chats', 'post format archive title', 'kotha' );
    		}
    	} elseif ( is_post_type_archive() ) {
    		$title = sprintf( __( 'Browse Archives <h1>%s</h1>', 'kotha' ), post_type_archive_title( '', false ) );
    	} elseif ( is_tax() ) {
    		$tax = get_taxonomy( get_queried_object()->taxonomy );
    		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
    		$title = sprintf( __( '%1$s: %2$s', 'kotha' ), $tax->labels->singular_name, single_term_title( '', false
            ) );
    	} else {
    		$title = __( 'Archives', 'kotha' );
    	}

    	/**
    	 * Filter the archive title.
    	 *
    	 * @param string $title Archive title to be displayed.
    	 */
    	$title = apply_filters( 'get_the_archive_title', $title );

    	if ( ! empty( $title ) ) {
    		echo $before . $title . $after;
    	}
    }
    endif;





if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;
	}
}
endif;





/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function kotha_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'kotha_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kotha_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so kotha_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so kotha_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in kotha_categorized_blog.
 */
function kotha_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'kotha_categories' );
}
add_action( 'edit_category', 'kotha_category_transient_flusher' );
add_action( 'save_post',     'kotha_category_transient_flusher' );
