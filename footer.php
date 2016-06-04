
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="footer-top"><?php dynamic_sidebar('footer-widget'); ?></div>
		</div>
	</div>
  <div class="container">
  	<div class="copy-right-text">
      <div class="pull-left text-u-c text-xs m-t-xs terms--condition">
        <span>
          <?php if(get_theme_mod('kotha_footer_copyright')): ?>
    			<?php
    			$copyright = get_theme_mod('kotha_footer_copyright');
    			$allowed_tags = array(
    				'strong' => array(),
    				'a' => array(
    					'href' => array(),
    					'title' => array()
    				)
    			);
    			echo wp_kses( $copyright, $allowed_tags ); ?>
  		    <?php endif; ?>
        </span>
      </div>
      <div class="pull-left text-u-c text-xs m-t-xs terms--policy">
        <a href="https://www.urbanhire.com/terms-and-conditions" title="Urbanhire Terms &amp; Conditions" class="m-r m-l">Terms &amp; Conditions &amp; Privacy Policy</a>
      </div>
      <p>&nbps;</p>
  	</div><!-- /Copyright Text -->
  </div>
</footer><!-- /#Footer -->

<?php if (!get_theme_mod('kotha_back_to_top')): ?>
  <div class="scroll-up">
    <a href="#"><i class="fa fa-angle-up"></i></a>
  </div>
<?php endif; ?>
<!-- Scroll Up -->
<?php wp_footer(); ?>
</body>
</html>
