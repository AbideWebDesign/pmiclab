<?php if(get_field('featured_news')): ?>
	
	<?php $post_id = get_field('featured_news'); ?>
	
	<div class="featured_news bg-blue d-none d-lg-block">
		<a href="<?php the_permalink($post_id); ?>"><?php echo get_the_post_thumbnail($post_id, 'col-3', array('class'=>'img-fluid w-100'))?></a>
		<div class="p-1">
			<h3 class="mb-1 text-white"><a href="<?php the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h3>
			<div class="featured_news_text"><?php echo get_the_excerpt($post_id); ?></div>
		</div>
	</div>
	
	<?php $img_id = get_post_thumbnail_id($post_id); ?>
	
	<?php $img_src = wp_get_attachment_image_src($img_id, 'col-3'); ?>
	
	<div class="row d-lg-none d-xl-none no-gutters">
		
		<div class="col-md-3 align-self-stretch d-none d-md-block" style="background-size: cover; background-position: center center; background: url(<?php echo $img_src[0]; ?>)">
			<a href="<?php the_permalink($post_id); ?>" class="d-block h-100 w-100"></a>
		</div>
		<div class="col-md-9 bg-blue featured_news	p-1">
			<h3 class="mb-1 text-white"><a href="<?php the_permalink($post_id); ?>"><?php echo get_the_title($post_id); ?></a></h3>
			<div class="featured_news_text"><?php echo get_the_excerpt($post_id); ?></div>
		</div>
	</div>
	
<?php endif; ?>

<?php if (get_field('additional_news')): ?>

	<?php $cat = get_field('additional_news'); ?>
	
	<?php $args = array("post_type" => 'post', 'category_name' => $cat->name, 'posts_per_page' => 4); ?>
	
	<?php $query = new WP_Query($args); ?>
	
	<?php if ($query->have_posts()): ?>

		<div class="additional_news mt-2">
			<div class="text-white text-lg">Additional News</div>
			<ul class="list-unstyled">
				
				<?php while($query->have_posts()): $query->the_post(); ?>
				
					<?php if(get_the_ID() != $post_id): ?>
					
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					
					<?php endif; ?>
				
				<?php endwhile; ?>
				
			</ul>
		</div>
		
	<?php endif; ?>

<?php endif; ?>

<?php if ( is_page(193) ): ?>

	<a href="https://pmiclab.com/gift-card-promotion/"><img src="<?php echo home_url('/wp-content/themes/pmiclab/assets/img/atom.jpg'); ?>" class="img-fluid" /></a>

<?php endif; ?>