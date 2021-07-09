<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\Tag;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $datiInIngresso = session("posts");

        if (isset( $datiInIngresso)) {
            $posts = $datiInIngresso;
        }else{

            $posts = Post::orderBy("id", "DESC")->get();
        }
        return view("admin.posts.index", [
            "posts" => $posts 
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.posts.create',[ "categories"=>$categories,"tags"=>$tags]);
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

        Storage::put("postCovers", $newPostData["postCover"]);

        $newPost->save();
        $newPost->tags()->sync($newPostData["tags"]);

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
        
        
        
        $post->tags()->sync($formData["tags"]);
        
        Storage::put("postCovers", $formData["postCover"]);
        
        // dump($formData);
        // return;  
        
        
        $post->update($formData);

        return redirect()->route("admin.posts.show", $post->id);
    }

    public function destroy($id)
    {  
        $post = Post::FindOrFail($id);
        $post->tags()->detach();

        $post->delete();

        return redirect()->route("admin.posts.index");
    }

    public function filter(Request $request){
        $filter =$request->all();

        $post=Post::join("post_tag","posts.id","=","post_tag.post_id")
            ->where("post_tag.tag_id",$filter["tag"])->get();

        return redirect()->route("admin.posts.index")->with(["posts"=>$post]);
    }


}
