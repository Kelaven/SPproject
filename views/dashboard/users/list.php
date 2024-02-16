<section class="pe-5">
    <div class="container pb-4" id="container__creatList">
        <div class="row">
            <div class="col pt-5 pe-5">
                <!-- <a href="/controllers/dashboard/users/archive-ctrl.php" class="btn btn-dark form__btn">
                    <i class="fa-solid fa-box pe-3"></i></i>Accèder aux archives
                </a> -->
            </div>
        </div>
    </div>
    <div class="container px-5 py-0" id="container__readList">
        <div class="row">
            <div class="col">
                <div class="card bg-dark mb-3 card__list--galleries">
                    <div class="card-header">
                        <h1 class="form__h1 pt-2">Liste des utilisateurs</h1>
                    </div>
                    <div class="card-body p-5 pt-3">
                        <p class="text-info">
                            <?= $msg ?? '' ?>
                        </p>
                        <table>
                            <tr>
                                <th class="pe-4">Id :</th>
                                <th>Admin :</th>
                                <th class="ps-4">Pseudo :</th>
                                <th class="ps-3">Prénom :</th>
                                <th class="ps-3">Nom :</th>
                                <th class="ps-3">Email :</th>
                                <th class="ps-4">Telephone :</th>
                                <th class="pe-4"></th> <!-- supprimer -->
                            </tr>
                            <?php
                            foreach ($users as $user) {
                                // dd($users);
                            ?>
                                <tr>
                                    <td class="pe-4"><?= $user->id_user ?></td>
                                    <td class="pe-4"><?php
                                                        if ($user->isAdministrator == 1) {
                                                            echo ('Oui');
                                                        } else {
                                                            echo ('Non');
                                                        }
                                                        ?></td>
                                    <td class="px-4"><?= $user->username ?></td>
                                    <td class="px-4"><?= $user->firstname ?></td>
                                    <td class="px-4"><?= $user->lastname ?></td>
                                    <td class="px-3"><?php
                                                        if (($user->email != null) && (strlen($user->email) >= 10)) {
                                                            echo (substr($user->email, 0, 10) . "..."); ?> <button type="button" class="btn btn-link dashboard__descriptionDtls p-0" data-bs-toggle="modal" data-bs-target="#voirplusemail<?= $user->id_user ?>">[voir +]</button> <?php
                                                                                                                                                                                                                                                                    } else {
                                                                                                                                                                                                                                                                        echo ($user->email);
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                        ?></td>
                                    <td class="px-4"><?= $user->mobile ?></td>
                                    <td class="text-end">
                                        <a class="delete__link" data-delete-user="<?= $user->id_user ?>" data-bs-toggle="tooltip" data-bs-title="Supprimer"><i class="fa__tooltip fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="voirplusemail<?= $user->id_user ?>" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title fs-5"><?= $user->firstname ?> <?= $user->lastname ?></h2>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <?= $user->email ?>
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