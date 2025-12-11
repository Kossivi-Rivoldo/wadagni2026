<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les Policy mappings pour le modèle
     *
     * @var array
     */
    protected $policies = [
    \App\Models\Article::class => \App\Policies\ArticlePolicy::class,
    \App\Models\Evenement::class => \App\Policies\EvenementPolicy::class,
    \App\Models\Benevole::class => \App\Policies\BenevolePolicy::class,
    \App\Models\Don::class => \App\Policies\DonPolicy::class,
    \App\Models\User::class => \App\Policies\UserPolicy::class,
];


    /**
     * Enregistrer les services d'authentification.
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
