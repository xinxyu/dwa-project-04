<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Section;
use App\Note;
use Mockery\Matcher\Not;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/boards/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'boardTitle' => 'required',
            'section.0' =>'required_without_all:section.*'
        ]);

        /*
         * Store sections and title of the board in the DB here
         */

        $board = new Board();
        $board->title = $request['boardTitle'];
        $board->save();

        foreach($request->get('section') as $sectionTitle){
            // create sections from non-empty section titles
            if(strlen(trim($sectionTitle)) > 0){
                $section = new Section();
                $section->title = $sectionTitle;
                $section->board()->associate($board);
                $section->save();
            }
        }


        return redirect('boards/'.$board->id);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // find the board by id
        $board = Board::find($id);

        // get all sections of the board
        $sections= Section::Where("board_id","=",$id)->get();

        $section_ids = [];
        foreach($sections as $section){
            array_push($section_ids,$section->id);
        }

        // get all the notes from each section
        $notes = Note::WhereIn("section_id", $section_ids)->get();
        foreach($sections as $section){

            $notesForSection = array_values($notes
                ->filter(function($item) use($section) {return $item->section_id == $section->id;})
                ->all());

            $section["notes"] = $notesForSection;
        }

        // return the data as a JSON object
        return '{"board":'.$board->toJSON().',"sections":'.$sections->toJSON().'}';

    }

    /**
     *
     * Display the blade HTML view.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHTML($id){
        return view('/boards/show');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
