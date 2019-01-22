<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package pmiclab
 */

get_header();
?>

<div id="content-area">
	<div class="container">
		<div id="content">
			<div class="row d-none d-md-block">
				<div class="col-12 mb-2">
				
					<?php if(function_exists('bcn_display')) bcn_display(); ?>
				
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9">
					<div class="bg-light p-1 mb-2">
						<h3 class="mb-0">News Articles</h3>
					</div>
					<?php
					if ( have_posts() ) :
					
						/* Start the Loop */
						while ( have_posts() ) :
							
							the_post();
					
							get_template_part('template-parts/content', 'blog-archive');
							
					
						endwhile;
						show_pagination_links();
					endif;
					?>
					
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
