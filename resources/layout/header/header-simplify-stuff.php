<?php
/**
 * Uproszczony widok nagłówka dla zespołu
 **/

include 'head.php';
?>
<body class="body-simplify bg-primary-gradient <?= $body_class ?>">

<?php
include 'resources/layout/basket-widget.php';
?>

<header class="simple">
    <div class="navbar">
        <div class="logo text-center">
            <a href="/">
                <h1 class="pt-2">Book Library</h1>
            </a>
        </div>
    </div>
</header>

<div class="container page-content-holder-wide">
    <main>