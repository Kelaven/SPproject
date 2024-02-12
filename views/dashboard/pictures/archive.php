<section class="pe-5">
    <div class="container pb-4" id="container__creatList">
        <div class="row">
            <div class="col pt-5 pe-5">
            <a href="/controllers/dashboard/pictures/list-ctrl.php">
                    <p><i class="fa-regular fa-circle-left pe-2"></i>Retour à la liste des photos</p>
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
                                <th></th> <!-- archiver -->
                                <th></th> <!-- supprimer -->
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
                                    <td class="text-end">
                                        <a href="/controllers/dashboard/pictures/unarchive-ctrl.php?id_picture=<?= $picture->id_picture ?>" data-bs-toggle="tooltip" data-bs-title="Désarchiver"><i class="fa__tooltip fa-solid fa-box-open pe-4"></i></a>
                                    </td>
                                    <td class="text-end">
                                        <a class="delete__link" data-delete-picture="<?= $picture->id_picture ?>" data-bs-toggle="tooltip" data-bs-title="Supprimer"><i class="fa__tooltip fa-solid fa-trash"></i></a>
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