
    <?php if (get_theme_mod( 'kotha_home_layout' ) == 'full') {

    } else { ?>
        <div class="col-md-4">
            <dir style="margin: 0 0 10px 0; padding: 0">
              <a href="https://www.urbanhire.com/blog/ask-urbanhire/" target="_blank">
                <img src="https://lh5.googleusercontent.com/6P4IgflclUR0oSyNqSn6TiI8xa4DpeuHuG7zTLD2FTawBZ6hbGgUA_8NGrzuCNf_f3L62oh_Qw=w1024" style="width: 100%; max-width: 100%">
              </a>
            </dir>
            <div class="primary-sidebar widget-area" role="complementary">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div>
        </div>
    <?php }
     ?>
