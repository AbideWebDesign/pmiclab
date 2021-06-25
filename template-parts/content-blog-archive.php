<div class="blog-list-wrap mb-3 pb-3">

	<div class="row align-items-center">
		
		<?php if (has_post_thumbnail()): ?>
		
			<div class="col-12 col-md-3">
				<div class="mb-1 mb-md-0">
				
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class'=>'img-fluid w-100')); ?></a>
			
				</div>
			</div>
		
		<?php endif; ?>
		
		<div class="<?php echo (has_post_thumbnail() ? 'col-12 col-md-9' : 'col'); ?>">
			<h2 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="mb-1"><?php echo get_the_date(); ?></div>
			
			<?php the_excerpt(); ?>
			
			<div class="mt-2"><a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm text-white">Read More</a></div>
		
		</div>
	</div>

</div>