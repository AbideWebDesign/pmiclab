<?php $current_post = $post->ID; ?>

<?php $args = array("post_type" => 'post', 'posts_per_page' => 5); ?>

<?php $query = new WP_Query($args); ?>

<?php if ($query->have_posts()): ?>

	<div class="additional_news">
		<div class="text-white text-lg">Additional News</div>
		<ul class="list-unstyled">
			
			<?php while($query->have_posts()): $query->the_post(); ?>
			
				<?php if(get_the_ID() != $current_post): ?>
				
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				
				<?php endif; ?>
			
			<?php endwhile; ?>
			
		</ul>
	</div>
	
<?php endif; ?>

