<div class="wsu-newsletter-item">
	<h3 class="wsu-newsletter-item__title">
		<?php if ( ! empty( $attributes['link'] ) ) : ?><a href="<?php echo esc_url( $attributes['link'] ); ?>"><?php endif; ?>
			<?php echo wp_kses_post( $attributes['title'] ); ?>
		<?php if ( ! empty( $attributes['link'] ) ) : ?></a><?php endif; ?>
	</h3>
	<?php if ( ! empty( $content ) ) : ?><div class="wsu-newsletter-item__caption">
		<?php echo $content; ?>
	</div><?php endif; ?>
</div>