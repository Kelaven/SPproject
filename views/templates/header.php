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
    foreach ($styles as $style) {
        echo '<link rel="stylesheet" href="/public/assets/css/' . $style . '">';
    }
    ?>


    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap">


</head>

<body>
    <?php
    if (!isset($dNoneBall)) {
    ?>
        <div class="cursor--pages"></div>
    <?php } ?>
    <!-- <div class="cursor--pages"></div> -->

    <?php
    if (isset($navbar)) {
    ?>
        <header>
            <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
                <div class="container-fluid">
                    <a class="navbar-brand pe-2" href="/controllers/home-ctrl.php"><img src="/public/assets/img/logo-kevin-lavenant-photographies-light.png" alt="Logo de Kévin Lavenant, photographe passionné de portraits et paysages"></a>
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
                                <a class="nav-link" href="/controllers/accesclient-ctrl.php">Galeries</a>
                            </li>
                            <li class="pt-2 pt-md-3">
                                <a id="logo__insta--link" href="https://www.instagram.com/klaven_portraits/" target="_blank"><i id="logo__insta" class="fa-brands fa-instagram fa-2xl pe-5"></i></a>
                            </li>
                            <li class="d-block d-lg-none">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa-solid fa-user p-0 pe-1"></i> Mon espace
                                </a>
                                <ul class="dropdown-menu text-center">
                                    <?php if (empty($_SESSION['user'])) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-item" href="/controllers/signIn-ctrl.php">Se connecter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-item" href="/controllers/signUp-ctrl.php">S'inscrire</a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user']) && ($_SESSION['user']->isAdministrator === 1)) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-item" href="/controllers/dashboard/home-ctrl.php">Dashboard</a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-item" href="/controllers/profile-ctrl.php">Mon compte</a>
                                        </li>
                                    <?php } ?>
                                    <?php if (!empty($_SESSION['user'])) { ?>
                                        <li class="nav-item">
                                            <a class="nav-link dropdown-item" href="/controllers/signOut-ctrl.php">Se déconnecter</a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="dropdown pe-2 d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user p-0 pe-1"></i> Mon espace
                        </a>
                        <ul class="dropdown-menu text-center">
                            <?php if (empty($_SESSION['user'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-item" href="/controllers/signIn-ctrl.php">Se connecter</a>
                                </li>
                                <li class="nav-item  pt-md-2">
                                    <a class="nav-link dropdown-item" href="/controllers/signUp-ctrl.php">S'inscrire</a>
                                </li>
                            <?php } ?>
                            <?php if (!empty($_SESSION['user']) && ($_SESSION['user']->isAdministrator === 1)) { ?>
                                <li class="nav-item">
                                    <a class="nav-link dropdown-item" href="/controllers/dashboard/home-ctrl.php">Dashboard</a>
                                </li>
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) { ?>
                                <li class="nav-item pt-md-2">
                                    <a class="nav-link dropdown-item" href="/controllers/profile-ctrl.php">Mon compte</a>
                                </li>
                            <?php } ?>
                            <?php if (!empty($_SESSION['user'])) { ?>
                                <li class="nav-item pt-md-2">
                                    <a class="nav-link dropdown-item" href="/controllers/signOut-ctrl.php">Se déconnecter</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    <?php
    }
    ?>


    <main>