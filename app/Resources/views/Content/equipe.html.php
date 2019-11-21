<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */
use \Pimcore\Model\DataObject;

$this->extend('layout.html.php');

?>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="row">
    <?php if($this->editmode):
        echo $this->relation('employe');
    else: ?>
   	<?php
    /** @var \Pimcore\Model\DataObject\Employe $employe */
    $employes = new DataObject\Employe\Listing();
    ?>
    <div class="container">
      	<div class="row">
        	<div class="col-lg-12 text-center">
          		<h2 class="section-heading text-uppercase">Notre équipe !</h2>
          		<h3 class="section-subheading text-muted">Voici l'équipe qui a travaillé sur ce projet.</h3>
        	</div>
      	</div>
      	<br>
      	<br>
	    	<?php foreach ($employes as $entry){ ?>
		    	<div id="employe" class="col-sm-4">
			        <h4 align="center"><?= $this->escape($entry->getName()); ?></h4>
			        <p class="text-muted" align="center"><?= $entry->getRole(); ?></p>
			        <p class="text-muted" align="center"><?= $entry->getPoste(); ?></p>
			    	<div class="content" align="center">
				    	<?php
				    	$picture = $entry->getPhotoprofil();
				    	if($picture instanceof \Pimcore\Model\Asset\Image):
				        /** @var \Pimcore\Model\Asset\Image $picture */
				        
				    	?>
				        <?= $picture->getThumbnail("employe")->getHtml(); ?>
					</div>
				</div>	
		
		<?php endif; ?>
			<?php } ?>	
		<?php endif; ?>
	</div>
</div>