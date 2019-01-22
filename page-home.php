<?php // Template Name: Home ?>
<?php get_header(); ?>

<div id="content-area">
	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-12">
					<?php while(have_posts()): the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>