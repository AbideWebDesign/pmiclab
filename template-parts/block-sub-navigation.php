<?php 
	$page_ids = array();

	if (get_field('sub_navigation_type') == 'Custom') {

		if (have_rows('sub_navigation_pages')) {
						
			while (have_rows('sub_navigation_pages')) {
				
				the_row();

				$page_ids[] = array('id' => get_sub_field('page'), 'label' => get_sub_field('navigation_label'));
				
			}
		}
		
	} else {
		
		$page_objects = get_page_links($post->ID);
		
		foreach ($page_objects as $page) {
			
			$page_ids[] = array('id' => $page->ID, 'label' => get_the_title($page->ID));
			
		}
		
	}
?>

<div id="subnav" class="bg-light d-none d-lg-block">
	<div class="container">

		<?php if ($page_ids): ?>

			<div class="row">
				<div class="col-12">
					<ul class="d-inline-block list-inline mb-0">
				
						<?php foreach($page_ids as $page): ?>
						
							<li class="list-inline-item <?php echo ($page['id'] == $post->ID ? 'active' : ''); ?>">
								<a href="<?php echo get_the_permalink($page['id']); ?>"><?php echo $page['label']; ?></a>
							</li>
				
						<?php endforeach; ?>
				
					</ul>
				</div>
			</div>
					
		<?php endif; ?>
			
	</div>
</div>


