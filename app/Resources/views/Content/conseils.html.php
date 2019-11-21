<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');

?>
<br>
<br>
<br>
<br>
<br>
<h1>Nos conseils !</h1>

	<?php while ($this->block("contentBlock") -> loop()) { ?>
		<h2><?= $this->input("subline"); ?></h2>
			<?= $this->wysiwyg("content"); ?>
	<?php } ?>