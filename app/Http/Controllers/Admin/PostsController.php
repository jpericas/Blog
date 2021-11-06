<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Posts;
use App\Models\PostImage;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class PostsController extends Controller
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
        
        $posts = Posts::paginate(6);
        //$posts = DB::table("posts")->get();
        
        return view("admin.posts.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'title' => 'required|min:5|max:255|unique:posts'
        ]);
        
        $data = $request->all();
        $data["user_id"] = User::all()->random()->id;
        Posts::create($data);

        return redirect('posts')->with('status', 'Sa creat el post correctament.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        return view("admin.posts.show", ["post" => $post, "titol" => "<h1> Titol del post </h1>"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        $categories = Categories::pluck('id', 'title');
        return view("admin.posts.edit", ["post" => $post, 'cats' => $categories]);
    }

    Public function image(Request $request, Posts $post){
        
        $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png|max:10240',
        ]);
        
        $filename = time().".".$request->image->extension();
        
        $request->image->move(public_path('images'), $filename);

        PostImage::create(['image' => $filename, 'post_id' => $post->id]);
        return redirect('posts')->with('status', 'Sa afegit una imatge.');
    }
      

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $request->validate([
            'title' => 'required|min:5|max:255'
        ]);
        
        $post->update($request->all());
        
        return redirect('posts')->with('status', 'Post modificat correctement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        $post->delete();
        return back()->with('status', 'Sa eliminat el post correctament');
    }
}
