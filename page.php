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
			
			<?php if ( get_field('hero_banner_image') ): ?>
	
				<?php get_template_part( 'template-parts/block', 'hero-banner' ); ?>
			
			<?php endif; ?>
			
			<?php if ( get_field('sub_navigation_type') ): ?>
			
				<?php get_template_part( 'template-parts/block', 'sub-navigation' ); ?>
			
			<?php endif; ?>
			
			<div id="content">	
				
				<?php if ( !is_front_page() ): ?>
					
					<div class="row d-none d-md-block d-print-none">
						
						<div class="col-12 mb-2 d-print-none">
						
							<?php if ( function_exists('bcn_display') ) bcn_display(); ?>
						
						</div>
						
					</div>
					
				<?php endif; ?>
				
				<div class="row">
					
					<div class="<?php echo ( get_field('include_sidebar' ) ? 'col-lg-9' : 'col-12'); ?>">
						
						<?php while ( have_posts() ) : the_post(); ?>
						
							<?php if ( is_front_page() ): ?>
								
								<?php get_template_part('template-parts/page', 'home'); ?>
								
							<?php else: ?>
							
								<?php the_content(); ?>
							
							<?php endif; ?>
						
						<?php endwhile; ?>
						
						<?php if ( get_field('include_list_group') ): ?>
			
							<?php get_template_part( 'template-parts/block', 'list-group' ); ?>
			
						<?php endif; ?>
						
					</div>
					
					<?php if ( get_field('include_sidebar') ): ?>
					
						<div class="col-lg-3 d-print-none">
							
							<?php get_template_part( 'template-parts/block', 'sidebar' ); ?>
							
						</div>
						
					<?php endif; ?>
					
				</div>
			</div>
			
		</div>
		
	</div>
	
</div>

<?php
	
get_footer();
