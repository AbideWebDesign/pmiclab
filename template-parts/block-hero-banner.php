<?php $images = get_field('hero_banner_image'); ?>

<?php if ( $images ): ?>

	<?php $x = 0; ?>
	
	<div id="hero-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
		
	  <div class="carousel-inner">
	    
	    <?php foreach( $images as $image ): ?>
	   			
			<div class="carousel-item <?php echo ($x == 0 ? 'active' : ''); ?>">
	      			      		
				<?php echo wp_get_attachment_image( $image['id'], 'hero banner', false, array( 'class' => 'w-100 d-none d-lg-block d-print-none' ) ); ?>
				
				<?php echo wp_get_attachment_image( $image['id'], 'hero banner sm', false, array( 'class' => 'w-100 d-block d-lg-none d-print-none' ) ); ?>				
				
	    	</div>
	    	
	    	<?php $x ++; ?>
	    
	    <?php endforeach; ?>
	  
	  </div>
	
	</div>
	
<?php endif; ?>