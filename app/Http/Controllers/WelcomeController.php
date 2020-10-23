<?php

namespace App\Http\Controllers;

use App\Titlesection;
use App\User;
use App\Footer;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index( User $user, Titlesection $titles, Footer $footers)
    {
        $users = User::get();
        $titles = Titlesection::get(); 
        $footers = Footer::all();
        return view('welcome', compact('users', 'titles', 'footers'));
    }
}