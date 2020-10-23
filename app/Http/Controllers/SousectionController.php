<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TitleSection;
use App\Sousection;
class SousectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $titlesection = TitleSection::find($id);
        return view('sousection.index', compact('titlesection'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $titlesection = TitleSection::find($id);
        return  view('sousection.create', compact('titlesection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $titlesection = TitleSection::find($id);
        $test =   \request()->validate([
            "title" => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|max:5000',
        ]);
        $data = Sousection::get();
        if (empty($data->image)){
            $header = auth()->user()->sousections()->create(
                array_merge($test, ['titlesection_id' => $titlesection->id])
            );
            $this->storeImage($header);
        }else{
            return false;
        }

        return redirect(route('section'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sousection = Sousection::find($id);
        return view('sousection.edit', compact('sousection'));
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
        $sousection = Sousection::find($id);
        if(empty($sousection->image)){
            $sousection->update($this->validator());
            $this->storeImage($sousection);
        }else{
            $sousection->update($this->validator());
            $this->storeImage($sousection);
        }

        return  \redirect(route('section.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sousection = Sousection::find(1);
        $sousection->delete();
        return redirect('section.index');
    }
    private function storeImage( Sousection $sousection)
    {
        if (\request('image'))
        {
            $sousection->update([
                'image' => \request('image')->store('soussection', 'public')
            ]);
        }
    }

    private function validator()
    {
        return request()->validate([
            "title" => 'required',
            'content' => 'required',
            'image' => 'sometimes|image|max:5000',
        ]);
    }
}