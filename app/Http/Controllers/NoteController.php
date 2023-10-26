<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user();
        // $notes = $user->note;
        // $notes = Note::all();

        return view('stickyWall.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stickyWall.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        

        $note = new Note();
        $note->title = $request->title;
        $note->note = $request->note;
        $note->user_id = Auth::id();
        $note->save();

        return redirect()->route('Note.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $note = Note::findOrFail($id);

        return view('stickyWall.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request,$id)
    {
        $note = Note::findOrFail($id);
        $note->title = $request->title;
        $note->note = $request->note;
        $note->user_id = Auth::id();
        $note->update();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note,$id)
    {

        $note = Note::findOrFail($id);
        $note->delete();

        return redirect()->back();
    }

    
}
