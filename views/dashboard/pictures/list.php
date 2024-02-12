<section class="pe-5">
    <div class="container pb-4" id="container__creatList">
        <div class="row">
            <div class="col pt-5 pe-5">
                <a href="/controllers/dashboard/pictures/add-ctrl.php" class="btn btn-dark form__btn me-2">
                    <i class="fa-solid fa-plus pe-3"></i>Ajouter une photo
                </a>
                <a href="#" class="btn btn-dark form__btn">
                    <i class="fa-solid fa-box pe-3"></i></i>Accèder aux archives
                </a>
            </div>
        </div>
    </div>
    <div class="container p-5 pt-0" id="container__readList">
        <div class="row">
            <div class="col">
                <div class="card bg-dark mb-3 card__list--galleries">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Liste des photos</h1>
                    </div>
                    <div class="card-body p-5 pt-3">
                        <p class="text-info">
                            <?= $msg ?? '' ?>
                        </p>
                        <table>
                            <tr>
                                <th>Id :</th>
                                <th>Photo :</th>
                                <th>Nom :</th>
                                <th>Description :</th>
                                <!-- ? <th class="pe-5">Like :</th> -->
                                <th></th> <!-- modifier -->
                                <th></th> <!-- archiver -->
                            </tr>
                            <?php
                            foreach ($pictures as $picture) {
                                // dd($picture);
                            ?>
                                <tr>
                                    <td class="pe-4"><?= $picture->id_picture ?></td>
                                    <td>
                                        <img class="dashboard__imgRsz" src="/public/assets/img/ftp/<?= $picture->photo ?>">
                                        <button type="button" class="btn btn-link ps-0 pe-3" data-bs-toggle="modal" data-bs-target="#zoom<?= $picture->id_picture ?>"><i class="fa-solid fa-magnifying-glass-plus"></i></button>
                                    </td>
                                    <td class="pe-3"><?= $picture->name ?></td>
                                    <td><?php
                                        if (($picture->description != null) && (strlen($picture->description) >= 30)) {
                                            echo (substr($picture->description, 0, 30) . "..."); ?> <button type="button" class="btn btn-link dashboard__descriptionDtls p-0" data-bs-toggle="modal" data-bs-target="#voirplus<?= $picture->id_picture ?>">[voir plus]</button> <?php
                                                } else {
                                                    echo ($picture->description);
                                                }
                                                    ?></td>
                                    <!-- ? <td><?= $picture->picture_like ?></td> -->
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
                                                <img src="/public/assets/img/ftp/<?= $picture->photo ?>">
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