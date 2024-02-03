<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- seo meta -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $title ?>
    </title>
    <meta name="description" content="Photographies de Kévin LAVENANT, amateur passionné. Réalisation de shootings portraits et paysages. Site web pour exposer mes clichés.">
    <meta name="keywords" content="photographe amateur, portraits, photos paysages, Hauts-de-France, France, passionné de photographie, photographie artistique, images de qualité, photographie en plein air, photographie de portrait, photographie de paysage, Hauts-de-France photographe, passion pour la photographie, talent photographique, photographe passionné, shooting photo, artiste de la photographie, clichés uniques, beauté naturelle, instantanés captivants, scènes françaises, photographe amateur France, passionnément photographie, Hauts-de-France paysages, photographe créatif, paysages français, photographie d'extérieur, séances photos, artiste visuel, photos saisissantes, photographe passionné de la nature, portraits artistiques, beauté française, photographe talentueux, photographie authentique, photographie en plein air France.">
    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- my style -->
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <?php
    /**
     * @todo optimiser avec un tableau (ex. additionnalCss)
     */
    if (isset($portfolioStyle)) { // for portfolio
    ?>
        <link rel="stylesheet" href="/public/assets/css/portfolio.css">
    <?php } ?>
    <?php
    if (isset($paysagesStyle)) { // for paysages portfolio
    ?>
        <link rel="stylesheet" href="/public/assets/css/portfoliopaysages.css">
    <?php } ?>
    <?php
    if (isset($portraitsStyle)) { // for portraits portfolio
    ?>
        <link rel="stylesheet" href="/public/assets/css/portfolioportraits.css">
    <?php } ?>
    <?php
    if (isset($selectionStyle)) { // for selection
    ?>
        <link rel="stylesheet" href="/public/assets/css/selection.css">
    <?php } ?>
    <?php
    if (isset($pagesStyle)) { // for pages
    ?>
        <link rel="stylesheet" href="/public/assets/css/pages.css">
    <?php } ?>
    <?php
    if (isset($contactStyle)) { // for contact
    ?>
        <link rel="stylesheet" href="/public/assets/css/contact.css">
    <?php } ?>
    <?php
    if (isset($accesclientStyle)) { // for acces client
    ?>
        <link rel="stylesheet" href="/public/assets/css/accesclient.css">
    <?php } ?>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap">


</head>

<body>

    <div class="cursor--pages"></div>

    <?php
    if (isset($navbar)) {
    ?>
        <header>
            <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary py-0" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/controllers/home-ctrl.php"><img src="/public/assets/img/logo-kevin-lavenant-photographies-light.png" alt="Logo de Kévin Lavenant, photographe passionné de portraits et paysages"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav text-center">
                            <li class="nav-item dropdown me-0 pe-md-3 pt-md-2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Portfolio
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <li><a class="dropdown-item px-0" href="/controllers/portfoliopaysages-ctrl.php">Paysages</a></li>
                                    <li><a class="dropdown-item px-0" href="/controllers/portfolioportraits-ctrl.php">Portraits</a></li>
                                </ul>
                            </li>
                            <li class="nav-item me-0 pe-md-3 pt-md-2">
                                <a class="nav-link active" aria-current="page" href="/controllers/selection-ctrl.php">Sélection</a>
                            </li>
                            <li class="nav-item me-0 pe-md-3 pt-md-2">
                                <a class="nav-link active" href="/controllers/contact-ctrl.php">Contact</a>
                            </li>
                            <li class="nav-item me-0 pe-md-3 pt-md-2">
                                <a class="nav-link" href="/controllers/accesclient-ctrl.php">Accès client</a>
                            </li>
                            <li class="pt-2 pt-md-3">
                                <a href="https://www.instagram.com/klaven_portraits/" target="_blank"><i class="fa-brands fa-instagram fa-2xl"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <?php
    }
    ?>


    <main>