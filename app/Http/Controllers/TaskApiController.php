<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        $events = $user->task;


        return response($events); //return data for events in calendar
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();

        Task::whereIn('id',$data)->update(['completed' => true]); 
        Task::whereNotIn('id', $data)->update(['completed' => false]);

        return response($data); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
