<?php

namespace App\Http\Controllers;

use App\Models\Benevoles;
use Illuminate\Http\Request;

class BenevoleController extends Controller
{
    public function __construct()
    {
        /* $this->middleware('auth'); */
    }

    public function liste()
    {
        /* $this->authorize('viewAny', Benevole::class); */
        $benevoles = Benevoles::latest()->paginate(10);
        return view('benevole.liste', compact('benevoles'));
    }

    public function show(Benevoles $benevole)
    {
        /* $this->authorize('view', $benevole); */
        return view('benevoles.show', compact('benevole'));
    }
}
