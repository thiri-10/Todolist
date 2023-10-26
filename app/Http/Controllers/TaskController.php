<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $tasks = Task::where('user_id',Auth::id())
        ->when(request()->has('keyword'),function($query){
            $keyword = request()->keyword;
            $query->where('task','Like','%'.$keyword.'%');
        })
        ->paginate(6)->withQueryString();

       
        $today = Carbon::now()->toDateString();
        return view('task.index',compact('tasks','today'));
    }


    public function today(){
        $today = Carbon::now()->toDateString(); 
        
        $tasks = Task::where('user_id',Auth::id())->
        whereDate('due_date',$today)->paginate(6);

        return view('task.index',compact('tasks','today'));
    }

    public function upcoming(){
        $today = Carbon::now()->toDateString();

        $tasks = Task::where('user_id',Auth::id())->
        where('due_date','>',$today)->paginate(6);

        return view('task.index',compact('tasks','today'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
       $task = new Task();
       $task->task = $request->task;
       $task->due_date = $request->due_date;
       $task->category_id = $request->category;
       $task->user_id = Auth::id(); 

       $task->save();
       return redirect()->route('Task.index');

   }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    
        $task = Task::findOrFail($id);
        
        return view('task.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('task.edit',compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->task = $request->task;
        $task->due_date = $request->due_date;
        $task->category_id = $request->category;
        $task->update();
        
        return redirect()->route('Task.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::where('id', $id)->get()->first();
        $task->delete();

        return redirect()->back();

    }



    /**
     * show the view for calendar 
     */
    public function showCalendar(){
        return view('calendar.index');
    }

    

}
