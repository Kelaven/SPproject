<section class="pe-5">
    <div class="container-fluid pb-4" id="container__creatList">
        <div class="row">
            <div class="col pt-5 pe-5 dashboard__colBtns--pictures">
                <a href="/controllers/dashboard/pictures/add-ctrl.php" class="btn btn-dark form__btn me-2">
                    <i class="fa-solid fa-plus pe-3"></i>Ajouter une photo
                </a>
                <a href="/controllers/dashboard/pictures/archive-ctrl.php" class="btn btn-dark form__btn">
                    <i class="fa-solid fa-box pe-3"></i></i>Accèder aux archives
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-0" id="container__readList">
        <div class="row">
            <div class="col">
                <div class="card bg-dark mb-3 card__list--pictures">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Liste des photos</h1>
                    </div>
                    <div class="card-body p-5 pt-3">
                        <div class="dashboard__search--container">
                            <div class="dashboard__search--offContainer">
                                <form>
                                    <label for="search" class="form-label">Recherche par mots clés :</label>
                                    <div class="dashboard__search--labelInput">
                                        <input id="search" name="search" class="form-control" type="search" placeholder="Nom, Galerie">
                                        <button class="btn btn-dark my-2 my-sm-0 d-flex justify-content-center" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                    <small class="fst-italic"><a href="/controllers/dashboard/pictures/list-ctrl.php" class="dashboard__small--search">Afficher toutes les photos</a></small>
                                </form>
                            </div>
                        </div>
                        <p class="text-info">
                            <?= $msg ?? '' ?>
                        </p>
                        <table>
                            <tr>
                                <!-- <th>Id :</th> -->
                                <th>Photo :</th>
                                <th>Nom :</th>
                                <th>Description :</th>
                                <th class="pe-5">Couv :</th>
                                <th class="pe-3">Galerie :</th>
                                <th class="pe-5"></th> <!-- modifier -->
                                <th></th> <!-- archiver -->
                            </tr>
                            <?php
                            foreach ($pictures as $picture) {
                                // dd($picture);
                            ?>
                                <tr>
                                    <!-- <td class="pe-4"><?= $picture->id_picture ?></td> -->
                                    <td class="pe-4">
                                        <img class="dashboard__imgRsz" src="/public/assets/img/uploads/<?= $picture->photo ?>">
                                        <button type="button" class="btn btn-link ps-0 pe-3" data-bs-toggle="modal" data-bs-target="#zoom<?= $picture->id_picture ?>"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                    </td>
                                    <td class="pe-4"><?= $picture->name ?></td>
                                    <td class="pe-2 listPictures__capitalize"><?php
                                        if (($picture->description != null) && (strlen($picture->description) >= 25)) {
                                            echo (substr($picture->description, 0, 25) . "..."); ?> <button type="button" class="btn btn-link dashboard__descriptionDtls p-0 pe-5" data-bs-toggle="modal" data-bs-target="#voirplus<?= $picture->id_picture ?>">[voir +]</button> <?php
                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                echo ($picture->description);
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                ?></td>
                                    <!-- ? <td><?= $picture->picture_like ?></td> -->
                                    <!-- <td class="pe-4"><?= $picture->isCover ?><i class="fa-solid fa-money-bill-transfer ps-3"></i></td> -->
                                    <td class="pe-4">
                                    <?= $picture->isCover ?>
                                        <a href="/controllers/dashboard/pictures/list-ctrl.php?id_pictureCover=<?= $picture->id_picture ?>" data-bs-toggle="tooltip" data-bs-title="Oui"><i class="fa-solid fa-square-plus ps-1"></i></a>
                                        <a href="/controllers/dashboard/pictures/list-ctrl.php?id_pictureUncover=<?= $picture->id_picture ?>" data-bs-toggle="tooltip" data-bs-title="Non"><i class="fa-solid fa-eraser"></i></a>
                                    </td>
                                    <td class="pe-4 listPictures__capitalize"><?= $picture->gallery_name ?></td>
                                    <td>
                                        <a href="/controllers/dashboard/pictures/update-ctrl.php?id_picture=<?= $picture->id_picture ?>" data-bs-toggle="tooltip" data-bs-title="Modifier"><i class="fa__tooltip fa-solid fa-pen-to-square pe-3"></i></a>
                                    </td>
                                    <td class="text-end">
                                        <a href="/controllers/dashboard/pictures/archive-ctrl.php?id_picture=<?= $picture->id_picture ?>" data-bs-toggle="tooltip" data-bs-title="Archiver"><i class="fa__tooltip fa-solid fa-box"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="voirplus<?= $picture->id_picture ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5"><?= $picture->name ?></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $picture->description ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="zoom<?= $picture->id_picture ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5"><?= $picture->name ?></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img class="pictureList__modalImg" src="/public/assets/img/uploads/<?= $picture->photo ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </table>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-1">
        <div class="row">
            <div class="col">
                <div class="d-flex justify-content-center">
                    <ul class="pagination pt-xxl-2">
                        <li class="page-item <?php if ($page == 1) { ?>
                            disabled
                        <?php } ?>">
                            <a class="page-link" href="/controllers/dashboard/pictures/list-ctrl.php?page=<?= $page - 1 ?>">&laquo;</a>
                        </li>
                        <?php
                        for ($p = 1; $p <= $nbePages; $p++) { ?>
                            <li class="page-item <?php if ($p == $page) { ?> active <?php } ?>">
                                <a class="page-link" href="/controllers/dashboard/pictures/list-ctrl.php?page=<?= $p ?>"><?= $p ?></a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="page-item <?php if ($page == $nbePages) { ?>
                            disabled
                        <?php } ?>">
                            <a class="page-link" href="/controllers/dashboard/pictures/list-ctrl.php?page=<?= $page + 1 ?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>