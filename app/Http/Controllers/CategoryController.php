<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index',compact('categories'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
       
        $category = new Category();  
        $category->category = $request->category;
        $category->icon = $request->icon;
        $category->user_id = Auth::id(); 
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $today = Carbon::now();
        return view('category.show',compact('category','today'));
        // dd($category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        // return view('category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // $category->category = $request->category;
        // $category->update();

        // return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
        $category = Category::findOrFail($id);
        // dd($category);
        $category->delete();
        return redirect()->back();
    }
}
