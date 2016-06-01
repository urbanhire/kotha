<?php get_header(); ?>
    <?php if(get_theme_mod('kotha_home_banner')): ?>
    <div class="home-banner" style="background-image:url('<?php echo esc_url(get_theme_mod('kotha_home_banner'));?>');">
            
                <div class="outer">
                    <div class="middle">
                        <div class="inner">
                            <div class="container">
                                <h1>
                        <?php if(get_theme_mod('kotha_home_banner_text')): ?>
			<?php
			$bg_text = get_theme_mod('kotha_home_banner_text');
			$allowed_tags = array(
				'span' => array(),
				'a' => array(
					'href' => array(),
					'title' => array()
				)
			);
			echo wp_kses( $bg_text, $allowed_tags ); ?>
		<?php endif; ?>
                    </h1>
                            </div>
                        </div>
                    </div>
                </div>
            
    </div><!-- /Show banner -->
    <?php else: ?>
                        <!--banner hidden-->
		<?php endif; ?>
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
						<main id="main" class="site-main" role="main">

						<?php if ( have_posts() ) : ?>

							<?php /* Start the Loop */ ?>
							<?php while ( have_posts() ) : the_post(); ?>

								<?php
									get_template_part( 'content', 'post' );
								?>

							<?php endwhile; ?>


							<?php
							 // Posts Pagination
							if (get_theme_mod('kotha_blog_pagination') == 'navigation') {
								kotha_posts_navigation();
							} else {
								kotha_posts_pagination();
							} ?>

						<?php else : ?>

							<?php get_template_part( 'content', 'none' ); ?>

						<?php endif; ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div> <!-- /col -->
				<!-- Blogsidebar -->			
				<?php get_sidebar(); ?>
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</div> <!-- /.st-content -->

<?php get_footer(); ?>
