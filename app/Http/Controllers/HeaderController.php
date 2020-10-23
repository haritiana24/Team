<?php

namespace App\Http\Controllers;
use  App\Header;
use Illuminate\Http\Request;
use App\Titlesection;

class HeaderController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Header $header)
    {
        $header = Header::get();
        return view('header.index', compact("header"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('header.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
         $data['items'] = $request->validate([
            'items' => "required"
        ]);
         $test = auth()->user()->headers()->create($data['items']);
         Titlesection::create([
             'name' => $test->items,
             'header_id' => $test->id
         ]);
        return redirect(route("header.index"));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        return view("header.show", compact('header'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
        return view("header.edit", compact('header') );
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
        $data = [];
        $header = Header::find($id);
        $titleSection = Titlesection::find($id);
        $data['items'] = $request->validate([
           "items"=> 'required'
        ]);
        $header->update($data['items']);
        $test = [
            'name' => $header->items,
            'header_id' => $header->id
        ];
        $titleSection->update($test);
        return redirect(route("header.show", $header));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        $header->delete();
        return redirect(route("header.index"));
    }

    private  function validator()
    {
         return   \request()->validate([
            'items' => 'required'
        ]);
    }
}