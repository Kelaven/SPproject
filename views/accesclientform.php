<form action="" method="post">
                    <!-- ! Login -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="login"></label>
                        <span class="input-group-text" id="span__login"><i class="fa-solid fa-user"></i></span>
                        <input required type="text" name="login" id="login" placeholder="Identifiant" class="form-control" value="<?= $login ?? '' ?>">
                    </div>
                    <small class="text-danger ps-3"><?= $error['login'] ?? '' ?></small>
                    <!-- ! Password -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="password"></label>
                        <span class="input-group-text" id="span__password"><i class="fa-solid fa-lock"></i></span>
                        <input required type="password" name="password" id="password" placeholder="Mot de passe" class="form-control">
                    </div>
                    <small class="text-danger ps-3"><?= $error['password'] ?? '' ?></small>
                    <!-- ! validation btn -->
                    <div class="text-center py-3">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>