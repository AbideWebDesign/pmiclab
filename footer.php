<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pmiclab
 */

?>

	<div id="footer" class="bg-secondary py-3 d-print-none">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 d-none d-xl-block order-lg-1">
					<h4 class="text-white mb-1">Our Story</h4>
					<p class="text-sm mb-1 mb-lg-0">PMIC was founded in 1991 in Philomath, Oregon by Dr. Ernest G. Wolff, providing highly accurate thermal expansion measurements using the Michelson laser interferometry. As the importance of understanding thermal expansion characterization of materials became more pronounced, so did the need for PMIC services.  <a class="text-primary" href="<?php echo home_url('/company-information/'); ?>">Learn More</a></p>
				</div>
				
				<div class="col-12 col-md-6 col-lg-4 col-xl-3 order-2 mb-2 mb-md-0">
					<h4 class="text-white mb-1">About Us</h4>
					<?php 
						wp_nav_menu( array( 
							'theme_location' => 'menu-2', 
							'depth' => 2, 
							)
						);
					?>
				</div>
				<div id="footer-contact" class="col-12 col-md-6 col-lg-4 col-xl-3 order-4 order-lg-3">
					<h4 class="text-white mb-1">Contact Us</h4>
					<ul class="list-unstyled m-0">
						<li>3665 SW Deschutes Street<br>Corvallis, OR 97333-9285</li>
						<li><strong>Tel:</strong> (541) 753-0607</li>
						<li><strong>Fax:</strong> (541) 753-0610</li>
						<li><a href="mailto:info@pmiclab.com">info@pmiclab.com</a></li>
					</ul>
				</div>
				<div class="col-12 col-md-12 col-lg-4 col-xl-3 align-self-center text-center order-1 order-lg-4 mb-3 mb-lg-0">
					<a class="btn btn-primary btn-lg" href="https://www.pmiclab.com/inquire/">Request a Quote</a>
				</div>
				
			</div>
		</div>
	</div>
	<div id="footer-bottom" class="bg-blue-dark py-1">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center text-xs">
					Copyright © <?php echo date('Y'); ?> Precision Measurements and Instruments Corporation. <span class="d-print-none"><a href="https://abidewebdesign.com" target="_blank">Website Design by Abide Web Design</a></span>
				</div>
			</div>
		</div>
	</div>
	<script>
		jQuery(function ($) {
			$('td,th,table').removeAttr('style');
			$('td,th,table').removeAttr('width');
			$('table').removeAttr('border');
		});
	</script>
	<?php wp_footer(); ?>
</body>
</html>
