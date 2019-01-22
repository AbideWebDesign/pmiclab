<?php $image = get_field('hero_banner_image'); ?>
<?php echo wp_get_attachment_image($image, 'hero banner', false, array('class'=>'w-100 img-fluid d-none d-lg-block')); ?>
<?php echo wp_get_attachment_image($image, 'hero banner sm', false, array('class'=>'w-100 img-fluid d-block d-lg-none')); ?>