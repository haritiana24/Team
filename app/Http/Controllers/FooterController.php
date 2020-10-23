<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;

class FooterController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Footer $footers)
    {
        $footers = Footer::get();
        return view("footer.index", compact('footers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Footer::all();
         if (empty($data->image)){
            $footer = auth()->user()->footers()->create($this->validator());
            $this->storeImage($footer);
        }else{
            return false;
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = Footer::find($id);
        return view('footer.show', compact('footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = Footer::find($id);
        return view('footer.edit', compact('footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $footer = Footer::find($id);
        if(empty($footer->image)){
            $header = $footer->update($this->validator());
            $this->storeImage($footer);
        }else{
            $header = $footer->update($this->validator());
            $this->storeImage($footer);
        }
        
        return  \redirect(route('footer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::find($id);
        $footer->delete();
        return back();
    }

     private function storeImage( Footer $footer)
    {
       if (\request('image'))
        {
            $footer->update([
                'image' => \request('image')->store('footer', 'public')
            ]);
        }
    }

    private function validator(){
       return  \request()->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|max:5000'
        ]);
    }
}