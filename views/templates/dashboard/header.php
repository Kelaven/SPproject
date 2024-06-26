<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Kevin Lavenant - <?= $title ?? '' ?>
    </title>
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@5.3.0/dist/lux/bootstrap.min.css">
    <!-- mon style -->
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
</head>

<body>
    <!-- Sidebar -->
        <section>
            <div id="container__sidebar">
                <ul class="sidebar__nav">
                    <li class="sidebar__nav--title pt-3">
                        <a href="/controllers/dashboard/home-ctrl.php">Dashboard</a>
                        <hr class="mb-0 mt-2 py-3">
                    </li>
                    <li>
                        <a href="/controllers/dashboard/galleries/list-ctrl.php" class="sidebar__nav--tabs"><i class="fa-solid fa-people-group pe-2"></i>Galeries</a>
                    </li>
                    <li>
                        <a href="/controllers/dashboard/pictures/list-ctrl.php" class="sidebar__nav--tabs"><i class="fa-solid fa-images pe-2"></i>Photos</a>
                    </li>
                    <li>
                        <a href="/controllers/dashboard/comments/list-ctrl.php" class="sidebar__nav--tabs pe-1"><i class="fa-solid fa-comment-dots pe-2"></i>Commentaires</a>
                    </li>
                    <li>
                        <a href="/controllers/dashboard/users/list-ctrl.php" class="sidebar__nav--tabs"><i class="fa-solid fa-user pe-2"></i>Utilisateurs</a>
                    </li>
                </ul>
                <a class="btn btn-primary btn__home" href="/portfolio-paysages.html">Quitter</a>
            </div>
        </section>