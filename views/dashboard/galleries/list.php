<section class="pe-5">
    <div class="container pb-4" id="container__creatList">
        <div class="row">
            <div class="col pt-5 pe-5">
                <!-- bouton de redirection pour ajouter une galerie -->
                <a href="/controllers/dashboard/galleries/add-ctrl.php" class="btn btn-dark form__btn me-2">
                    <i class="fa-solid fa-plus pe-3"></i>Ajouter une galerie
                </a>
                <!-- bouton archives -->
                <a href="/controllers/dashboard/galleries/archive-ctrl.php" class="btn btn-dark form__btn">
                    <i class="fa-solid fa-box pe-3"></i></i>Accèder aux archives
                </a>
            </div>
        </div>
    </div>
    <div class="container p-5 pt-0" id="container__readList">
        <div class="row">
            <div class="col">
                <!-- carte contenant les infos -->
                <div class="card bg-dark mb-3 card__list--galleries">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Liste des galeries</h1>
                    </div>
                    <div class="card-body p-5 pt-3">
                    <div class="dashboard__search--container pb-2">
                            <div class="dashboard__search--offContainer">
                                <form>
                                    <label for="search" class="form-label">Recherche par mots clés :</label>
                                    <div class="dashboard__search--labelInput">
                                        <input id="search" name="search" class="form-control" type="search" placeholder="Nom galerie">
                                        <button class="btn btn-dark my-2 my-sm-0 d-flex justify-content-center" type="submit">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                    <small class="fst-italic"><a href="/controllers/dashboard/galleries/list-ctrl.php" class="dashboard__small--search">Afficher toutes les galeries</a></small>
                                </form>
                            </div>
                        </div>
                        <p class="text-info">
                            <?= $msg ?? '' ?>
                        </p>
                        <table>
                            <tr>
                                <th class="pe-3">Id :</th>
                                <th>Nom :</th>
                                <th>Date séance :</th>
                                <th>Image :</th>
                                <th>Passe d'accès :</th>
                                <th class="pe-4"></th> <!-- modifier -->
                                <th></th> <!-- archiver -->
                            </tr>
                            <?php
                            foreach ($galleries as $gallery) {
                                // dd($gallery);
                            ?>
                                <tr>
                                    <td><?= $gallery->id_gallery ?></td>
                                    <td><?= $gallery->name ?></td>
                                    <td><?= date('m-Y', strtotime($gallery->date)) ?></td>
                                    <td> <?php if (!empty($gallery->gallery_photo) && $gallery->gallery_isCover == 1) { ?>
                                            <img class="dashboard__imgRsz" src="/public/assets/img/ftp/<?= $gallery->gallery_photo ?>" alt="Photo de couverture de la galerie">
                                            <button type="button" class="btn btn-link ps-0 pe-3" data-bs-toggle="modal" data-bs-target="#zoomGallery<?= $gallery->id_gallery ?>"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                        <?php } ?>
                                    </td>
                                    <td><?= $gallery->password ?></td>
                                    <td>
                                        <a href="/controllers/dashboard/galleries/update-ctrl.php?id_gallery=<?= $gallery->id_gallery ?>" data-bs-toggle="tooltip" data-bs-title="Modifier"><i class="fa__tooltip fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="text-end">
                                        <a href="/controllers/dashboard/galleries/archive-ctrl.php?id_gallery=<?= $gallery->id_gallery ?>" data-bs-toggle="tooltip" data-bs-title="Archiver"><i class="fa__tooltip fa-solid fa-box"></i></a>
                                    </td>
                                </tr>
                                <!-- modal -->
                                <div class="modal fade" id="zoomGallery<?= $gallery->id_gallery ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5"><?= $gallery->name ?></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="/public/assets/img/ftp/<?= $gallery->gallery_photo ?>">
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
</section>