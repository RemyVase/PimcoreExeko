<?php
/**
 * @var \Pimcore\Templating\PhpEngine $this
 * @var \Pimcore\Templating\PhpEngine $view
 * @var \Pimcore\Templating\GlobalVariables $app
 */

$this->extend('layout.html.php');

?>
<?php
// get root node if there is no document defined (for pages which are routed directly through static route)
$document = $this->document; 
if(!$document instanceof \Pimcore\Model\Document\Page) {
    $document = \Pimcore\Model\Document\Page::getById(1);
}

// get the document which should be used to start in navigation | default home
$mainNavStartNode = $this->document->getProperty("navigationRoot");
if(!$mainNavStartNode instanceof \Pimcore\Model\Document\Page) {
    $mainNavStartNode = \Pimcore\Model\Document\Page::getById(1);
}

// this returns us the navigation container we can use to render the navigation
$mainNavigation = $this->navigation()->buildNavigation($document, $mainNavStartNode);

// later you can render the navigation
echo $this->navigation()->render($mainNavigation);
?>

<div class="my-menu">
    <?php
    // $this->navigation()->menu() is a shortcut to $this->navigation()->getRenderer('menu')
    echo $this->navigation()->menu()->renderMenu($mainNavigation, [
        'maxDepth' => 1,
        'ulClass'  => 'nav navbar-nav'
    ]);
    ?>

    <?php
    // alternatively, you can use the render function to use the given renderer and render method
    $this->navigation()->render($mainNavigation, 'menu', 'renderMenu', [
        'maxDepth' => 1,
        'ulClass'  => 'nav navbar-nav'
    ]); ?>
</div>