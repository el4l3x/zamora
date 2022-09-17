<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Log;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select('id', 'name')->get();
        $tags = Tag::select('id', 'name')->get();

        return view('Posts.create', [
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        try {
            DB::beginTransaction();

            
            $post = new Post();
            $post->name = $request->nombre;
            $post->slug = Str::slug($request->nombre);
            $post->extract = $request->resumen;
            $post->body = $request->cuerpo;+
            $post->status = $request->status;
            $post->category_id = $request->categoria;
            $post->user_id = Auth::user()->id;
            $post->save();

            if ($request->file('imagen')) {
                $url = Storage::put('posts', $request->file('imagen'));

                $post->image()->create([
                    'url' => $url,
                ]);
            }
            
            if ($request->tags) {
                $post->tags()->attach($request->tags);
            }

            $log = new Log();
            if ($request->status == 1) {
                $log->accion = "Nueva noticia como borrador ".$post->id;
            } else {
                $log->accion = "Nueva noticia publicada ".$post->id;
            }
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return redirect()->route("posts.index");
        } catch (\Throwable $th) {
            DB::rollBack();
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        try {
            DB::beginTransaction();

            $post->delete();

            $log = new Log();
            $log->accion = "Eliminar noticia ".$post->id;
            $log->user_id = Auth::user()->id;
            $log->save();

            DB::commit();

            return true;
        } catch (\Throwable $th) {
            DB::rollBack();

            return $th;
        }
    }
}
