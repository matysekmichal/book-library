<?php
/**
 * Uproszczony widok nagłówka
 **/

include 'head.php';
?>
<body class="body-simplify bg-primary-gradient <?= $body_class ?>">

<?php
include 'resources/layout/basket-widget.php';
?>

<header class="simple">
    <div class="navbar">
        <div class="container">
            <div class="logo">
                <a href="/">
                    <h1>Book Library</h1>
                </a>
            </div>

            <?php if (stringContains(getUrl(), 'login')) { ?>
                <a href="/register" class="btn btn-sm btn-secondary">Rejestracja</a>
            <?php } else { ?>
                <a href="/login" class="btn btn-sm btn-secondary">Logowanie</a>
            <?php } ?>
        </div>
    </div>
</header>

<div class="container page-content-holder-wide">
    <main>