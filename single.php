<?php get_header(); ?>

<div class="st-content">
    <div class="container">
        <div class="row">

                <div class="
                <?php if (get_theme_mod( 'kotha_home_layout' ) == 'full') { ?>
                    call-md-12
                <?php } else { ?>
                    col-md-8
                <?php }
                 ?>
                ">
                <div id="primary" class="content-area">
                <?php
                    if ( function_exists('yoast_breadcrumb') ) {
                        yoast_breadcrumb('<p id="breadcrumbs" itemscope itemtype="http://data-vocabulary.org/Breadcrumb">','</p>');
                    }
                ?>

                    <main id="main" class="site-main" role="main">

                        <?php if (have_posts()) :
                            while (have_posts()) :
                                the_post();
                                ?>

                                <?php get_template_part( 'content', 'single'); ?>

                                <?php // if (!get_theme_mod('kotha_post_author')) : ?>
                                    <!-- <div class="padding-content white-color">
                                        <?php // get_template_part( 'user-profile' ); ?>
                                    </div> -->
                                <?php //endif; ?>

                                <?php if (!get_theme_mod('kotha_post_nav')): ?>
                                    <div class="white-color">
                                        <?php kotha_post_navigation(); ?>
                                    </div>
                                <?php endif; ?>

                                <?php
                                    // don't-delete
                                    $count_post = get_post_meta( $post->ID, 'post_views_count', true);

                                    if( $count_post == 'post_views_count'){
                                        $count_post = 0;
                                        delete_post_meta( $post->ID, 'post_views_count');
                                        add_post_meta( $post->ID, 'post_views_count', $count_post);
                                    }
                                    else
                                    {
                                        $count_post = (int)$count_post + 1;
                                        update_post_meta( $post->ID, 'post_views_count', $count_post);

                                    }
                                ?>
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-576cf311b39ae995"></script>
                            <?php endwhile; // end of the loop. ?>

                        <?php else : ?>

                            <?php get_template_part('content', 'none'); ?>

                        <?php endif; ?>
                    </main> <!-- /.site-main -->
                </div>  <!-- /.content-area -->
            </div> <!-- /col -->

            <!-- Blogsidebar -->
            <?php get_sidebar(); ?>

        </div> <!-- /.row -->
    </div> <!-- /.container -->
</div>
<?php get_footer(); ?>
