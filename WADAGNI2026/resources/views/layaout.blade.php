<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Jeunesse WADAGNI Nationale</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.css">
 <style>
        :root{
            --blue-dark:#07215a;
            --blue:#0A2C77;
            --accent:#1e56a0;
            --muted:#f5f7fb;
        }
        body{font-family: 'Segoe UI', Roboto, Arial, sans-serif; color:#222}
        .top-bar{background:var(--blue-dark); color:#fff; font-size:14px; padding:6px 0}
        header{background:#fff; border-bottom:1px solid #e6eefc}
        .brand{display:flex; align-items:center; gap:12px}
        .brand img{height:52px}
        .nav-links .nav-link{color:var(--blue); font-weight:600; padding:10px 12px}
        .don-btn{background:var(--blue); color:#fff; padding:8px 18px; border-radius:6px}
        .page-banner{background:var(--blue); color:#fff; padding:18px 0; text-align:center; font-size:20px; font-weight:700}
        .main-hero{padding:34px 0}
        .hero-left{display:flex; align-items:flex-start; justify-content:center}
        .hero-left .photo{width:320px; height:360px; overflow:hidden; border-radius:8px; box-shadow:0 6px 18px rgba(10,44,119,0.18);}
        .hero-left .photo img{width:100%; height:100%; object-fit:cover; object-position:center top}
        .hero-right .info-box{background:var(--blue); color:#fff; padding:28px; border-radius:8px; position:relative}
        .info-box h3{font-size:22px; font-weight:700}
        .info-box p{font-size:15px; margin-top:12px}
        .info-box .cta-row{margin-top:18px}
        .info-box .btn-white{background:#fff; color:var(--blue); font-weight:700}
        .news-grid .card{border:0; border-radius:8px; overflow:hidden}
        .news-grid .card img{height:160px; object-fit:cover}
        .news-grid .card .card-body{padding:14px}
        .side-buttons a{display:block; background:var(--blue); color:#fff; padding:12px; border-radius:6px; text-align:center; font-weight:600; margin-bottom:12px}
        .big-news{display:flex; gap:18px; margin-bottom:24px; align-items:flex-start}
        .big-news img{width:36%; height:160px; object-fit:cover; border-radius:6px}
        .big-news .text h5{font-weight:700; margin-bottom:8px}
        .big-news .text p{color:#556}
        .video-grid .card{border:0}
        .video-grid .thumb{height:160px; background-image: url('/image/11.jpeg'); border-radius:6px; display:flex; align-items:center; justify-content:center}
        .cta { background:#1e56a0; color:white; padding:60px 0; text-align:center;  margin: 10px}
        .footer { background:#0d47a1; color:white; padding:50px 0; }
        .footer a { color:white; text-decoration:none; }
        @media(max-width:991px){
            .hero-left .photo{width:260px; height:300px}
            .big-news img{width:40%}
        }
        @media(max-width:767px){
            .hero-left .photo{width:100%; height:220px}
            .hero-right .info-box{margin-top:18px}
            .big-news{flex-direction:column}
            .big-news img{width:100%; height:220px}
        }
    </style>
</head>
<body>
    
<div class="bg-primary text-white text-center fw-bold py-2">
    <marquee>
        <h5>REJOIGNEZ LE MOUVEMENT JEUNESSE WADAGNI NATIONNALE  +229 97 00 00 00</h5>
    </marquee>
</div>

<!-- HEADER -->
<header class="bg-white py-3 shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <!-- AJOUT DU LOGO + TEXTE EN FLEX -->
        <div class="d-flex align-items-center">
              <img src="image/dagni.jpg" alt="logo" style="width:70px; height:70px; border-radius:50%; object-fit:cover;" class="me-2">

            <div class="text-primary fw-bold me-2 text-center" style="line-height: 0.9;">
                JEUNESSE<br>WADAGNI<br>NATIONNALE
            </div>
        </div>

        <nav class="d-none d-md-flex gap-4">
            <a href="home" class="text-primary fw-semibold text-decoration-none">Accueil</a>
            <a href="programme" class="text-primary fw-semibold text-decoration-none">Programme</a>
            <a href="evenement" class="text-primary fw-semibold text-decoration-none">Evénement</a>
            <a href="actualite" class="text-primary fw-semibold text-decoration-none">Actualité</a>
            <a href="benevolat" class="text-primary fw-semibold text-decoration-none">Bénévolat</a>
        </nav>

        <a href="don" class="btn btn-primary px-4">Faire un don</a>
        

    </div>
</header>

    @yield('contente')

<!-- FOOTER  -->
    <footer class="bg-primary text-white py-5">
        <div class="container">

            <div class="row d-flex">

                <div class="col-md-4 mb-4 mb-md-0 text-center text-md-start">
                    <div class="d-flex align-items-center gap-3">
                           <img src="image/dagni.jpg" alt="logo" style="width:70px; height:70px; border-radius:50%; object-fit:cover;" class="me-2">
                        <h5 class="fw-bold m-0">
                            JEUNESSE<br>WADAGNI<br>NATIONNALE
                        </h5>
                    </div>

                    <p class="mt-3">
                        Ensemble, construisons un Bénin fort et prospère. <br>
                        Un leadership moderne pour un avenir meilleur.
                    </p>
                </div>

                <div class="col-md-4 mb-4 mb-md-0">
                    <h5 class="fw-bold">Liens Rapides</h5>
                    <ul class="list-unstyled mt-3">
                        <li><a class="text-white text-decoration-none" href="#">Accueil</a></li>
                        <li><a class="text-white text-decoration-none" href="#">Programme</a></li>
                        <li><a class="text-white text-decoration-none" href="#">Evénements</a></li>
                        <li><a class="text-white text-decoration-none" href="#">Actualités</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h5 class="fw-bold">Contacts</h5>
                    <p class="mt-3">+229 97 00 00 00</p>
                    <p>Lun - Sam: 8h - 18h</p>
                    <a class="text-white text-decoration-none" href="#">Mentions Légales</a><br>
                    <a class="text-white text-decoration-none" href="#">Politique de confidentialité</a>
                </div>

            </div>

            <hr class="border-light mt-4">
            <p class="text-center mt-3">
                © 2024 JEUNESSE WADAGNI NATIONNALE – Tous droits réservés
            </p>

        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
