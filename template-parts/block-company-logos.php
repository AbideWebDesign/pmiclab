<?php if ( have_rows('company_logos', 'options') ): ?>

	<?php if ( get_field('company_logos_visible', 'options') || ( !get_field('company_logos_visible', 'options') && is_user_logged_in() ) ): ?>
	
		<div class="border-top mt-2">
			
			<div id="company-logos" class="row my-2">
				
				<div class="col-12">
					
					<h3><?php the_field('company_logos_title', 'options'); ?></h3>
								
					<div id="companies-carousel" class="carousel slide d-none d-md-block">
						
						<div class="carousel-inner justify-content-center">
		
							<?php $slide_count = 0; ?>
							
							<?php $first_row = true; ?>
							
							<?php while ( have_rows('company_logos', 'options') ): the_row(); ?>
														
								<?php if ( $slide_count == 0 ): ?>
								
					    			<div class="carousel-item justify-content-center <?php echo ( $first_row ? 'active' : '' ); ?>">	
						    			
						    		<?php $first_row = false; ?>	
						    			
						    	<?php endif; ?>			
								
									<div class="col-3 align-self-stretch">
									
										<div class="border p-1 h-100 d-flex align-content-center">
											
											<?php if ( get_sub_field('link') ): ?>
											
												<a class="align-self-center" target="_blank" href="<?php the_sub_field('link'); ?>">
													
											<?php else: ?>
											
												<div class="align-self-center">
													
											<?php endif; ?>
											
												<?php echo wp_get_attachment_image( get_sub_field('logo'), 'medium', false, array('class'=>'img-fluid') ); ?>
												
											<?php if ( get_sub_field('link') ): ?>
											
												</a>
											
											<?php else: ?>
											
												</div>
												
											<?php endif; ?>
																			
										</div>
									
									</div>
								
								<?php if ( $slide_count == 3 ): ?>
									
					    			</div>
					    			
					    		<?php endif; ?>	
					    		
					    		<?php $slide_count++; ?>
					    		
					    		<?php if ( $slide_count == 4 ) $slide_count = 0; ?>
					
							<?php endwhile; ?>
							
							<?php if ( $slide_count != 4 && $slide_count != 0 ): ?>
							
								</div>
								
							<?php endif; ?>
							
						</div>
			
						<a class="carousel-control-prev" href="#companies-carousel" role="button" data-slide="prev">
						
							<span class="carousel-control-prev-icon dark" aria-hidden="true"></span>
							
							<span class="sr-only"><?php _e('Previous'); ?></span>
						
						</a>
						
						<a class="carousel-control-next" href="#companies-carousel" role="button" data-slide="next">
							
							<span class="carousel-control-next-icon dark" aria-hidden="true"></span>
							
							<span class="sr-only"><?php _e('Next'); ?></span>
						
						</a>
						
					</div>
					
					<div id="companies-carousel-mobile" class="carousel slide d-md-none">
						
						<div class="carousel-inner justify-content-center">
							
							<?php $first_row = true; ?>
							
							<?php while ( have_rows('company_logos', 'options') ): the_row(); ?>
														
								<div class="carousel-item justify-content-center <?php echo ( $first_row ? 'active' : '' ); ?>">	
						    				
						    		<?php $first_row = false; ?>
						    								
									<div class="border p-1 h-100 d-flex align-content-center">
										
										<?php if ( get_sub_field('link') ): ?>
										
											<a class="align-self-center" target="_blank" href="<?php the_sub_field('link'); ?>">
										
										<?php else: ?>
											
											<div class="align-self-center">
															
										<?php endif; ?>
										
										<?php echo wp_get_attachment_image( get_sub_field('logo'), 'medium', false, array('class'=>'img-fluid') ); ?>
										
										<?php if ( get_sub_field('link') ): ?>
										
											</a>
											
										<?php else: ?>
										
											</div>
											
										<?php endif; ?>
																		
									</div>
									
								</div>
								
							<?php endwhile; ?>
													
						</div>
			
						<a class="carousel-control-prev" href="#companies-carousel-mobile" role="button" data-slide="prev">
						
							<span class="carousel-control-prev-icon dark" aria-hidden="true"></span>
							
							<span class="sr-only"><?php _e('Previous'); ?></span>
						
						</a>
						
						<a class="carousel-control-next" href="#companies-carousel-mobile" role="button" data-slide="next">
							
							<span class="carousel-control-next-icon dark" aria-hidden="true"></span>
							
							<span class="sr-only"><?php _e('Next'); ?></span>
						
						</a>
						
					</div>
					
				</div>
					
			</div>
			
		</div>
		
	<?php endif; ?>	
	
<?php endif; ?>