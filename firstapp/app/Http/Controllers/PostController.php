<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller{
    public function createPost(Request $request){
        $fields = $request->validate([
            'title' =>'required',
            'body' => 'required'
        ]);

        // accessing field values from request body
        $title = $fields['title'];
        $body = $fields['body'];   

        // removing any potentially harmful or unwanted elements from the data
        $fields['title'] = strip_tags($title);
        $fields['body'] = strip_tags($body);
        $fields['user_id'] = auth()->id();                      // get ID of currently logged-in user
        
        Post::create($fields);                                  // inserting a post in database
        return redirect('/');
    }   



    public function ShowEditScreen(Post $postID){
        // laravel will automatically return matching row when function parameter wll be same as query parameter in web.php file
        
        // if you are not author of currnet blog post, then redirect to home page
        if(auth()->check() && auth()->user()->id !== $postID->user_id){
            return redirect('/');
        }
        
        return view('edit-post', ['post' => $postID]);
    }


    public function UpdatePost(POST $postID, Request $request){

        // if you are not author of currnet blog post, then redirect to home page
        if(auth()->check() && auth()->user()->id !== $postID->user_id){
            return redirect('/');
        }

        $fields = $request->validate([
            'title' =>'required',
            'body' => 'required'
        ]);

         // accessing field values from request body
         $title = $fields['title'];
         $body = $fields['body'];   
 
         // removing any potentially harmful or unwanted elements from the data
         $fields['title'] = strip_tags($title);
         $fields['body'] = strip_tags($body);

         $postID->update($fields);
         return redirect('/');
    }


    public function DeletePost(POST $postID){
        // if you are author of currnet blog post, then u are allowed to delete it
        if(auth()->check() && auth()->user()->id === $postID->user_id){
           $postID->delete();
        }


        return redirect('/');
    }
}
