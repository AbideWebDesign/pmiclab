<?php the_content(); ?>

<?php if ( have_rows('industries') ): ?>

	<div class="row justify-content-center my-2">
		
		<?php while ( have_rows('industries') ): the_row(); ?>
		
			<div class="col-6 col-md-4 col-lg-3">
				
				<a href="<?php the_sub_field('page_link'); ?>"><?php echo wp_get_attachment_image( get_sub_field('image'), 'medium', false, array('class'=>'img-fluid') ); ?></a>
				
			</div>
		
		<?php endwhile; ?>
		
	</div>
	
<?php endif; ?>

<div class="border-top pt-2 text-sm">
	
	<?php the_field('footer_text'); ?>
	
</div>