<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<div class="wrapper">

		<?php if (isset($template['partials']['header'])) echo $template['partials']['header']; ?>
		<?php if (isset($template['partials']['aside'])) echo $template['partials']['aside']; ?>	

		<div class="content-wrapper">

		 	<?php if (isset($template['partials']['notify'])) echo $template['partials']['notify']; ?>
		 	<?php if (isset($template['partials']['container'])) echo $template['partials']['container']; ?>

		</div>

		<?php if (isset($template['partials']['footer'])) echo $template['partials']['footer']; ?>

	</div>
	
	<script type="text/javascript">

	</script>