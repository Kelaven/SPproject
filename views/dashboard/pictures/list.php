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
                                <th>Like :</th>
                                <th></th> <!-- modifier -->
                                <th></th> <!-- archiver -->
                            </tr>
                            <!-- <?php
                                    foreach ($pictures as $picture) {
                                    ?>
                                <tr>
                                    <td><?= $picture->name ?></td>
                                    <td><?= date('m-Y', strtotime($gallery->date)) ?></td>
                                    <td> <?php if (!empty($gallery->picture)) { ?>
                                        <img src="#" alt="Photo de couverture de la galerie">
                                    <?php } ?> </td>
                                    <td><?= $gallery->password ?></td>
                                    <td>
                                        <a href="/controllers/dashboard/pictures/update-ctrl.php?id_gallery=<?= $gallery->id_gallery ?>" data-bs-toggle="tooltip" data-bs-title="Modifier"><i class="fa__tooltip fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="text-end">
                                        <a href="/controllers/dashboard/pictures/archive-ctrl.php?id_gallery=<?= $gallery->id_gallery ?>" data-bs-toggle="tooltip" data-bs-title="Archiver"><i class="fa__tooltip fa-solid fa-box"></i></a>
                                    </td>
                                </tr>
                            <?php
                                    }
                            ?> -->
                        </table>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>