<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('Categories.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $slug = Str::slug($request->nombre);
        $category = new Category();
        $category->name = $request->nombre;
        $category->slug = $slug;
        $category->save();

        $log = new Log();
        $log->accion = "Crear categoria ".$category->id;
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categoria)
    {
        return view('Categories.edit', [
            'category' => $categoria,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $categoria)
    {
        $slug = Str::slug($request->nombre);
        $categoria->name = $request->nombre;
        $categoria->slug = $slug;
        $categoria->save();

        $log = new Log();
        $log->accion = "Editar categoria ".$categoria->id;
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $categoria)
    {
        $categoria->delete();

        $log = new Log();
        $log->accion = "Eliminar categoria ".$categoria->id;
        $log->user_id = Auth::user()->id;
        $log->save();

        return redirect()->route('categorias.index');
    }
}
