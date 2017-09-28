<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php bloginfo('name'); wp_title(); ?></title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/responsiveslides.min.js"></script>
<script>
		$(function() {
			$(".rslides").responsiveSlides({
			  auto: true,             // Boolean: Animate automatically, true or false
			  speed: 500,            // Integer: Speed of the transition, in milliseconds
			  timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
			  pager: true,           // Boolean: Show pager, true or false
			  nav: false,             // Boolean: Show navigation, true or false
			  random: false,          // Boolean: Randomize the order of the slides, true or false
			  pause: false,           // Boolean: Pause on hover, true or false
			  pauseControls: true,    // Boolean: Pause when hovering controls, true or false
			  prevText: "",   // String: Text for the "previous" button
			  nextText: "",       // String: Text for the "next" button
			  maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
			  navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
			  manualControls: "",     // Selector: Declare custom pager navigation
			  namespace: "rslides",   // String: Change the default namespace used
			  before: function(){},   // Function: Before callback
			  after: function(){}     // Function: After callback
			});
			
			
			var pull 		= $('#pull');
				menu 		= $('#menu ul');
				menuHeight	= menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});

			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
			
		});
	</script>
<?php wp_head(); ?>
</head>

<body>
<div class="head-wrapper">
	<div class="head">
    	<div class="head-logo"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo.jpg" alt="" /></a></div>
        <div class="head-banner">
<?php $banner = new WP_Query( array('post_type' => 'banner', 'posts_per_page' => 1) ); ?>
<?php if ($banner->have_posts()) :  while ($banner->have_posts()) : $banner->the_post(); ?>
	<?php the_post_thumbnail('full'); ?>
<?php endwhile; ?>
<?php else: ?>
	<p>Место для баннера 728Х90</p>
<?php endif; ?>
		</div>
    </div>
</div>
<div class="menu-wrapper">
	<div class="menu-main">
    	<div id="menu">
<?php if(!dynamic_sidebar('menu_header')): ?>
<span>Это область меню, добавляемого из виджетов</span>
<?php endif; ?>

            <div class="ico-social">
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ico-vk.png" alt="мы вконтакте" /></a></p>
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ico-youtobe.png" alt="канал youtobe" /></a></p>
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ico-facebook.png" alt="мы на facebook" /></a></p>
                <p><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/ico-twitter.png" alt="наш twitter" /></a></p>
            </div>
        	 <a id="pull" href="#">Меню</a>
        </div>    
    </div>
</div>