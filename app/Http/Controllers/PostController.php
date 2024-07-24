<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{








    public function index() {
        // selcet * from posts
        $postsFromDB = Post::all(); // collection object
        // id , title, desc, created_at, updated_at
        return view("posts.index", ['posts' => $postsFromDB]);
    }






    

    public function show($postId) {
        $singlePostFromDB = Post::find($postId); 
        if(is_null($singlePostFromDB)) { // findOrfail
            return to_route(route: 'posts.index');
        }
        return view("posts.show", ['post' => $singlePostFromDB]);
    }






    

    public function create() {
        // select * from users;
        $users = User::all();
        // dd($users);
        return view("posts.create", ['users' => $users]);
    }








    public function store() {

        // code validate the data
        request()->validate([
            'title' => ['required', 'min: 3'],
            'description' => ['required', 'min: 10'],
            'post_creator' => ['required', 'exists:users,id'],
        ]);


        // 1- get the user data 
        $data = request()->all();

        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;
        // dd($data, $title, $description, $post_creator);
        // return $data;


        
        // 2- store the user data in database
        // $post = new Post;
        // $post->title = $title;
        // $post->description = $description;
        // $post->save();
        // 3- redirection to posts.index
        Post::create([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);
        return to_route("posts.index");
    }
    





    

    public function edit(Post $post) {
         // select * from users;
        $users = User::all();
        return view("posts.edit", ['users' => $users, 'post' => $post]);
    }
    





    

    public function update($postId) {
        $title = request()->title;
        $description = request()->description;
        $post_creator = request()->post_creator;
        // dd($title, $description, $post_creator);

        $singlePostFromDB = Post::find($postId); 
        // if(is_null($singlePostFromDB)) { // findOrfail
        //     return to_route(route: 'posts.index');
        // }
        $singlePostFromDB->update([
            'title' => $title,
            'description' => $description,
            'user_id' => $post_creator,
        ]);


        return to_route('posts.show', $postId);
    }
    





    

    public function destroy($postId) {
        //1- delete the post from database
            // select or find the post
            // select the post from database
        $post = Post::find($postId); 
        // dd($post);
        $post->delete();
        return to_route(route: 'posts.index');
    }
}
