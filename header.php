<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmiclab
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no"/>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-31523093-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-31523093-1');
	</script>


	<?php wp_head(); ?>
	<script type="text/javascript">
		jQuery(function ($) {
			
			
			// Sticky navbar
			// =========================

            // Custom function which toggles between sticky class (is-sticky)
            var stickyToggle = function (sticky, stickyWrapper, scrollElement) {
                var stickyHeight = sticky.outerHeight();
                var stickyTop = stickyWrapper.offset().top;
                if (scrollElement.scrollTop() >= stickyTop) {
                    stickyWrapper.height(stickyHeight);
                    sticky.addClass("is-sticky");
                }
                else {
                    sticky.removeClass("is-sticky");
                    stickyWrapper.height('auto');
                }
            };

            // Find all data-toggle="sticky-onscroll" elements
            $('[data-toggle="sticky-onscroll"]').each(function () {
                var sticky = $(this);
                var stickyWrapper = $('<div>').addClass('sticky-wrapper'); // insert hidden element to maintain actual top offset on page
                sticky.before(stickyWrapper);
                sticky.addClass('sticky');

                // Scroll & resize events
                $(window).on('scroll.sticky-onscroll resize.sticky-onscroll', function () {
                    stickyToggle(sticky, stickyWrapper, $(this));
                });

                // On page load
                stickyToggle(sticky, stickyWrapper, $(window));
            });
		});
	</script>

</head>

<body <?php body_class(); ?>>
	<div id="header" class="py-1">
		<div class="container">
			<div class="row justify-content-center justify-content-md-between align-items-center">
				<div id="col-logo" class="col-7 col-sm-4 col-md-4 col-lg-6 text-center text-lg-left align-self-center">
					<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image('210', 'full', false, array("class" => "img-fluid", "style" => "width: 250px")); ?></a>
				</div>
				<div class="col-3 col-sm-8 col-md-8 col-lg-6 d-print-none">
					<div class="row">
						<div class="col-12 col-md-10 text-right d-none d-sm-block ">
							<div id="header-sub" class="d-none d-md-block">PRECISION TODAY for TOMORROW’S PRODUCTS</div>
							<div id="header-text">3665 SW Deschutes Street<br>Corvallis, Oregon 97333-9285<br>Tel: <a class="link" href="tel:5417530607">(541) 753-0607</a><br>Fax: (541) 753-0610<br><a href="mailto:info@pmiclab.com">info@pmiclab.com</a></div>
						</div>
						<div class="col-md-2 align-self-center">
							<a href="https://www.iasonline.org/ias_certificate/tl-388/" target="_blank"><img src="<?php echo home_url('/wp-content/themes/pmiclab/assets/img/logo-ias.jpg'); ?>" class="img-fluid" /></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="nav-main" class="d-print-none" data-toggle="sticky-onscroll">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">	
				<?php 
					wp_nav_menu( array( 
						'theme_location' => 'menu-1', 
					     'container'       => 'div',
					     'container_id'    => 'menu-primary',
					     'container_class' => 'collapse navbar-collapse',
					     'menu_id'         => false,
					     'menu_class'      => 'navbar-nav',
					     'depth'           => 2,
					     'fallback_cb'     => 'bs4navwalker::fallback',
					     'walker'          => new bs4navwalker()
						)
					);
				?>
			</nav>
		</div>
	</div>