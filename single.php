<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pmiclab
 */

get_header();

if ( get_field('table_alignment') == 'Right' ) {
	$table_class = 'table-right';
} elseif ( get_field('table_alignment') == 'Left' ) {
	$table_class = 'table-left';
} else {
	$table_class = 'table-full';
}
?>
<div id="content-area" class="<?php echo $table_class; ?>">
	<div class="container">
		<div id="content">
			<div class="row d-none d-md-block">
				<div class="col-12 mb-2">
				
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9 mb-md-1">
					
					<?php while (have_posts()) : the_post(); ?>
					
						<?php the_content(); ?>
					
					<?php endwhile; ?>
					
				</div>
				<div class="col-lg-3">
					
					<?php get_template_part('template-parts/block', 'sidebar-blog-single'); ?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
