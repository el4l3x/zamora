<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('Tags.index', [
            'tags' => $tags,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTagRequest $request)
    {
        try {

            DB::beginTransaction();

            $slug = Str::slug($request->nombre);

            $tag = new Tag();
            $tag->name = $request->nombre;
            $tag->slug = $slug;
            $tag->save();

            $log = new Log();
            $log->accion = 'Crear nueva categoria '.$tag->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->route('tags.index');
            
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('Tags.edit', [
            'tag' => $tag,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        try {
            DB::beginTransaction();

            $slug = Str::slug($request->nombre);

            $tag->name = $request->nombre;
            $tag->slug = $slug;
            $tag->save();

            $log = new Log();
            $log->accion = "Editar etiqueta ".$tag->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        try {
            DB::beginTransaction();

            $tag->delete();

            $log = new Log();
            $log->accion = 'Eliminar etiqueta '.$tag->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->route('tags.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }
}
