<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="dns-prefetch" href="//www.googletagmanager.com">
	<link rel="dns-prefetch" href="//www.google-analytics.com">
	<link rel="dns-prefetch" href="//ssl.google-analytics.com">
	<link rel="dns-prefetch" href="//s3-ap-southeast-1.amazonaws.com">
	<link rel="dns-prefetch" href="//s0.wp.com">
	<link rel="dns-prefetch" href="//graph.facebook.com">
	<link rel="dns-prefetch" href="//connect.facebook.net">
	<link rel="dns-prefetch" href="//platform.twitter.com">
	<link rel="dns-prefetch" href="//syndication.twitter.com">
	<link rel="dns-prefetch" href="//www.facebook.com">
	<link rel="dns-prefetch" href="//secure.gravatar.com">
	<link rel="dns-prefetch" href="//stats.wp.com">
	<link rel="dns-prefetch" href="//pixel.wp.com">
	<link rel="dns-prefetch" href="//urbanhire.disqus.com">
	<link rel="dns-prefetch" href="//referrer.disqus.com">
	<link rel="dns-prefetch" href="//glitter.services.disqus.com">
	<link rel="dns-prefetch" href="//a.disquscdn.com">
	<link rel="dns-prefetch" href="//api.pinterest.com">
	<link rel="dns-prefetch" href="//www.linkedin.com">

	<!-- Facebook Pixel Code -->
	<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');

		fbq('init', '259164591143162');
		fbq('track', 'Search');
		fbq('track', 'Lead');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=259164591143162&ev=PageView&noscript=1"
	/></noscript>
	<!-- End Facebook Pixel Code -->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<noscript>
	  <iframe ssrc="//www.googletagmanager.com/ns.html?id=GTM-TWFJJF" height="0" width="0" style="display:none;visibility:hidden"></iframe>
	</noscript>
	<script>
	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','GTM-TWFJJF');
	</script>
<?php // if(!get_theme_mod('kotha_preloader') ): ?>
    <!-- <div id="st-preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div> -->
<?php // endif; ?>
<!-- /Preloader -->

<header id="header">
	<div class="container">

		<?php if(get_theme_mod('kotha_logo')): ?>
			<div class="main-logo pull-left">
				<a href="<?php echo esc_url(site_url()); ?>"><img src="<?php echo esc_url(get_theme_mod('kotha_logo'));
					?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"></a>
			</div><!-- /Logo -->
		<?php else: ?>
			<div class="text-logo pull-left">
				<a href="<?php echo esc_url(home_url()); ?>"><?php echo esc_attr(get_bloginfo('name')); ?></a>
				<p><?php echo esc_attr(get_bloginfo('description')); ?></p>
			</div><!-- /Logo -->
		<?php endif; ?>

		<div id="navigation-wrapper" class="pull-right">
			<?php wp_nav_menu( array('container' => false, 'theme_location' => 'main-menu', 'menu_class' => 'menu')); ?>
		</div>
		<div class="menu-mobile"></div>
	</div>
</header>
<div class="header-fixed-gap"></div>



