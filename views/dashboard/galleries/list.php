<section class="pe-5">
    <div class="container p-5" id="container__creatList">
        <div class="row pt-5">
            <div class="col pt-5">
                <!-- bouton de redirection pour ajouter une galerie -->
                <a href="/controllers/dashboard/galleries/add-ctrl.php" class="btn btn-dark form__btn me-2">
                    <i class="fa-solid fa-plus pe-3"></i>Ajouter une catégorie
                </a>
                <!-- bouton archives -->
                <a href="#" class="btn btn-dark form__btn">
                    <i class="fa-solid fa-box pe-3"></i></i>Accèder aux archives
                </a>
            </div>
        </div>
    </div>
    <div class="container p-5 pt-0" id="container__readList">
        <div class="row">
            <div class="col">
                <!-- carte contenant les infos -->
                <div class="card bg-dark mb-3" id="card__list--galleries" >
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Liste des catégories</h1>
                    </div>
                    <div class="card-body p-5 pt-3">
                        <p class="text-info">
                            <?= $msg ?? '' ?>
                        </p>
                        <table>
                            <tr>
                                <th>Nom :</th>
                                <th>Date séance :</th>
                                <th>Image :</th>
                                <th>Passe d'accès :</th>
                                <th></th> <!-- modifier -->
                                <th></th> <!-- archiver -->
                            </tr>
                            <?php
                            foreach ($galleries as $gallery) {
                            ?>
                                <tr>
                                    <td><?= $gallery->name ?></td>
                                    <td><?= date('m-Y', strtotime($gallery->date)) ?></td>
                                    <td> <?php if (!empty($gallery->picture)) { ?>
                                        <img src="#" alt="Photo de couverture de la galerie">
                                    <?php } ?> </td>
                                    <td><?= $gallery->password ?></td>
                                    <td>
                                        <a href="#" data-bs-toggle="tooltip" data-bs-title="Modifier"><i class="fa__tooltip fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-title="Archiver"><i class="fa__tooltip fa-solid fa-box"></i></a>
                                    </td>
                                </tr>
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