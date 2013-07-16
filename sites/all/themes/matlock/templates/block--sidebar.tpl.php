<aside id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<?php print render($title_prefix); ?>
	<?php if ($title) { ?>
	<h3<?php print $title_attributes; ?>><?php print $title; ?></h3>
	<?php } ?>
	<?php print render($title_suffix); ?>
	
	<?php print $content; ?>
</aside> <!-- /.block -->