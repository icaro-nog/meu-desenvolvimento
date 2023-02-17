<?php
$lazy    = 'carousel' !== $feed['layout'] && $feed['lazy'] ? 'loading="lazy"' : '';
$classes = 'carousel' === $feed['layout'] && $feed['lazy'] ? 'swiper-lazy' : '';
?>

<div class="insta-gallery-image-wrap">
	<a class="insta-gallery-link" href="<?php echo esc_url( $item['link'] ); ?>" target="_blank">
		<img <?php echo $lazy; ?> alt="Instagram" class="insta-gallery-image <?php echo esc_attr( $classes ); ?>" src="<?php echo esc_url( $image ); ?>" />
		<?php if ( $feed['mask']['display'] ) : ?>
			<?php include QLIGG_Frontend::template_path( 'item/item-image-mask.php' ); ?>
		<?php endif; ?>
	</a>
	<?php if ( $item['type'] == 'video' || $item['file_type'] == 'video' ) : ?>
		<i class="insta-gallery-icon qligg-icon-video"></i>
	<?php elseif ( 'carousel' === $item['type'] ) : ?>
		<i class="insta-gallery-icon qligg-icon-gallery"></i>
	<?php endif; ?>
	<a class="insta-gallery-icon qligg-icon-instagram" href="<?php echo esc_url( $item['link'] ); ?>" target="_blank"></a>
</div>
