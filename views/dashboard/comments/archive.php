<section class="pe-5">
    <div class="container-fluid pb-4" id="container__creatList">
        <div class="row">
            <div class="col pt-5 pe-5">
                <a href="/controllers/dashboard/comments/list-ctrl.php">
                    <p><i class="fa-regular fa-circle-left pe-2"></i>Retour à la liste des commentaires</p>
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid px-5 py-0" id="container__readList">
        <div class="row">
            <div class="col">
                <div class="card bg-dark mb-3 card__list--galleries">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Liste des commentaires <span class="text-warning">archivés</span></h1>
                    </div>
                    <div class="card-body p-5 pt-3">
                        <p class="text-info">
                            <?= $msg ?? '' ?>
                        </p>
                        <table>
                            <tr>
                                <th class="pe-4">Id :</th>
                                <th>Texte :</th>
                                <th class="ps-4">Galerie :</th>
                                <th class="ps-4">Auteur :</th>
                                <th class="ps-4">Date écriture :</th>
                                <th class="ps-4">Date confirmation :</th>
                                <th></th> <!-- modifier -->
                                <th></th> <!-- archiver -->
                            </tr>
                            <?php
                            foreach ($comments as $comment) {
                                // dd($comments);
                            ?>
                                <tr>
                                    <td class="pe-4"><?= $comment->id_comment ?></td>
                                    <td><?php
                                        if (($comment->text != null) && (strlen($comment->text) >= 20)) {
                                            echo (substr($comment->text, 0, 20) . "..."); ?> <button type="button" class="btn btn-link dashboard__descriptionDtls p-0" data-bs-toggle="modal" data-bs-target="#voirpluscomment<?= $comment->id_comment ?>">[voir plus]</button> <?php
                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                echo ($comment->text);
                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                ?></td>
                                    <td class="px-4"><?= $comment->gallery_name ?></td>
                                    <td class="px-4"><?= $comment->user_username ?></td>
                                    <td class="px-4"><?= date('d-m-Y', strtotime($comment->created_at)) ?></td>
                                    <td class="px-4"><?php
                                                        if ($comment->confirmed_at != null) {
                                                            echo (date('d-m-Y', strtotime($comment->confirmed_at)));
                                                        } else { ?>
                                            <span class="badge bg-warning dashboard__commentsBdg">A confirmer</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="/controllers/dashboard/comments/unarchive-ctrl.php?id_comment=<?= $comment->id_comment ?>" data-bs-toggle="tooltip" data-bs-title="Désarchiver"><i class="fa__tooltip fa-solid fa-box-open px-5"></i></a>
                                    </td>
                                    <td class="text-end">
                                        <a class="delete__link" data-delete-comment="<?= $comment->id_comment ?>" data-bs-toggle="tooltip" data-bs-title="Supprimer"><i class="fa__tooltip fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="voirpluscomment<?= $comment->id_comment ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5"><?= $comment->gallery_name ?> - <?= $comment->user_username ?></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $comment->text ?>
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