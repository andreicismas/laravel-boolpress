<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("id", "DESC")->get();
        return view("admin.posts.index", [
            "posts" => $posts 
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create',[ "categories"=>$categories]);
    }

    public function store(Request $request , Session $authUser)
    {
        $newPostData = $request->all();


        $request->validate([
            "title"=> "required|max:255|",
            "detagli"=> "required|min:3|",
            "name" => "required|max:255",
            "motivo" => "required|max:255",
        ]);

       
        $newPost = new post();
        $newPost->fill($newPostData);
        $newPost->user_id = $request->user()->id;

        $newPost->save();

        return redirect()->route('admin.posts.show', $newPost->id);
    }

    public function show(Post $post) {

        $user =$post->user;
        
        return view("admin.posts.show", [
            "post" => $post,
            "user" => $user
        ]);
    }

    public function edit(Post $post)
    {
      $categories = Category::all();
      $tags = Tag::all();
        
        return view("admin.posts.edit", [
            "post" => $post,
            "categories"=>$categories,
            "tags"=>$tags
            // "user" => $post->user
        ]);
    }

    public function update(Request $request, Post $post){
    
        $request->validate([
            "title"=> "required|max:255|",
            "detagli"=> "required|min:3|",
            "name" => "required|max:255",
            "motivo" => "required|max:255",
            "tags" => "exists:tags,id"
        ]);

        $formData = $request->all();

        if (!key_exists("tags",$formData)) {
            $formData["tags"]=[];
        }
        
        // le funzioni sotto in versione detagliata 

        // $post->tags()->detach();
        // $post->tags()->attach($formData["tags"]);

        // fa semplicemente le 2 funzioni sopra solo che lo fa internamente il sistema \\\ funzione abbreviata 
        $post->tags()->sync($formData["tags"]);

        $post->update($formData);

        return redirect()->route("admin.posts.show", $post->id);
    }

    public function destroy($id)
    {   $post = Post::FindOrFail($id);

        $post->delete();

        return redirect()->route("admin.posts.index");
    }


}
