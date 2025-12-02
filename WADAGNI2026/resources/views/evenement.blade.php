<!-- Page HTML Bootstrap — reproduction fidèle de la maquette fournie -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Actualités — Jeunesse WADAGNI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root{
            --blue-dark:#07215a; /* header top */
            --blue:#0A2C77; /* primary blue */
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

        /* SECTION HERO PRINCIPAL : image à gauche + bloc bleu à droite (exactement comme la maquette) */
        .main-hero{padding:34px 0}
        .hero-left{display:flex; align-items:flex-start; justify-content:center}
        .hero-left .photo{
            width:320px; height:360px; overflow:hidden; border-radius:8px; box-shadow:0 6px 18px rgba(10,44,119,0.18);
        }
        .hero-left .photo img{width:100%; height:100%; object-fit:cover; object-position:center top}

        .hero-right .info-box{background:var(--blue); color:#fff; padding:28px; border-radius:8px; position:relative}
        .info-box h3{font-size:22px; font-weight:700}
        .info-box p{font-size:15px; margin-top:12px}
        .info-box .cta-row{margin-top:18px}
        .info-box .btn-white{background:#fff; color:var(--blue); font-weight:700}

        /* Trois cartes d'actualités juste en dessous (grille) */
        .news-grid .card{border:0; border-radius:8px; overflow:hidden}
        .news-grid .card img{height:160px; object-fit:cover}
        .news-grid .card .card-body{padding:14px}

        /* barre latérale de boutons */
        .side-buttons a{display:block; background:var(--blue); color:#fff; padding:12px; border-radius:6px; text-align:center; font-weight:600; margin-bottom:12px}

        /* section liste d'actualités (grande) */
        .big-news{display:flex; gap:18px; margin-bottom:24px; align-items:flex-start}
        .big-news img{width:36%; height:160px; object-fit:cover; border-radius:6px}
        .big-news .text h5{font-weight:700; margin-bottom:8px}
        .big-news .text p{color:#556}

        /* grille vidéos/miniatures (3 colonnes sur desktop) */
        .video-grid .card{border:0}
        .video-grid .thumb{height:160px; background-image: url('/image/11.jpeg'); border-radius:6px; display:flex; align-items:center; justify-content:center}
        .cta { background:#1e56a0; color:white; padding:60px 0; text-align:center;  margin: 10px}

        .footer { background:#0d47a1; color:white; padding:50px 0; }
    .footer a { color:white; text-decoration:none; }

        /* petits ajustements responsive */
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

    <!-- TOP BAR -->
    <div class="top-bar text-center">République du Bénin — JEUNESSE WADAGNI NATIONALE</div>

    <!-- HEADER -->
    <header>
        <div class="container d-flex align-items-center justify-content-between py-3">
            <div class="brand">
                <img src="/mnt/data/logo.png" alt="logo">
                <div>
                    <div style="font-weight:700; color:var(--blue); font-size:18px">JEUNESSE WADAGNI NATIONNALE</div>
                    <div style="font-size:12px; color:#6b7aa0">Mouvement citoyen</div>
                </div>
            </div>

            <nav class="d-none d-lg-flex nav-links">
                <a class="nav-link" href="#">Accueil</a>
                <a class="nav-link" href="#">Actualités</a>
                <a class="nav-link" href="#">Programme</a>
                <a class="nav-link" href="#">Contact</a>
            </nav>

            <div class="d-flex align-items-center">
                <a class="don-btn me-2" href="#">Faire un don</a>
            </div>
        </div>
    </header>



    <!-- 3 CARTES + SIDE BUTTONS -->
    <section class="news-grid py-4" style="color: #0d47a1">
        <div class="container">
            <h3>Evenement a venir</h3>
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="/image/10.jpeg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h6>Titre : Grande mobilisation citoyenne</h6>
                                    <p class="mb-0">Retour sur les actions menées lors de la dernière grande mobilisation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="/image/10.jpeg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h6>Programme d’accompagnement</h6>
                                    <p class="mb-0">Lancement d'un programme d'accompagnement pour les jeunes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="/image/10.jpeg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h6>Campagne nationale de sensibilisation</h6>
                                    <p class="mb-0">Détails de la nouvelle campagne de sensibilisation nationale.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="side-buttons">
                        <a href="#">Actualités</a>
                        <a href="#">Vidéos</a>
                        <a href="#">Communiqués</a>
                        <a href="#">Agenda</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- 3 CARTES + SIDE BUTTONS -->
    <section class="news-grid py-4">
        
        <div class="container">
            <h3 style="color: #0d47a1">Evenement passe  </h3>
            <div class="row g-4">
                <div class="col-lg-9">
                    <div class="row g-3">
                        <div class="col-md-4">
                            
                            <div class="card shadow-sm">
                                
                                <img src="/image/10.jpeg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h6>Titre : Grande mobilisation citoyenne</h6>
                                    <p class="mb-0">Retour sur les actions menées lors de la dernière grande mobilisation.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="/image/10.jpeg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h6>Programme d’accompagnement</h6>
                                    <p class="mb-0">Lancement d'un programme d'accompagnement pour les jeunes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card shadow-sm">
                                <img src="/image/10.jpeg" alt="" class="card-img-top">
                                <div class="card-body">
                                    <h6>Campagne nationale de sensibilisation</h6>
                                    <p class="mb-0">Détails de la nouvelle campagne de sensibilisation nationale.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   </section>


   
   <!-- FOOTER -->
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <h5 class="fw-bold">JEUNESSE WADAGNI</h5>
        <p>Mouvement national pour une jeunesse engagée et citoyenne.</p>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold">Liens</h5>
        <ul class="list-unstyled">
          <li><a href="#">Accueil</a></li>
          <li><a href="#">Actualités</a></li>
          <li><a href="#">À propos</a></li>
          <li><a href="#">Contacts</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5 class="fw-bold">Nous contacter</h5>
        <p>Email : contact@wadagni.org<br>Téléphone : +229 00 00 00 00</p>
      </div>
    </div>
  </div>
</footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
