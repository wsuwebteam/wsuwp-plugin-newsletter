<?php namespace WSUWP\Plugin\Newsletter; 
?>
<h1>Newsletter Settings</h1>
<?php if ( ! empty( $_REQUEST['newsletter_save'] ) ) : ?>
	<div class="wsu-plugin-newsletter__notice notice inline">
		Updates Saved
	</div>
<?php endif; ?>
<form class="wsu-plugin-newsletter__settings" method="post">
	<h2>Required Email Templates</h2>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>Before Content (HTML)</label>
			<textarea name="template_before"><?php echo Newsletter_Post_Type::get_option( 'template_before', '', 'decode' ); ?></textarea>
		</div>
		<div class="wsu-plugin-newsletter__setting">
			<label>After Content (HTML)</label>
			<textarea name="template_after"><?php echo Newsletter_Post_Type::get_option( 'template_after', '', 'decode' ); ?></textarea>
		</div>
		<div>Supported Merge Tags: [[post-title]] [[publish-date]] [[url]]</div>
	</fieldset>
	<button type="submit" class="button-primary" name="newsletter_save" value="update">Save</button>
	<hr />
	<h2>Optional HTML Tag Styles</h2>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>A Tag Styles</label>
			<input type="text" name="template_a_styles" value="<?php echo Newsletter_Post_Type::get_option( 'template_a_styles', '', 'decode' ); ?>" />
			<div>default: text-decoration: underline; color: #a60f2d;</div>
		</div>
	</fieldset>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>P Tag Styles</label>
			<input type="text" name="template_p_styles" value="<?php echo Newsletter_Post_Type::get_option( 'template_p_styles', '', 'decode' ); ?>" />
			<div>default: font-size: 16px; line-height: 24px; font-weight: 400; padding: 0; margin-bottom: 24px;</div>
		</div>
	</fieldset>
	<h2>Optional Email Templates</h2>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>Newsletter Date Component (HTML)</label>
			<textarea name="template_date"><?php echo Newsletter_Post_Type::get_option( 'template_date', '', 'decode' ); ?></textarea>
			<div>Supported Merge Tags: [[date]]</div>
		</div>
	</fieldset>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>Newsletter Text/Content Section Component (HTML)</label>
			<textarea name="template_content"><?php echo Newsletter_Post_Type::get_option( 'template_content', '', 'decode' ); ?></textarea>
			<div>Supported Merge Tags: [[content]]</div>
		</div>
	</fieldset>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>Newsletter Image Component (HTML)</label>
			<textarea name="template_image"><?php echo Newsletter_Post_Type::get_option( 'template_image', '', 'decode' ); ?></textarea>
			<div>Supported Merge Tags: [[img_src]] [[img_alt]] [[img_caption]] [[img_credit]]</div>
		</div>
	</fieldset>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>Newsletter Heading Component (HTML)</label>
			<textarea name="template_heading"><?php echo Newsletter_Post_Type::get_option( 'template_heading', '', 'decode' ); ?></textarea>
			<div>Supported Merge Tags: [[heading]] [[level]]</div>
		</div>
	</fieldset>
	<fieldset>
		<div class="wsu-plugin-newsletter__setting">
			<label>Newsletter Item Component (HTML)</label>
			<textarea name="template_item"><?php echo Newsletter_Post_Type::get_option( 'template_item', '', 'decode' ); ?></textarea>
			<div>Supported Merge Tags: [[link_start]] [[title]] [[link_end]] [[content]]</div>
		</div>
	</fieldset>
	<button type="submit" class="button-primary" name="newsletter_save" value="update">Save</button>
</form>

<style>
	.wsu-plugin-newsletter__notice {
		display: inline-block;
		padding: 1rem 2rem;
		color: #26870e;
		border-left-color: #26870e !important;
		font-weight: 600;
	}
	.wsu-plugin-newsletter__settings{
		margin-top: 2rem;
	}

	.wsu-plugin-newsletter__settings label {
		font-weight: 600;
		font-size: 1rem;
		display: block;
	}

	.wsu-plugin-newsletter__settings fieldset {
		margin-bottom: 1.5rem;
	}

	.wsu-plugin-newsletter__settings hr {
		margin: 2rem 0 2rem;
	}

	.wsu-plugin-newsletter__settings button {
		padding: 0.5rem 2rem !important;
		font-size: 1rem !important;
		font-weight: 600 !important;
	}

	.wsu-plugin-newsletter__settings textarea {
		width: 95%;
		height: 300px;
	}

	.wsu-plugin-newsletter__settings h2 {
		font-size: 1.3rem;
		font-weight: 600;
	}
	.wsu-plugin-newsletter__setting {
		margin-bottom: 1.5rem;
	}
</style>
