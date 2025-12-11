<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Actualités — Jeunesse WADAGNI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
        
      
  

        <div class="d-flex align-items-center">
            <a class="don-btn me-2" href="/dons">Faire un don</a>
            <a class="btn btn-outline-primary px-4" href="/login">Se connecter</a>
        </div>
    </div>
</header>
<div class="container mt-5">
    <h2>Faire un don</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('don.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom_donateur" class="form-label">Nom du donateur</label>
            <input type="text" name="nom_donateur" id="nom_donateur" class="form-control" value="{{ old('nom_donateur') }}">
            @error('nom_donateur')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type_don" class="form-label">Type de don</label>
            <select name="type_don" id="type_don" class="form-control">
                <option value="">-- Choisir --</option>
                <option value="espece" {{ old('type_don') == 'espece' ? 'selected' : '' }}>Espèce</option>
                <option value="nature" {{ old('type_don') == 'nature' ? 'selected' : '' }}>Nature</option>
            </select>
            @error('type_don')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3" id="moyen_div" style="display: none;">
            <label for="moyen_paiement" class="form-label">Moyen de paiement</label>
            <select name="moyen_paiement" id="moyen_paiement" class="form-control">
                <option value="">-- Choisir --</option>
                <option value="mobile_money" {{ old('moyen_paiement') == 'mobile_money' ? 'selected' : '' }}>Mobile Money</option>
                <option value="paypal" {{ old('moyen_paiement') == 'paypal' ? 'selected' : '' }}>PayPal</option>
                <option value="carte_bancaire" {{ old('moyen_paiement') == 'carte_bancaire' ? 'selected' : '' }}>Carte bancaire</option>
            </select>
            @error('moyen_paiement')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3" id="montant_div" style="display: none;">
            <label for="montant" class="form-label">Montant (en FCFA)</label>
            <input type="number" name="montant" id="montant" class="form-control" value="{{ old('montant') }}">
            @error('montant')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3" id="quantite_div" style="display: none;">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" value="{{ old('quantite') }}">
            @error('quantite')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3" id="description_div" style="display: none;">
            <label for="description" class="form-label">Description du don</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div> 


        <div class="mb-3">
            <label for="date" class="form-label">Date du don</label>
            <input type="date" name="date" id="date" class="form-control" value="{{ old('date', date('Y-m-d')) }}">
            @error('date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
<script>
const typeDon = document.getElementById('type_don');
const montantDiv = document.getElementById('montant_div');
const quantiteDiv = document.getElementById('quantite_div');
const descriptionDiv = document.getElementById('description_div');
const moyenDiv = document.getElementById('moyen_div');

function toggleFields() {
    if(typeDon.value === 'espece') {
        montantDiv.style.display = 'block';
        moyenDiv.style.display = 'block';
        quantiteDiv.style.display = 'none';
        descriptionDiv.style.display = 'none';
    } else if(typeDon.value === 'nature') {
        montantDiv.style.display = 'none';
        moyenDiv.style.display = 'none';
        quantiteDiv.style.display = 'block';
        descriptionDiv.style.display = 'block';
    } else {
        montantDiv.style.display = 'none';
        moyenDiv.style.display = 'none';
        quantiteDiv.style.display = 'none';
        descriptionDiv.style.display = 'none';
    }
}

typeDon.addEventListener('change', toggleFields);
window.addEventListener('load', toggleFields);
</script>
{{-- IDH26 --}}
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