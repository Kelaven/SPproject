<section id="container__loading">
    <div class="row">
        <div class="col">
            <div class="container__loading--animation">
                <div class="container__loadingImg">
                    <img src="/public/assets/img/loading-img-grenoble-sunset-400-100.jpg" alt="Photo de Grenoble maison abandonée avec sunset" loading="lazy">
                </div>
                <div class="container__bgTransition"></div>
                <img class="loadingLogo" src="/public/assets/img/logo-kevin-lavenant-photographies-light.png" alt="Logo du photographe de portraits et paysages Kévin Lavenant" loading="lazy">
            </div>
        </div>
    </div>
</section>



<section id="homepage">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="carousel slide" data-bs-ride="carousel" data-bs-pause="false">
                    <div class="carousel-inner">
                        <!-- ! div to remplace cursor and modify it -->
                        <div class="cursor position-absolute z-3 d-none d-xl-block">
                        </div>
                        <!-- ! First slide, sunset on Normandy ! -->
                        <div class="carousel-item active" data-bs-interval="10000">
                            <!-- * srcset to perform on all screens * -->
                            <picture class="d-block w-100 position-absolute z-0">
                                <source media="(max-width: 768px)" srcset="/public/assets/img/normandie-france-sunset-on-beach-picture-1400-30.jpg">
                                <source media="(max-width: 1400px)" srcset="/pictures.php?picture=normandie-france-sunset-on-beach-picture-1400-70.jpg">
                                <img class="carousel-img__size" src="/pictures.php?picture=normandie-france-sunset-on-beach-picture-1920-50.jpg" alt="Photo de paysage d'un coucher de soleil normand en France sur la plage">
                            </picture>
                            <!-- overlay -->
                            <div class="carousel-img__filigram position-absolute z-1"></div>
                            <!-- display none on telephone for text elements -->
                            <div class="d-none d-md-block position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div pb-5">
                                                <h1 class="carousel-h1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-5">Photographe de portraits
                                                    et paysages</h2>
                                                <div class="btn-group px-2 pb-1" role="group">
                                                    <a href="#" data-bs-toggle="dropdown">
                                                        Portfolio
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu--home">
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                        <li><a class="dropdown-item dropdown-item--home pt-2" href="/portfolio-portraits.html">Portraits</a></li>
                                                    </ul>
                                                </div>
                                                <a href="/selection.html" class="px-2">Sélection</a>
                                                <a href="/contact.html" class="px-2">Contact</a>
                                                <a href="/galeries.html" class="px-2 pe-4">Galeries</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- display yes on telephone for text elements -->
                            <div class="d-block d-md-none position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div">
                                                <h1 class="carousel-h1 pt-1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-4 pe-3">Photographe de portraits
                                                    et paysages</h2>
                                                <ul class="pe-5">
                                                    <li class="py-2">
                                                        <div class="btn-group dropend">
                                                            <a href="#" data-bs-toggle="dropdown">
                                                                Portfolio
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu--home ps-2 pt-0">
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="py-2"><a href="/selection.html">Sélection</a></li>
                                                    <li class="py-2"><a href="/contact.html">Contact</a></li>
                                                    <li class="py-2"><a href="/galeries.html">Galeries</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ! Second slide, Melis' portrait ! -->
                        <div class="carousel-item" data-bs-interval="10000">
                            <!-- * srcset to perform on all screens * -->
                            <picture class="d-block w-100 position-absolute z-0">
                                <source media="(max-width: 768px)" srcset="/public/assets/img/portrait-women-laon-france-picture-1200-30.jpg">
                                <source media="(max-width: 1200px)" srcset="/public/assets/img/portrait-women-laon-france-picture-1200.jpg">
                                <source media="(max-width: 1400px)" srcset="/picturesPortraits.php?picture=portrait-women-laon-france-picture-1400-70.jpg">
                                <img class="carousel-img__size" id="meli-pic" src="/picturesPortraits.php?picture=portrait-women-laon-france-picture-1920-50.jpg" alt="Photo de portrait d'un modèle féminin en France dans une ville médiévale">
                            </picture>
                            <!-- overlay -->
                            <div class="carousel-img__filigram position-absolute z-1"></div>
                            <!-- display none on telephone for text elements -->
                            <div class="d-none d-md-block position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div pb-5">
                                                <h1 class="carousel-h1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-5">Photographe de portraits
                                                    et paysages</h2>
                                                <div class="btn-group px-2 pb-1" role="group">
                                                    <a href="#" data-bs-toggle="dropdown">
                                                        Portfolio
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu--home">
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                    </ul>
                                                </div>
                                                <a href="/selection.html" class="px-2">Sélection</a>
                                                <a href="/contact.html" class="px-2">Contact</a>
                                                <a href="/galeries.html" class="px-2 pe-4">Galeries</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- display yes on telephone for text elements -->
                            <div class="d-block d-md-none position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div">
                                                <h1 class="carousel-h1 pt-1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-4 pe-3">Photographe de portraits
                                                    et paysages</h2>
                                                <ul class="pe-5">
                                                    <li class="py-2">
                                                        <div class="btn-group dropend">
                                                            <a href="#" data-bs-toggle="dropdown">
                                                                Portfolio
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu--home ps-2 pt-0">
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="py-2"><a href="/selection.html">Sélection</a></li>
                                                    <li class="py-2"><a href="/contact.html">Contact</a></li>
                                                    <li class="py-2"><a href="/galeries.html">Galeries</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ! Third slide, mountains paysage ! -->
                        <div class="carousel-item" data-bs-interval="10000">
                            <!-- * srcset to perform on all screens * -->
                            <picture class="d-block w-100 position-absolute z-0">
                                <source media="(max-width: 768px)" srcset="/public/assets/img/vercors-france-moutains-winter-snow-picture-1600-30.jpg">
                                <source media="(max-width: 1600px)" srcset="/pictures.php?picture=vercors-france-moutains-winter-snow-picture-1600-60.jpg">
                                <img class="carousel-img__size" src="/pictures.php?picture=vercors-france-moutains-winter-snow-picture-1920-50.jpg" alt="Photo de paysage d'une montagne enneigée dans le Vercors en France">
                            </picture>
                            <!-- overlay -->
                            <div class="carousel-img__filigram position-absolute z-1"></div>
                            <!-- display none on telephone for text elements -->
                            <div class="d-none d-md-block position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div pb-5">
                                                <h1 class="carousel-h1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-5">Photographe de portraits
                                                    et paysages</h2>
                                                <div class="btn-group px-2 pb-1" role="group">
                                                    <a href="#" data-bs-toggle="dropdown">
                                                        Portfolio
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu--home">
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                    </ul>
                                                </div>
                                                <a href="/selection.html" class="px-2">Sélection</a>
                                                <a href="/contact.html" class="px-2">Contact</a>
                                                <a href="/galeries.html" class="px-2 pe-4">Galeries</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- display yes on telephone for text elements -->
                            <div class="d-block d-md-none position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div">
                                                <h1 class="carousel-h1 pt-1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-4 pe-3">Photographe de portraits
                                                    et paysages</h2>
                                                <ul class="pe-5">
                                                    <li class="py-2">
                                                        <div class="btn-group dropend">
                                                            <a href="#" data-bs-toggle="dropdown">
                                                                Portfolio
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu--home ps-2 pt-0">
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="py-2"><a href="/selection.html">Sélection</a></li>
                                                    <li class="py-2"><a href="/contact.html">Contact</a></li>
                                                    <li class="py-2"><a href="/galeries.html">Galeries</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ! End slide, Pau' portait ! -->
                        <div class="carousel-item" data-bs-interval="10000">
                            <!-- * srcset to perform on all screens * -->
                            <picture class="d-block w-100 position-absolute z-0">
                                <source media="(max-width: 768px)" srcset="/public/assets/img/portrait-women-normandie-france-picture-768-30.jpg">
                                <source media="(max-width: 992px)" srcset="/public/assets/img/portrait-women-normandie-france-picture-992.jpg">
                                <source media="(max-width: 1200px)" srcset="/public/assets/img/portrait-women-normandie-france-picture-1200.jpg">
                                <source media="(max-width: 1400px)" srcset="/picturesPortraits.php?picture=portrait-women-normandie-france-picture-1400-70.jpg">
                                <img class="carousel-img__size" id="pau-pic" src="/picturesPortraits.php?picture=portrait-women-normandie-france-picture-1920-50.jpg" alt="Photo de portrait d'un modèle féminin en normandie en France, dans un champ de marguerites">
                            </picture>
                            <!-- overlay -->
                            <div class="carousel-img__filigram position-absolute z-1"></div>
                            <!-- display none on telephone for text elements-->
                            <div class="d-none d-md-block position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div pb-5">
                                                <h1 class="carousel-h1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-5">Photographe de portraits
                                                    et paysages</h2>
                                                <div class="btn-group px-2 pb-1" role="group">
                                                    <a href="#" data-bs-toggle="dropdown">
                                                        Portfolio
                                                    </a>
                                                    <ul class="dropdown-menu dropdown-menu--home">
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                        <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                    </ul>
                                                </div>
                                                <a href="/selection.html" class="px-2">Sélection</a>
                                                <a href="/contact.html" class="px-2">Contact</a>
                                                <a href="/galeries.html" class="px-2 pe-4">Galeries</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- display yes on telephone for text elements -->
                            <div class="d-block d-md-none position-absolute z-2">
                                <div class="container">
                                    <div class="row align-items-center text-center text-elements__row">
                                        <div class="col text-elements__col">
                                            <div class="text-elements__div">
                                                <h1 class="carousel-h1 pt-1 pe-4">Kévin Lavenant</h1>
                                                <h2 class="carousel-h2 pb-4 pe-3">Photographe de portraits
                                                    et paysages</h2>
                                                <ul class="pe-5">
                                                    <li class="py-2">
                                                        <div class="btn-group dropend">
                                                            <a href="#" data-bs-toggle="dropdown">
                                                                Portfolio
                                                            </a>
                                                            <ul class="dropdown-menu dropdown-menu--home ps-2 pt-0">
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-paysages.html">Paysages</a></li>
                                                                <li><a class="dropdown-item dropdown-item--home" href="/portfolio-portraits.html">Portraits</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="py-2"><a href="/selection.html">Sélection</a></li>
                                                    <li class="py-2"><a href="/contact.html">Contact</a></li>
                                                    <li class="py-2"><a href="/galeries.html">Galeries</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>