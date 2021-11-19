<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\GuardarPostsRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (PostResource::collection(Posts::paginate(6)))->additional(["msg" => "Petició mètode index"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuardarPostsRequest $request)
    {
        $data = $request->all();
        $data["user_id"] = User::all()->random()->id;
        
        return (new PostResource(Posts::create($data)))->additional(["msg" => "Petició mètode store"])
        ->response()->setStatusCode(202);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
    return (new PostResource($post))->additional(["msg" => "Petició mètode show"]);
        //return response()->json($post, 200);
    }

   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GuardarPostsRequest $request, Posts $post)
    {
        $post->update($request->all());
        
        return response()->json(["msg" => "Post actualitzat correctament"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
