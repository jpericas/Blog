<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rol');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $categories = Categories::all();
        return view("admin.categories.index", 
                ["categories" => $categories, 
                 "titol" => "<h1>Llista de Categories</h1>"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:255|unique:categories'
        ]);
 
        Categories::create($request->all());

        return redirect('categories')->with('status', 'Sa creat la categoria correctament.');

    }

    /**
     * Display the specified resource.
     * El nom de la variable ha de ser el mateix que el que ens indica la ruta
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function show(Categories $category)
    {
        return view("admin.categories.show", ["categories" => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $category)
    {
        return view("admin.categories.edit", ["category" => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categories $category)
    {
        $request->validate([
            'title' => 'required|min:5|max:255|unique:categories'
        ]);
        
        $category->update($request->all());
        
        return redirect('categories')->with('status', 'Sa modificat la categoria correctament.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect('categories')->with('status', 'Sa borrat la categoria correctament');
    }
}
