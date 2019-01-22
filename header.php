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
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script type="text/javascript">
		jQuery(function ($) {
// 			$('body').scrollspy({ target: '#nav-main' })

			// Override Bootstrap dropdown behavior
			$('#menu-primary .dropdown > a').click(function() {
				location.href = $(this).attr('href');
			});
			
			function toggleDropdown (e) {
				let _d = $(e.target).closest('.dropdown'),
				 _m = $('.dropdown-menu', _d);
				
				setTimeout(function(){
					let shouldOpen = e.type !== 'click' && _d.is(':hover');
					_m.toggleClass('show', shouldOpen);
					_d.toggleClass('show', shouldOpen);
					$('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
				}, e.type === 'mouseleave' ? 50 : 0);
			}

			$('body')
				.on('mouseenter mouseleave','.dropdown',toggleDropdown)
				.on('click', '.dropdown-menu a', toggleDropdown);
			
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
			<div class="row align-items-center">
				<div class="col-12 col-md-4 col-lg-6 text-center text-lg-left mb-1 mb-md-0 align-self-center">
					<a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image('210', 'full', false, array("class" => "img-fluid")); ?></a>
				</div>
				<div class="col-12 col-md-8 col-lg-6">
					<div class="row">
						<div class="col-12 d-none d-lg-block">
							<div id="header-sub">PRECISION MEASUREMENTS AND INSTRUMENTS CORPORATION</div>
						</div>
					</div>
					<div class="row justify-content-center">
						<div class="col-md-2 align-self-center d-none d-md-block">
							<?php echo wp_get_attachment_image('217', 'full', false, array("class" => "img-fluid")); ?>
						</div>
						<div class="col-12 col-md-10 align-self-center">
							<div id="header-text">3665 SW Deschutes Street • Corvallis, Oregon 97333-9285 • Ph: (541) 753-0607 • Fax: (541) 753-0610</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="nav-main" data-toggle="sticky-onscroll">
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-dark">	
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-primary" aria-controls="menu-primary" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span> <span class="d-inline-block align-middle">Menu</span>
				</button>
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