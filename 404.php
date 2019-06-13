<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package pmiclab
 */

get_header();
?>

<div class="py-4 bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8 bg-white py-3">
				<div class="text-center">
					<h1 class="mb-2"><?php the_field('404_title', 'options'); ?></h1>
					<div class="lead"><?php the_field('404_text', 'options'); ?></div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
