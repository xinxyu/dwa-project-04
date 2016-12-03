<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use Exception;

class NoteController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try
        {
            $note = new Note();
            $note->message = $request->json("message");
            $note->section_id = $request->json("section_id");
            $note->save();
            return response()->json(["status"=>"success"]);
        }
        catch (Exception $exception){

            return response()->json([
                'status' => 'Error saving note',
            ], 500);
        }

    }

    /**
     * Delete a note by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try
        {
            $note = Note::find($id);
            $note->delete();
            response()->json(["status"=>"Success"]);
        }
        catch (Exception $exception){

            return response()->json([
                'status' => 'Error deleting note',
            ], 500);
        }

    }


    /**
     * Update a note by id
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        try
        {
            $note = Note::find($id);
            $note->votes += 1;
            $note->save();
            response()->json(["status"=>"Success"]);
        }
        catch (Exception $exception){

            return response()->json([
                'status' => 'Error deleting note',
            ], 500);
        }
    }
}
