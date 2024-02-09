<section class="container" id="signin__container">
    <div class="row">
        <div class="col pt-3">
            <div class="card">
                <form method="POST" class="px-2" novalidate>
                    <legend class="py-3 px-3 text-center">Connexion</legend>
                    <div class="text-success text-center fs-6 fw-bold pb-3">
                        <?= $result ?? '' ?>
                    </div>
                    <div class="form__login--container">
                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="email"></label>
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input required type="email" name="email" id="email" placeholder="Adresse mail" class="form-control" value="<?= $email ?? '' ?>">
                        </div>
                        <small class="text-danger ps-3"><?= $error['email'] ?? '' ?></small>

                        <div class="input-group pe-xl-3 ps-xl-3 px-1">
                            <label for="password"></label>
                            <span class="input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                            <input required type="password" name="password" id="password" placeholder="Mot de passe" class="form-control password__inputs" value="<?= $password ?? '' ?>" pattern="<?= REGEX_PASSWORD ?>">
                            <span class="input-group-text span__login__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                        </div>
                        <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                    </div>

                    <div class="text-center py-3">
                        <button class="btn btn-primary" type="submit">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>