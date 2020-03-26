<?php the_field('lead_text'); ?>

<?php the_field('industries_text'); ?>

<?php if ( have_rows('industries') ): ?>

	<div class="row justify-content-center my-2">
		
		<?php while ( have_rows('industries') ): the_row(); ?>
		
			<div class="col-6 col-md-4 col-lg-3">
				
				<a href="<?php the_sub_field('page_link'); ?>"><?php echo wp_get_attachment_image( get_sub_field('image'), 'Medium', false, array('class'=>'img-fluid') ); ?></a>
				
			</div>
		
		<?php endwhile; ?>
		
	</div>
	
<?php endif; ?>

<?php the_field('services_text'); ?>

<?php if ( have_rows('services') ): ?>

	<div id="home-services" class="row my-2">
		
		<?php while ( have_rows('services') ): the_row(); ?>
					
			<div class="col-sm-6 col-xl-4 mb-1">

				<a href="<?php the_sub_field('page'); ?>"><i class="fa fa-chevron-right fa-xs"></i> <?php the_sub_field('title'); ?></a>
				
			</div>
		
		<?php endwhile; ?>
		
	</div>
	
<?php endif; ?>

<div class="border-top pt-2 text-sm">
	
	<?php the_field('footer_text'); ?>
	
</div>