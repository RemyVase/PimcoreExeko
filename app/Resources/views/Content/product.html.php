<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');

?>

<h1><?= $this->input("headline", ["width" => 540]); ?></h1>

<div class="product-info">
    <?php if($this->editmode):
        echo $this->relation('product');
    else: ?>
    <div id="product">
        <?php
        /** @var \Pimcore\Model\DataObject\Product $product */
        $product = $this->relation('product')->getElement();
        ?>
        <h2><?= $this->escape($product->getName()); ?></h2>
        <div class="content">
            <?= $product->getDescription(); ?>
        </div>
    </div>
    
    <div class="content">
    <?php
    $picture = $product->getPicture();
    if($picture instanceof \Pimcore\Model\Asset\Image):
        /** @var \Pimcore\Model\Asset\Image $picture */
        
    ?>
        <?= $picture->getThumbnail("content")->getHtml(); ?>
    <?php endif; ?>
    <?php endif; ?>
</div>
</div>