<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use App\Section;
use App\Note;
use App\User;
use Exception;
use Validator;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::with('boards')->find($request->user()->id);
        $boards = $user->boards()->get();

        return view('/boards/index')->with(["boards"=>$boards]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $defaultValues = ["What Went Well","What Needs Improvement","Action Items","Other Comments"];
        return view('/boards/create')->with(["defaultValues"=>$defaultValues]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // custom field names
        $niceNames = array(
            'section.0' => 'section 1 name',
            'section.1' => 'section 2 name',
            'section.2' => 'section 3 name',
            'section.3' => 'section 4 name'
        );

        $validator = Validator::make($request->all(),[
            'boardTitle' => 'required',
            'section.0' =>'required_without_all:section.1,section.2,section.3'
        ]);
        $validator->setAttributeNames($niceNames);

        $validator->validate();


        // create a new board and set the title as entered in the create form
        $board = new Board();
        $board->title = $request['boardTitle'];
        $board->user_id = $request->user()->id;
        $board->save();


        // create, name, and associate each section to the board just created
        foreach($request->get('section') as $sectionTitle){
            // ignore empty section titles
            if(strlen(trim($sectionTitle)) > 0){
                $section = new Section();
                $section->title = $sectionTitle;
                $section->board()->associate($board);
                $section->save();
            }
        }

        // redirect to the boards show route
        return redirect(route('boards.showHTML',$board->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // find the board by id and eager load all sections and notes
        $board = Board::with('sections.notes')->find($id);

        // return the data as a JSON object so Angular front-end can consume
        return response()->json(["board"=>$board]);

    }

    /**
     *
     * Display the blade HTML view.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showHTML($id){
        $board = Board::find($id);
        if($board)
        {
            return view('/boards/show');
        }
        // send to 404 page if board does not exist
        return abort(404);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try
        {
            $board = Board::find($id);
            $board->delete();
            response()->json(["status"=>"Success"]);
        }
        catch (Exception $exception){

            return response()->json([
                'status' => 'Error deleting board',
            ], 500);
        }

    }
}
