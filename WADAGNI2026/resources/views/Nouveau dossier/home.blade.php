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

<!-- TOP BAR -->
<div class="top-bar text-center">République du Bénin — JEUNESSE WADAGNI NATIONALE</div>

<!-- HEADER -->
<header>
    <div class="container d-flex align-items-center justify-content-between py-3">
        <div class="brand">
            <img src="image/logo.png" alt="logo">
            <div>
                <div style="font-weight:700; color:var(--blue); font-size:18px">JEUNESSE WADAGNI NATIONNALE</div>
                <div style="font-size:12px; color:#6b7aa0">Mouvement citoyen</div>
            </div>
        </div>

        <nav class="d-none d-lg-flex nav-links">
            <a class="nav-link" href="/home">Accueil</a>
            <a class="nav-link" href="/actualite">Actualités</a>
            <a class="nav-link" href="/evenement">Événements</a>
            <a class="nav-link" href="/programme">Programme</a>
            <a class="nav-link" href="/contact">Contact</a>
        </nav>
         
      <a class="btn btn-primary px-4" href="/dons">Faire un don</a>
      <a class="btn btn-outline-primary px-4" href="/login">Se connecter</a>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero">
  <div class="hero-overlay container">
    <h1 class="display-5 fw-bold">JEUNESSE WADAGNI NATIONNALE</h1>
    <p class="mt-3">Ensemble portons les valeurs du civisme et du patriotisme</p>
    <div class="mt-4 d-flex gap-3">
      <a href="#" class="btn btn-light px-4">Savoir plus</a>
      <a href="#" class="btn btn-outline-light px-4">Rejoindre la jeunesse</a>
    </div>
  </div>
</section>

<!-- VISION -->
<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-4">
      <div class="col-md-6">
        <h2 class="fw-bold text-primary">La Vision WADAGNI 2030</h2>
        <p class="mt-3">Notre vision est de mobiliser la jeunesse autour d’un idéal commun basé sur l’engagement citoyen, l'excellence et la transformation sociale…</p>
        <a href="#" class="btn btn-primary mt-2">Lire la grande vision complète 2030</a>
      </div>
      <div class="col-md-6 vision-img">
        <img src="/image/7.jpeg" class="img-fluid rounded shadow" alt="vision" />
        <div class="quote-box">« Bâtir une jeunesse forte, consciente et engagée est la clé d’un avenir meilleur. »</div>
      </div>
    </div>
  </div>
</section>

<!-- ACTUALITÉS -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            @foreach($articles as $article)
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="{{ $article->image ? asset('storage/articles/' . $article->image) : '/image/10.jpeg' }}" 
                             alt="" class="card-img-top">

                        <div class="card-body">
                            <h6>Titre : {{ $article->titre_art }}</h6>
                            <p class="mb-2">{{ $article->extr_art }}</p>
                            <small class="text-muted">
                                Publié par {{ $article->user->nom ?? 'Admin' }} 
                                le {{ $article->created_at->format('d/m/Y') }}
                            </small>

                            <div class="mt-2">
                                <a href="{{ route('articles.show', $article->id_art) }}" class="btn btn-sm btn-primary">
                                    Voir plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta">
  <h2 class="fw-bold">JEUNESSE WADAGNI NATIONNALE</h2>
  <p class="mt-2">Rejoignez notre mouvement et faisons rayonner la nation</p>
  <div class="mt-4 d-flex justify-content-center gap-3">
    <a class="btn btn-light px-4">Rejoindre</a>
    <a class="btn btn-outline-light px-4">Faire un don</a>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
