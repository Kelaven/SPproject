<!-- form pour ajouter un nouveau client : ID, PWD, confirmation PWD -->
<section class="container" id="signup__container" >
    <div class="row">
        <div class="col pt-3">
            <div class="card">
                <form method="POST" class="px-2">
                    <legend class="py-3 px-3 text-center">Inscrire un nouveau client</legend>
                    <div class="text-success text-center">
                        <?= $result??'' ?>
                    </div>
                    <!-- ! firstnameSignup -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="firstnameSignup"></label>
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input 
                        required
                        type="text" 
                        name="firstnameSignup" 
                        id="firstnameSignup"
                        placeholder="Prénom"
                        minlength="2"
                        maxlength="30"
                        class="form-control"
                        value="<?= $firstnameSignup??'' ?>" >
                    </div>
                    <small class="text-danger ps-3"><?= $error['firstnameSignup']??'' ?></small>
                    <!-- ! lastnameSignup -->
                <div class="input-group pe-xl-3 ps-xl-3 px-1">
                    <label for="lastnameSignup"></label>
                    <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                    <input 
                    required
                    type="text" 
                    name="lastnameSignup" 
                    id="lastnameSignup" 
                    placeholder="Nom"
                    minlength="2"
                    maxlength="30"
                    class="form-control"
                    value="<?= $lastnameSignup??'' ?>" >
                </div>
                <small class="text-danger ps-3"><?= $error['lastnameSignup']??'' ?></small>
                <!-- ! emailSignup -->
                <div class="input-group pe-xl-3 ps-xl-3 px-1">
                    <label for="emailSignup"></label>
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input 
                    required
                    type="email" 
                    name="emailSignup" 
                    id="emailSignup" 
                    placeholder="Adresse mail" 
                    class="form-control"
                    value="<?= $emailSignup??'' ?>" >
                </div>
                <small class="text-danger ps-3"><?= $error['emailSignup']??'' ?></small>
                <!-- ! mobileSignup -->
                <div class="input-group pe-xl-3 ps-xl-3 px-1">
                    <label for="mobileSignup"></label>
                    <span class="input-group-text"><i class="fa-solid fa-phone"></i></span>
                    <input 
                    type="text" 
                    name="mobileSignup" 
                    id="mobileSignup" 
                    placeholder="Numéro de téléphone" 
                    class="form-control"
                    value="<?= $mobileSignup??'' ?>" >
                </div>
                <small class="text-danger ps-3"><?= $error['mobileSignup']??'' ?></small>
                    <!-- ! identifiant -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="signup"></label>
                        <span class="input-group-text" id="span__signup"><i class="fa-solid fa-user-plus"></i></span>
                        <input 
                        required
                        type="text" 
                        name="signup" 
                        id="signup"
                        placeholder="Identifiant"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="30"
                        class="form-control"
                        value="<?= $signup??'' ?>" >
                    </div>
                    <small class="text-danger ps-3"><?= $error['signup']??'' ?></small>
                    <!-- ! password -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        </label>
                        <span class="input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                        <input 
                        required
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="Mot de passe"
                        autocomplete="given-name"
                        minlength="10"
                        maxlength="30"
                        class="form-control password__inputs"
                        value="<?= $password??'' ?>" >
                        <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash"></i></span>
                    </div>
                    <small class="text-danger ps-3"><?= $error['password']??'' ?></small>
                    <!-- ! password check -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="passwordCheck">
                        </label>
                        <span class="input-group-text span__password"><i class="fa-solid fa-key"></i></span>
                        <input 
                        required
                        type="password" 
                        name="passwordCheck" 
                        id="passwordCheck"
                        placeholder="Confirmez le mot de passe"
                        autocomplete="given-name"
                        minlength="2"
                        maxlength="30"
                        class="form-control password__inputs"
                        value="<?= $password??'' ?>" >
                        <span class="input-group-text span__signup__pwd--eye"><i class="fa-solid fa-eye" id="pwd-eye-check"></i><i class="fa-solid fa-eye-slash d-none" id="pwd-eye-slash-check"></i></span>
                    </div>
                    <small class="text-danger ps-3"><?= $error['password']??'' ?></small>
                    <!-- ! captchaSignup -->
                    <div class="input-group pe-xl-3 ps-xl-3 px-1">
                        <label for="captchaSignup"></label>
                        <span class="input-group-text" id="span__captchaSignup"><i class="fa-solid fa-robot"></i></span>
                        <input 
                        required 
                        type="number" 
                        name="captchaSignup" 
                        id="captchaSignup"
                        placeholder="1 + 1 = ?"
                        minlength="1"
                        maxlength="1"
                        class="form-control">
                    </div>
                    <small class="text-danger ps-3"><?= $error['captchaSignup']??'' ?></small>
                    <!-- ! validation btn -->
                    <div class="text-center py-3">
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>