<div class="wsu-newsletter-image">
	<div class="wsu-newsletter-image__content">
		<div class="wsu-newsletter-image__caption">
			<?php echo wp_kses_post( $attributes['imgCaption'] ); ?>
		</div>
		<div class="wsu-newsletter-image__credit">
			<?php echo wp_kses_post( $attributes['imgCredit'] ); ?>
		</div>
	</div>
	<div class="wsu-newsletter-image__wrapper">
		<img src="<?php echo esc_url( $attributes['imgSrc'] ); ?>" alt="<?php echo esc_attr( $attributes['imgAlt'] ); ?>">
	</div>
</div>
