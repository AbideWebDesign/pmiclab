<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmiclab
 */

get_header();

?>

<div id="content-area">
	<div class="container">
		<div class="container-shadow">
			
			<?php if (get_field('hero_banner_image')): ?>
	
				<?php get_template_part('template-parts/block', 'hero-banner'); ?>
			
			<?php endif; ?>
			
			<?php if (get_field('sub_navigation_type')): ?>
			
				<?php get_template_part('template-parts/block', 'sub-navigation'); ?>
			
			<?php endif; ?>
			
			<div id="content">	
				<div class="row d-none d-md-block">
					<div class="col-12 mb-2">
					
						<?php if(function_exists('bcn_display')) bcn_display(); ?>
					
					</div>
				</div>
				<div class="row">
					<div class="col-lg-9">
						
						<?php while (have_posts()) : the_post(); ?>
						
							<?php the_content(); ?>
						
						<?php endwhile; ?>
						
					</div>
					<div class="col-lg-3">
						
						<?php get_template_part('template-parts/block', 'sidebar'); ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	
get_footer();
