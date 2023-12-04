<section class="container-fluid">
    <div class="row">
        <div class="col-xl-6 px-0 form__container--left">
            <div id="form__overlay">
                <div class="d-flex justify-content-center flex-wrap">
                    <p class="text-center py-4">
                        Vous avez eu un coup de coeur pour l’une de mes photos ? <br>
                        Vous êtes intéressé par un shooting ? <br>
                        Vous avez des questions ? <br> <br>
                        <span>N’hésitez pas, contactez-moi !</span>
                    </p>
                    <div id="form__pic" class="mb-4 mb-md-5 rounded-circle">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 px-0" id="form__container--right">
            <form>
                <legend class="py-4 px-3 text-center">Formulaire de contact</legend>
                <!-- ! firstname -->
                <div class="input-group mb-3 pe-xl-3 ps-xl-3 px-1">
                    <label for="firstname"></label>
                    <span class="input-group-text" id="span__firstname"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Prénom"
                        aria-label="firstname" aria-describedby="firstname">
                </div>
                <!-- ! lastname -->
                <div class="input-group mb-3 pe-xl-3 ps-xl-3 px-1">
                    <label for="lastname"></label>
                    <span class="input-group-text" id="span__lastname"><i class="fa-solid fa-user-plus"></i></span>
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Nom"
                        aria-label="lastname" aria-describedby="lastname">
                </div>
                <!-- ! email -->
                <div class="input-group mb-3 pe-xl-3 ps-xl-3 px-1">
                    <label for="email"></label>
                    <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Adresse mail"
                        aria-label="email" aria-describedby="email">
                </div>
                <!-- ! text -->
                <div class="input-group mb-3 pe-xl-3 ps-xl-3 px-1">
                    <label for="text"></label>
                    <span class="input-group-text"><i class="fa-solid fa-comment"></i></span>
                    <textarea name="text" id="text" placeholder="Message" class="form-control"
                        aria-label="textarea"></textarea>
                </div>
                <!-- ! captcha -->
                <div class="input-group mb-3 pe-xl-3 ps-xl-3 px-1">
                    <label for="captcha"></label>
                    <span class="input-group-text" id="span__captcha"><i class="fa-solid fa-robot"></i></span>
                    <input type="number" name="captcha" id="captcha" class="form-control" placeholder="1 + 1 = ?"
                        aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <!-- ! validation btn -->
                <div class="text-center py-3">
                    <button class="btn btn-primary" type="submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>