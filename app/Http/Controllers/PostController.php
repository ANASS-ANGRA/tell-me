<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function tous_post(){
      // $tous= Post::orderBy('created_at', 'desc')->get();
      $tous=post::with("user")->orderBy('created_at', 'desc')->get();
       return $tous;
    }
    public function new_post(Request $request){
           $Post=new Post;
           $Post->user_id=auth()->user()->id;
           $Post->title=$request->title;
           $Post->desc=$request->desc;
           $Post->save();
           return response()->json(
            ["message"=>"ajouter post"]
           );
    }
    public function me_post(){
        $me_post=Post::where("user_id","=",auth()->user()->id)->get();
        return $me_post;
    }
    public function delete_post($id){
       $post=Post::where("user_id","=",auth()->user()->id)->where("id","=",$id)->get();
       $post->each->delete();
       return response()->json([
         "message"=>"le post est supprimer"
       ]);
    }
    public function update_post(Request $request){
       $this->delete_post($request->id_p);
        $Post=new post;
       $Post->user_id=1;
        $Post->title=$request->title;
        $Post->desc=$request->desc;
        $Post->save();
        return response()->json([
         "message"=>"le post est update"
        ]);
        
   }




}