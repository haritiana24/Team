<?php

namespace App\Http\Controllers;
use App\Logo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogoController extends Controller
{
    public function  create()
    {
        return view('logo.create');
    }

    public function store( Request $request, User $user)
    {
        $data =  \request()->validate([
            'name' =>'sometimes|image|max:3000'
        ]);
        if(request('name'))
        {
            $imagePath = request('name')->store('logoSite', 'public');
            auth()->user()->logo()->create(array_merge(
                $data,
                ['name' => $imagePath]
            ));
        }else{
            auth()->user()->logo()->update($data);
        }

        return back();
    }

    private function storeImage( Logo $logo)
    {
        if(\request('name'))
        {
            $logo->update([
                'name' => \request('logo')->store('logo', 'public')
            ]);
        }
    }

}