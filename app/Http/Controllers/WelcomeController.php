<?php

namespace App\Http\Controllers;

use App\Titlesection;
use App\User;
use App\Footer;
use App\Sousection;
use App\Section;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    // show the front with the data 
    public function index( User $user, Titlesection $titles, Footer $footers)
    {
        $users = User::get();
        $titles = Titlesection::get(); 
        $footers = Footer::all();
        $sousectionService = Sousection::sousectionAcrticle();
        $secions = Section::all();
        return view('welcome',[
            "users" => $users,
            "titles" => $titles,
            "footers" => $footers,
            "sections" => $secions, 
            "sousectionService" => $sousectionService
        ]);
    }
}