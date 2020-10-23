<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Header;
use App\Section;
use App\TitleSection;
class SectionController extends Controller
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
    public function index()
    {
        $headers= Header::with('titleSection')->get();
        return view('section.index', compact('headers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($header)
    {
        $header = Header::find($header);
        return view("section.create", compact('header'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $header)
    {
         $header = Header::find($header);
         $test =   \request()->validate([
            "titre" => 'required',
            'contenue' => 'required',
            'description' => 'required',
            'status'=> 'required|integer',
            'image' => 'sometimes|image|max:5000',
        ]);
        $data = Section::get();
        if (empty($data->image)){
            $header = auth()->user()->sections()->create(
                array_merge($test, ['titlesection_id' => $header->titleSection->id])
            );
            $this->storeImage($header);
        }else{
            return false;
        }

        return \redirect(route('sousection.index', $header->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sections = Section::sections($id)->get();
        foreach($sections as $section){
            if($section->titlesection_id === 1){
                $sections = $sections[0];
                $titleSection = TitleSEction::find($id);
                return view('section.show',  compact('sections', 'titleSection'));
            }else{
                $sections = Section::sections($id)->where("status", 1)->get();
                $titleSection = TitleSEction::find($id);
                return view('section.show',  compact('sections', 'titleSection'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $section = Section::find($id);
        return view('section.edit', compact('section'));
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
        $section = Section::find($id);
        if(empty($section->image)){
            $header = $section->update($this->validator());
            $this->storeImage($section);
        }else{
            $header = $section->update($this->validator());
            $this->storeImage($section);
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
       $section = Section::find($id);
       $section->delete();
       return \redirect('section');
    }

    private function storeImage( Section $section)
    {
        if (\request('image'))
        {
            $section->update([
                'image' => \request('image')->store('section', 'public')
            ]);
        }
    }

    private  function validator()
    {
          return    \request()->validate([
            "titre" => 'required',
            'contenue' => 'required',
            'description' => 'required',
            'status' => 'requried|integer',
            'image' => 'sometimes|image|max:5000',
        ]);
    }
}
