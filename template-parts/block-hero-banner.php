
<?php $images = get_field('hero_banner_image'); ?>

<?php if ( $images ): ?>

	<?php $x = 0; ?>
	
	<div id="hero-carousel" class="carousel slide" data-ride="carousel" data-interval="4000">
		
	  <div class="carousel-inner">
	    
	    <?php foreach( $images as $image ): ?>
	   			
			<div class="carousel-item <?php echo ($x == 0 ? 'active' : ''); ?>">
	      		
				<img class="w-100 d-none d-lg-block d-print-none" src="<?php echo esc_url( $image['sizes']['hero banner'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
				
				<img class="w-100 d-block d-lg-none d-print-none" src="<?php echo esc_url( $image['sizes']['hero banner sm'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />

	    	</div>
	    	
	    	<?php $x ++; ?>
	    
	    <?php endforeach; ?>
	  
	  </div>
	
	</div>
	
<?php endif; ?>