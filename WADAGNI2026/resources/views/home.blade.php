@extends('layaout')
@section('contente')
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


    @endsection
